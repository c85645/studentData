<?php

use Illuminate\Database\Seeder;
use App\Models\AcademyName;

class AcademyNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademyName::insert([
          [
            'id'    =>  'A',
            'name'  =>  '轉學考試',
          ],
          [
            'id'    =>  'B',
            'name'  =>  '轉系考試',
          ],
          [
            'id'    =>  'C',
            'name'  =>  '雙主修',
          ],
          [
            'id'    =>  'D',
            'name'  =>  '輔系',
          ],
          [
            'id'    =>  'E',
            'name'  =>  '學士後',
          ],
          [
            'id'    =>  'F',
            'name'  =>  '學程',
          ],
          [
            'id'    =>  'G',
            'name'  =>  '碩士考試',
          ],
          [
            'id'    =>  'H',
            'name'  =>  '碩士甄試',
          ],
          [
            'id'    =>  'I',
            'name'  =>  '碩士在職專班',
          ],
      ]);
    }
}
