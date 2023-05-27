<?php
/**
 * Author Rajan Bhatta
 * Date: 24/01/2021

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [[
            'name' => 'Menu Management',
            'parent' => 0,
            'route' => 'menu',
            'sort' => 1,
            'icon' => ''
        ],[
            'name' => 'Menu List',
            'parent' => 1,
            'route' => 'menu',
            'sort' => 1,
            'icon' => ''
        ],[
            'name' => 'Menu Icon',
            'parent' => 1,
            'route' => 'menu.icon',
            'sort' => 2,
            'icon' => ''
        ],[
            'name' => 'Use Management',
            'parent' => 0,
            'route' => 'user',
            'sort' => 2,
            'icon' => ''
        ],[
            'name' => 'User Role',
            'parent' => 4,
            'route' => 'user.role',
            'sort' => 1,
            'icon' => ''
        ],[
            'name' => 'Menu Permission',
            'parent' => 4,
            'route' => 'user.permission',
            'sort' => 2,
            'icon' => ''
        ],[
            'name' => 'Profile Management',
            'parent' => 0,
            'route' => 'project-management',
            'sort' => 3,
            'icon' => ''
        ],[
            'name' => 'Change Password',
            'parent' => 7,
            'route' => 'profile-management.change.password',
            'sort' => 1,
            'icon' => ''
        ],[
            'name' => 'Frontend Menu',
            'parent' => 0,
            'route' => 'frontend-menu',
            'sort' => 4,
            'icon' => ''
        ],[
            'name' => 'View Post',
            'parent' => 9,
            'route' => 'frontend-menu.post.view',
            'sort' => 1,
            'icon' => ''
        ]];

        DB::table('menus')->insert($menus);
    }
}
