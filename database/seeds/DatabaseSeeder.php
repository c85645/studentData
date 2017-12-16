<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          RolesSeeder::class,
          UsersSeeder::class,
          MenuSeeder::class,
          AcademiesSeeder::class,
          AcademyNameSeeder::class,
          AcademyYearSeeder::class,
        ]);
    }
}
