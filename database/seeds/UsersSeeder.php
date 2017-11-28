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
        // 預設最高管理員
        User::create([
            'account' => 'admin',
            'name' => '最高管理員',
            'password' => bcrypt('admin'),
            'status' => true,
            'created_name' => 'admin',
            'updated_name' => 'admin',
        ]);

        // 預設關聯
        \DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
