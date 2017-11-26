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
        Role::create([
            'role_id' => 'administrator',
            'role_name' => '最高管理員',
            'created_name' => 'admin',
            'updated_name' => 'admin',
        ]);
        Role::create([
            'role_id' => 'manager',
            'role_name' => '管理員',
            'created_name' => 'admin',
            'updated_name' => 'admin',
        ]);
        Role::create([
            'role_id' => 'teacher',
            'role_name' => '考試委員',
            'created_name' => 'admin',
            'updated_name' => 'admin',
        ]);
    }
}
