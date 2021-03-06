<?php

namespace App\Providers;

use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(ParserService::class, function (){
//            return new ParserService();
//        });
        $this->app->bind(SocialService::class, function (){
            return new SocialService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
