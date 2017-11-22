<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'c85645@gmail.com',
            'password' => '$2y$10$s7WLnbIIYoyTmgxtk5pIbe/hou7rCI3mByEPMfLxPxG4RTZYj4ojW',
            'active' => true,
        ]);
    }
}
