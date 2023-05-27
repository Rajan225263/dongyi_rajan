<?php
/**
 * Author Rajan Bhatta
 * Date: 25/01/2021

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'name' => 'Administrtor',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'remember_token' => 'glfK3hWZnR7TbWGCwV2CfsDh8Q1lVhO9p3Ry7fsWXcVDV1pNJU905JnpYrm9'
        ],[
            'name' => 'Author',
            'username' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('123'),
            'remember_token' => 'glfK3hWZnR7TbWGCwV2CfsDh8Q1lVhO9p3Ry7fsWXcVDV1pNJU905JnpYrm9'
        ]];

        DB::table('users')->insert($users);
    }
}
