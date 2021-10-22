<?php

namespace ifresh\Fakkel;

use ifresh\Fakkel\Fakkel;
use Illuminate\Support\ServiceProvider;

class FakkelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fakkel',function(){
            return new Fakkel(env('FAKKEL_TOKEN'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
