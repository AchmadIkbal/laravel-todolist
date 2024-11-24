<?php

namespace App\Providers;

use App\Services\impl\UserServicesImpl;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons =[
        UserService::class => UserServicesImpl::class,
    ];
    public function provides(){
        return [UserService::class];
    }
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
        //
    }
}
