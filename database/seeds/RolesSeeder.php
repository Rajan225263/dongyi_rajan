<?php
/**
 * Author M. Atoar Rahman
 * Date: Rajan Bhatta

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [[
            'name' => 'Admin'
        ],[
            'name' => 'Author'
        ]];

        DB::table('roles')->insert($roles);
    }
}
