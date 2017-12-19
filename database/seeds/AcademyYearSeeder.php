<?php

use Illuminate\Database\Seeder;

class AcademyYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('academy_years')->insert([
            [
              'year'  =>  '107',
            ]
        ]);
    }
}
