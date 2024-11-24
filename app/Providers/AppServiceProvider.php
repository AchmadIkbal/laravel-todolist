<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Services\impl\UserServicesImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, UserServicesImpl::class);

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
