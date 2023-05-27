<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Interface

use App\Contracts\AttendanceApiInterface;
use App\Contracts\ReportInterface;
use App\Contracts\DefaultSettingInterface;

//Repositories
use App\Repositories\AttendanceApiRepo;
use App\Repositories\ReportsRepo;
use App\Repositories\DefaultSettingRepo;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(AttendanceApiInterface::class, AttendanceApiRepo::class);
        $this->app->bind(ReportInterface::class, ReportsRepo::class);
         $this->app->bind(DefaultSettingInterface::class, DefaultSettingRepo::class);
    }
}
