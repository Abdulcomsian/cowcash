<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use MongoDB\Driver\Session;

class SettingsServiceProvider extends ServiceProvider
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
        config([
            'global' =>  Settings::first(),
        ]);
    }
}
