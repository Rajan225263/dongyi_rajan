<?php
/**
 * Author Rajan Bhatta
 * Date: 24/01/2021

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icons = [[
            'name' => 'fa-copy'
        ],[
            'name' => 'ion-social-twitter'
        ],[
            'name' => 'ion-ionic'
        ],[
            'name' => 'ion-settings'
        ]];

        DB::table('icons')->insert($icons);
    }
}
