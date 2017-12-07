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
            'name_id'  =>  'A',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'B',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'C',
           ],
          [
            'year'  =>  107,
            'name_id'  =>  'D',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'E',
           ],
          [
            'year'  =>  107,
            'name_id'  =>  'F',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'G',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'H',
          ],
          [
            'year'  =>  107,
            'name_id'  =>  'I',
          ],
        ]);
    }
}
