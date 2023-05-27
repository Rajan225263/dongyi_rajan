<?php
/**
 * Author Rajan Bhatta
 * Date: 24/01/2021

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_settings = [[
            'company_name' => 'Rajan',
            'site_title' => 'Accounts System',
            'site_title_bn' => ' ',
            'site_short_description' => ' ',
            'site_short_description_bn' => ' ',
            'site_header_logo' => '20190821_1566385367712.png',
            'site_footer_logo' => '20190821_1566385399772.png',
            'site_favicon' => '20190821_1566373763949.jpg',
            'site_banner_image' => '20190821_1566373763367.jpg',
            'file_type' => 'jpeg|png|jpg|gif'
        ]];

        DB::table('site_settings')->insert($site_settings);
    }
}
