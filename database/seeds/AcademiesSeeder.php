<?php

use Illuminate\Database\Seeder;
use App\Models\Academy;

class AcademiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academy::insert([
          [
            'year' => 107,
            'name_id' => 'A',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'B',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'C',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
           ],
          [
            'year' => 107,
            'name_id' => 'D',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'E',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
           ],
          [
            'year' => 107,
            'name_id' => 'F',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'G',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'H',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
          [
            'year' => 107,
            'name_id' => 'I',
            'pdf_url' => 'http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf',
          ],
        ]);

        \DB::table('score_item_data')->insert([
            [
              'academy_id' => 1,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 1,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 1,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 1,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 2,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 2,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 2,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 2,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 3,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 3,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 3,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 3,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 4,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 4,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 4,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 4,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 5,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 5,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 5,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 5,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 6,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 6,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 6,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 6,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 7,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 7,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 7,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 7,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
            [
              'academy_id' => 8,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 8,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 8,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 8,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],[
              'academy_id' => 9,
              'step' => 1,
              'no' => 1,
              'name' => '基本資料',
              'percent' => 40,
            ],
            [
              'academy_id' => 9,
              'step' => 1,
              'no' => 2,
              'name' => '自傳與讀書計畫',
              'percent' => 30,
            ],
            [
              'academy_id' => 9,
              'step' => 1,
              'no' => 3,
              'name' => '工作與bigdata相關性',
              'percent' => 20,
            ],
            [
              'academy_id' => 9,
              'step' => 1,
              'no' => 4,
              'name' => '有利證照',
              'percent' => 10,
            ],
        ]);
    }
}
