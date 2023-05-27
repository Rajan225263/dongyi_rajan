<?php
/**
 * Author Rajan Bhatta
 * Date: 25/05/2023

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'name' => 'Brack-00001234561',
            'balance' => '30000',
            'created_by' => '1',
        ],[
            'name' => 'Brack-00001234562',
            'balance' => '50000',
            'created_by' => '1',
        ],[
            'name' => 'NRBC-00001234701',
            'balance' => '2000',
            'created_by' => '1',
        ],[
            'name' => 'DutchBangla-00001234901',
            'balance' => '150000',
            'created_by' => '1',
        ],[
            'name' => 'EBL-00001234771',
            'balance' => '1000000',
            'created_by' => '1',
        ]];

        DB::table('accounts')->insert($users);
    }
}
