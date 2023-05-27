<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SiteSettingSeeder::class,
            UserSeeder::class,
            RolesSeeder::class,
            UserRolesSeeder::class,
            MenuSeeder::class,
            MenuPermissionsSeeder::class,
            IconsSeeder::class,
            AccountSeeder::class
        
        ]);
    }
}
