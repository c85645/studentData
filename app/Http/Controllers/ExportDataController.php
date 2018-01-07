<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\User;
use App\Models\Academy;
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
            $academy_name = $academy->name->name;

            $excel->sheet('mySheet', function ($sheet) use ($data, $teacher, $academy, $academy_name) {
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
$academy->year 學年巨資學院 $academy_name
招生考試書面資料審查成績評分表($teacher->name 老師)
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
        return "reviewExcel";
    }

    // 考試委員面試成績表
    public function interviewExcel()
    {
        return "interviewExcel";
    }

    // 一階二階成績審查總表
    public function totalExcel()
    {
        return "totalExcel";
    }
}
