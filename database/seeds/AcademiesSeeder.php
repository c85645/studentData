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
            'year'  =>  107,
            'code'  =>  'A',
            'name'  =>  '轉學',
          ],
          [
            'year'  =>  107,
            'code'  =>  'B',
            'name'  =>  '轉系',
          ],
          [
            'year'  =>  107,
            'code'  =>  'C',
            'name'  =>  '雙主修',
          ],
          [
            'year'  =>  107,
            'code'  =>  'D',
            'name'  =>  '輔系',
          ],
          [
            'year'  =>  107,
            'code'  =>  'E',
            'name'  =>  '學士後',
          ],
          [
            'year'  =>  107,
            'code'  =>  'F',
            'name'  =>  '學程',
          ],
          [
            'year'  =>  107,
            'code'  =>  'G',
            'name'  =>  '碩士（考試）',
          ],
          [
            'year'  =>  107,
            'code'  =>  'H',
            'name'  =>  '碩士（甄試）',
          ],
          [
            'year'  =>  107,
            'code'  =>  'I',
            'name'  =>  '碩專',
          ],
        ]);
    }
}
