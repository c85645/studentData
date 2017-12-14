<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 預設三個角色
        Role::insert([
            [
                'role_id' => 'administrator',
                'role_name' => '最高管理員',
                'created_name' => 'admin',
                'updated_name' => 'admin',
            ],[
                'role_id' => 'manager',
                'role_name' => '管理員',
                'created_name' => 'admin',
                'updated_name' => 'admin',
            ],[
                'role_id' => 'teacher',
                'role_name' => '考試委員',
                'created_name' => 'admin',
                'updated_name' => 'admin',
            ],
        ]);

        // 預設角色權限
        \DB::table('role_permission')->insert([
            [
                'role_id' => 1,
                'menu_id' => 1,
            ],[
                'role_id' => 1,
                'menu_id' => 2,
            ],[
                'role_id' => 1,
                'menu_id' => 3,
            ],[
                'role_id' => 1,
                'menu_id' => 4,
            ],[
                'role_id' => 2,
                'menu_id' => 4,
            ],[
                'role_id' => 2,
                'menu_id' => 2,
            ],[
                'role_id' => 3,
                'menu_id' => 4,
            ],
        ]);
    }
}
