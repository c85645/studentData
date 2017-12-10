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
        User::insert([
            [
                'account' => 'admin',
                'name' => '傑夫',
                'password' => bcrypt('admin'),
                'status' => true,
                'created_name' => 'admin',
                'updated_name' => 'admin',
            ],[
                'account' => 'user',
                'name' => '老師一',
                'password' => bcrypt('user'),
                'status' => true,
                'created_name' => 'admin',
                'updated_name' => 'admin',
            ],
        ]);

        // 預設關聯
        \DB::table('role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],[
                'user_id' => 2,
                'role_id' => 3,
            ],
        ]);
    }
}
