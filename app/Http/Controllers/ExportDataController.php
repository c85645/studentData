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

            $excel->sheet('mySheet', function ($sheet) use ($data, $teacher, $academy) {
                $sheet->mergeCells('A1:J1');
                $sheet->mergeCells('A2:G2');
                $sheet->mergeCells('H2:J2');
                $sheet->setPageMargin(0.25);
                $sheet->setHeight(1, 30);
                $sheet->setWidth(array(
                    'A' => 20,
                    'B' => 10,
                    'C' => 10,
                ));

                $sheet->cells('A1:K1', function ($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cells('A2:I2', function ($cells) {
                    $cells->setAlignment('right');
                });

                $sheet->row(1, array(<<<EOT
$academy->year 學年度巨資學院 $academy->name
招生考試書面資料審查成績評分表($teacher->name)
EOT
                ));
                $sheet->row(2, array('委員簽名：'));
                $sheet->row(3, array('報名序號', '姓名', '總分'));
                $sheet->fromArray($data, null, 'A4', false, false);
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
                    ['academy_id', $student->academy_id]
                ])->select(DB::raw('sum(score) as score'))->groupBy('teacher_id');
                $result = array_merge($record, $query_scores->get()->pluck('score')->toArray());

                // 計算不同老師分數的總平均
                $query_avg = DB::table(DB::raw("({$query_scores->toSql()}) as sub"))
                ->mergeBindings($query_scores->getQuery())
                ->avg('score');
                $result = array_merge($result, array($query_avg));
                // 整理好的資料丟到要給excel的data
                array_push($data, $result);
            }

            $excel->sheet('mySheet', function ($sheet) use ($academy, $teacher_name, $data) {
                $sheet->mergeCells('A1:J1');
                $sheet->setPageMargin(0.25);
                $sheet->setHeight(1, 30);
                $sheet->setWidth('A', 20);

                $sheet->cells('A1:J1', function ($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row(1, array(<<<EOT
$academy->year 學年度巨量資料管理學院 $academy->name 書面資料審查評分總表
EOT
                ));
                $array1 = array('報名序號', '姓名');
                $array2 = array('總平均', '備註');
                $result = array_merge($array1, $teacher_name);
                $result = array_merge($result, $array2);
                // $sheet->row(2, array('報名序號', '姓名', '第一位老師', '第二位老師', '第三位老師', '總分', '平均', '備註'));
                $sheet->row(2, $result);

                $sheet->fromArray($data, null, 'A3', false, false);
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

            $excel->sheet('mySheet', function ($sheet) use ($academy) {
                $sheet->mergeCells('A1:J1');
                $sheet->setPageMargin(0.25);
                $sheet->setHeight(1, 30);
                $sheet->setWidth(array(
                    'A' => 20,
                    'B' => 10,
                    'C' => 10,
                    'D' => 10,
                    'E' => 10,
                    'F' => 10,
                    'G' => 10,
                    'H' => 10,
                    'I' => 10,
                    'J' => 10,
                ));

                $sheet->cells('A1:J1', function ($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row(1, array(<<<EOT
$academy->year 學年度巨量資料管理學院 $academy->name 考試委員面試評分表
EOT
                ));

                $sheet->row(2, array('報名序號', '姓名', '第一位老師', '第二位老師', '第三位老師', '總平均', '備註'));
                // $sheet->row(2, $result);
                //$sheet->fromArray($data, null, 'A4', false, false);
            });
        })->export('xlsx');
    }

    // 一階二階成績審查總表
    public function totalExcel()
    {
        return "totalExcel";
    }
}
