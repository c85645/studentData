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

            $data = Score::join('import_applicants', 'scores.student_id', 'import_applicants.id')
            ->select(DB::raw('import_applicants.exam_number, import_applicants.name, sum(scores.score)'))
            ->groupBy('scores.student_id')
            ->where([
                ['scores.academy_id', request('academy_id')],
                ['scores.teacher_id', request('teacher_id')],
                ['scores.step', 1]
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
                $sheet->fromArray($data, null, 'A4', false, false);

                // 控制表尾委員簽名的位置
                if (count($data) + 3 <= 36) {
                    $num = 36;
                } else {
                    $num = 72;
                }
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

            $academy = Academy::find(request('academy_id'));
            $academy->name = $academy->name->name;

            $teacher_name = User::join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', 3)
            ->select('users.name')->get()->pluck('name')->toArray();

            $students = ImportApplicant::where('academy_id', $academy->id)->get();
            $teachers = DB::table('academy_teacher')->where('academy_id', $academy->id)->get();

            $data = array();
            foreach ($students as $student) {
                // 組合單筆
                $record = array($student->exam_number, $student->name);

                // 取得不同老師的分數
                $query_scores = Score::where([
                    ['student_id', $student->id],
                    ['academy_id', $student->academy_id],
                    ['step', 1]
                ])->select(DB::raw('sum(score) as score'))->groupBy('teacher_id');
                $result = array_merge($record, $query_scores->get()->pluck('score')->toArray());

                // 計算不同老師分數的總平均
                $query_avg = DB::table(DB::raw("({$query_scores->toSql()}) as sub"))
                ->mergeBindings($query_scores->getQuery())
                ->avg('score');

                $result = array_merge($result, array(number_format($query_avg, 2)));
                // 整理好的資料丟到要給excel的data
                array_push($data, $result);
            }

            $excel->sheet('sheet', function ($sheet) use ($academy, $teacher_name, $data) {
                $sheet->setFontSize(15);
                $sheet->setAllBorders('thin');
                $sheet->mergeCells('A1:F1');
                $sheet->mergeCells('A2:F2');
                $sheet->setPageMargin(0.25);
                $sheet->setWidth('A', 20);

                $sheet->cells('A1:F1', function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cells('A2:F2', function ($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row(1, array($academy->year . ' 學年度巨量資料管理學院 ' . $academy->name ));
                $sheet->row(2, array('書面資料審查評分總表'));
                $array1 = array('報名序號', '姓名');
                $array2 = array('總平均', '備註');
                $result = array_merge($array1, $teacher_name);
                $result = array_merge($result, $array2);
                $sheet->row(3, $result);
                $sheet->fromArray($data, null, 'A4', false, false);

                // 控制表尾委員簽名的位置
                if (count($data) + 3 <= 36) {
                    $num = 36;
                } else {
                    $num = 72;
                }
                $sheet->mergeCells('A' . $num . ':F' . $num);
                $sheet->row($num, array('委員簽名：'));
                $sheet->cells('A3:F' . $num, function ($cells) {
                    $cells->setAlignment('center');
                });
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

                // 帶完資料後修改為動態調整位置
                // 控制表尾委員簽名的位置
                if (count($applicants) + 4 <= 36) {
                    $num = 36;
                } else {
                    $num = 72;
                }
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
            $teachers = DB::table('academy_teacher')->where('academy_id', $academy->id)->get();

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
                if (count($data) + 3 <= 36) {
                    $num = 36;
                } else {
                    $num = 72;
                }
                $sheet->cells('A1:E' . ($num - 1), function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->mergeCells('C' . $num . ':E' . $num);
                // $sheet->cells('A' . $num . ':E' . $num , function ($cells) {
                //     $cells->setAlignment('right');
                // });
                // $sheet->row($num, array('主任簽名：'));
                $sheet->setBorder('A' . $num .':B' . $num, 'thin');
                $sheet->cell('C' . $num, function ($cell) {
                    $cell->setValue('主任簽名：');
                });
            });
        })->export('xlsx');
    }
}
