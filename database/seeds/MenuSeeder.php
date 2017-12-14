<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '申請人資料管理',
                'icon'      => 'fa fa-file-text',
                'url'       => '/admin/applicant',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '學制管理',
                'icon'      => 'fa fa-calendar',
                'url'       => '/admin/academy',
            ],
            [
                'parent_id' => 0,
                'order'     => 3,
                'title'     => '學制權限管理',
                'icon'      => 'fa fa-ban',
                'url'       => '/admin/academyPermission',
            ],
            [
                'parent_id' => 0,
                'order'     => 4,
                'title'     => '考委評分管理',
                'icon'      => 'fa fa-check-square',
                'url'       => '/admin/gradeManagement',
            ],
        ]);
    }
}
