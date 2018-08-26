<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\User;
use App\Models\Academy;
use App\Models\ImportApplicant;
use DB;
use Excel;

class ExportDataController extends Controller
{
    // 個別考試委員成績確認表
    public function personalExcel()
    {
        return Excel::create('考委成績確認表', function ($excel) {
            $excel->setTitle('考委成績確認表');
            $excel->setCreator('DLAB ADMIN')->setCompany('DLAB ADMIN');
            $excel->setDescription('考委成績確認表');

            // FIXME
            // 若有兩階段的話會有問題
            $data = ImportApplicant::leftJoin('scores', 'import_applicants.id', 'scores.student_id')
            ->select(DB::raw('import_applicants.exam_number, import_applicants.name, coalesce(sum(scores.score), 0)'))
            ->groupBy('import_applicants.id')
            ->orderBy('import_applicants.id')
            ->where([
                ['import_applicants.academy_id', request('academy_id')],
            //     ['scores.teacher_id', request('teacher_id')],
            //     ['scores.step', 1]
            ])->get()->toArray();

            $teacher = User::find(request('teacher_id'));
            $academy = Academy::find(request('academy_id'));
            $academy->name = $academy->name->name;

            $excel->sheet('sheet', function ($sheet) use ($data, $teacher, $academy) {
                $sheet->setFontSize(15);
                $sheet->setAllBorders('thin');
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->setPageMargin(0.25);
                $sheet->setWidth(array(
                    'A' => 20,
                    'B' => 10,
                    'C' => 10,
                ));
                $sheet->cells('A1:E2', function ($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row(1, array($academy->year . ' 學年度巨資學院 ' . $academy->name));
                $sheet->row(2, array('招生考試書面資料審查成績評分表(' . $teacher->name . ' )'));
                $sheet->row(3, array('報名序號', '姓名', '總分'));
                $sheet->fromArray($data, null, 'A4', true, false);

                // 20180721修改為最後一筆資料的往下兩行
                // 控制表尾委員簽名的位置
                $num = count($data) + 3 + 2;

                $sheet->mergeCells('A' . $num . ':E' . $num);
                $sheet->row($num, array('委員簽名：'));
                $sheet->cells('A3:E' . $num, function ($cells) {
                    $cells->setAlignment('center');
                });
            });
        })->export('xlsx');
    }

    // 書面資料審查評分總表
    public function reviewExcel()
    {
        return Excel::create('書面資料審查評分總表', function ($excel) {
            $excel->setTitle('書面資料審查評分總表');
            $excel->setCreator('DLAB ADMIN')->setCompany('DLAB ADMIN');
            $excel->setDescription('書面資料審查評分總表');

            // 取得學制資料
            $academy = Academy::find(request('academy_id'));
            $academy->name = $academy->name->name;

            // 老師名單
            $teacher_name = User::join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', 3)
            ->select('users.name')
            ->orderBy('users.id')
            ->get()->pluck('name')->toArray();
            // 老師數量
            $count_of_teacher = count($teacher_name);

            // 學生的成績
            $students = ImportApplicant::where('academy_id', $academy->id)->get();

            $data = array();
            foreach ($students as $student) {
                // 組合到陣列內
                $result = array($student->exam_number, $student->name);

                // 取得不同老師的分數，若老師沒有評分則不會有資料
                $query_scores = Score::where([
                    ['student_id', $student->id],
                    ['academy_id', $student->academy_id],
                    ['step', 1]
                ])
                ->select(DB::raw('sum(score) as score'))
                ->groupBy('teacher_id')
                ->orderBy('teacher_id');
                $score_array = $query_scores->get()->pluck('score')->toArray();
                $result = array_merge($result, $score_array);

                // 比較老師數量與成績數量，若兩者不一致則補滿0分字串到與老師數量一致
                $count_of_scores = count($score_array);
                if ($count_of_teacher != $count_of_scores) {
                    if ($count_of_teacher > $count_of_scores) {
                        $diff_num = $count_of_teacher - $count_of_scores;
                        for ($i = 0; $i < $diff_num; $i++) {
                            $zeroNum = array('0');
                            $result = array_merge($result, $zeroNum);
                        }
                    }
                }

                // 計算總平均分數
                $query_avg = DB::table(DB::raw("({$query_scores->toSql()}) as sub"))
                ->mergeBindings($query_scores->getQuery())
                ->avg('score');
                $result = array_merge($result, array(number_format($query_avg, 2)));

                // 整理好的資料丟到要給excel的data
                array_push($data, $result);
            }

            // 輸出成excel
            $excel->sheet('sheet', function ($sheet) use ($academy, $teacher_name, $data) {
                $sheet->setFontSize(15);
                $sheet->setAllBorders('thin');
                $sheet->setPageMargin(0.25);

                // 設定表頭資料
                $array1 = array('報名序號', '姓名');
                $array2 = array('總平均', '備註');
                $result = array_merge($array1, $teacher_name);
                $result = array_merge($result, $array2);

                // 找出最後一欄
                $last_column = $this->getNameFromNumber(count($result));

                // 放入資料
                $sheet->row(1, array($academy->year . ' 學年度巨量資料管理學院 ' . $academy->name ));
                $sheet->row(2, array('書面資料審查評分總表'));
                $sheet->row(3, $result);
                $sheet->fromArray($data, null, 'A4', false, false);

                // 20180721修改為最後一筆資料的往下兩行
                // 控制表尾委員簽名的位置
                $num = count($data) + 3 + 2;
                $sheet->mergeCells('A' . $num . ':' . $last_column . $num);
                $sheet->row($num, array('委員簽名：'));
                $sheet->cells('A3:' . $last_column . $num, function ($cells) {
                    $cells->setAlignment('center');
                });

                // 設定合併儲存格
                $sheet->mergeCells('A1:' . $last_column . '1');
                $sheet->mergeCells('A2:' . $last_column . '2');

                // 設定置中
                $sheet->cells('A1:'. $last_column . '1', function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cells('A2:'. $last_column .'2', function ($cells) {
                    $cells->setAlignment('center');
                });

                // 設定欄位寬度
                $sheet->setWidth('A', 20);
                $sheet->setWidth($last_column, 20);
            });
        })->export('xlsx');
    }

    // 考試委員面試評分表
    public function interviewExcel()
    {
        return Excel::create('考試委員面試評分表', function ($excel) {
            $excel->setTitle('考試委員面試評分表');
            $excel->setCreator('DLAB ADMIN')->setCompany('DLAB ADMIN');
            $excel->setDescription('考試委員面試評分表');

            $academy = Academy::find(request('academy_id'));
            $academy->name = $academy->name->name;

            $applicants = ImportApplicant::where([
                ['academy_id', $academy->id],
                ['is_pass', true]
            ])->select('exam_number', 'name')->get()->toArray();

            $excel->sheet('sheet', function ($sheet) use ($academy, $applicants) {
                $sheet->setFontSize(15);
                $sheet->setAllBorders('thin');
                $sheet->mergeCells('A1:D1');
                $sheet->mergeCells('A2:D2');
                $sheet->mergeCells('A3:D3');
                $sheet->setPageMargin(0.25);
                $sheet->setWidth(array(
                    'A' => 20,
                    'B' => 14,
                    'C' => 14,
                ));
                $sheet->cells('A1:D2', function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cells('A3:D3', function ($cells) {
                    $cells->setAlignment('right');
                });

                $sheet->row(1, array($academy->year . ' 學年度巨量資料管理學院 ' . $academy->name));
                $sheet->row(2, array('考試委員面試評分表'));
                $sheet->row(3, array('委員姓名：                  '));
                $sheet->row(4, array('報名序號', '姓名', '分數'));
                $sheet->fromArray($applicants, null, 'A5', false, false);

                // 20180721修改為最後一筆資料的往下兩行
                // 控制表尾委員簽名的位置
                $num = count($applicants) + 4 + 2;

                $sheet->mergeCells('A' . $num . ':D' . $num);
                $sheet->row($num, array('委員簽名：'));
                $sheet->cells('A4:D' . $num, function ($cells) {
                    $cells->setAlignment('center');
                });
            });
        })->export('xlsx');
    }

    // 一階二階總成績確認表
    public function totalExcel()
    {
        return Excel::create('一階二階總成績確認表', function ($excel) {
            $excel->setTitle('一階二階總成績確認表');
            $excel->setCreator('DLAB ADMIN')->setCompany('DLAB ADMIN');
            $excel->setDescription('一階二階總成績確認表');

            $academy = Academy::find(request('academy_id'));
            $academy->name = $academy->name->name;

            $teacher_name = User::join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', 3)
            ->select('users.name')->get()->pluck('name')->toArray();

            $students = ImportApplicant::where('academy_id', $academy->id)->get();
            // $teachers = DB::table('academy_teacher')->where('academy_id', $academy->id)->get();

            $data = array();
            foreach ($students as $student) {
                // 組合單筆
                $record = array($student->exam_number, $student->name);

                // 第一階段
                // 取得不同老師的分數
                $query_scores = Score::where([
                    ['student_id', $student->id],
                    ['academy_id', $student->academy_id],
                    ['step', 1]
                ])->select(DB::raw('sum(score) as score'))->groupBy('teacher_id');
                // 計算不同老師分數的總平均
                $query_avg = DB::table(DB::raw("({$query_scores->toSql()}) as sub"))
                ->mergeBindings($query_scores->getQuery())
                ->avg('score');
                $result = array_merge($record, array(number_format($query_avg, 2)));

                // 第二階段（直接取值）
                $step2 = Score::where([
                    ['student_id', $student->id],
                    ['academy_id', $student->academy_id],
                    ['step', 2]
                ])->get()->pluck('score')->toArray();
                $result = array_merge($result, $step2);

                // 整理好的資料丟到要給excel的data
                array_push($data, $result);
            }

            $excel->sheet('sheet', function ($sheet) use ($academy, $teacher_name, $data) {
                $sheet->setFontSize(15);
                $sheet->setAllBorders('thin');
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->setPageMargin(0.25);
                $sheet->setWidth('A', 20);

                $sheet->row(1, array($academy->year . ' 學年度巨量資料管理學院 ' . $academy->name ));
                $sheet->row(2, array('一階二階總成績確認表'));
                $sheet->row(3, array('報名序號', '姓名', '一階分數', '二階分數', '總分'));
                $sheet->fromArray($data, null, 'A4', false, false);

                // 控制表尾委員簽名的位置
                $num = count($data) + 3 + 2;

                $sheet->cells('A1:E' . ($num - 1), function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->mergeCells('C' . $num . ':E' . $num);
                $sheet->setBorder('A' . $num .':B' . $num, 'thin');
                $sheet->cell('C' . $num, function ($cell) {
                    $cell->setValue('主任簽名：');
                });
            });
        })->export('xlsx');
    }

    /**
     * 輸入數字轉換成英文
     * ex.1 == A, 2 == B
     */
    private function getNameFromNumber($num) {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        if ($num2 > 0) {
            return getNameFromNumber($num2) . $letter;
        } else {
            return $letter;
        }
    }

}
