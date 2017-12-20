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
    }
}
