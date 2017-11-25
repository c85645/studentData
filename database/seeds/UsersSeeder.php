<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'account' => 'admin',
            'name' => '最高管理員',
            'password' => bcrypt('admin'),
            'status' => true,
        ]);
    }
}
