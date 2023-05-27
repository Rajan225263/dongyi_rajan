<?php
/**
 * Author Rajan Bhatta
 * Date: 24/01/2021

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [[
            'user_id' => '1',
            'role_id' => '1'
        ],[
            'user_id' => '2',
            'role_id' => '2'
        ]];

        DB::table('user_roles')->insert($user_roles);
    }
}
