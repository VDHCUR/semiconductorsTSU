<?php

namespace App\Providers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {
            // App is not running in CLI context
            // Do HTTP-specific stuff here

            View::share('director', new UserResource(User::where('deleted', 0)->whereHas('person', function($query) {
                $query->where('position', '=', 'Зав. кафедрой');
            })->latest()->first()));
        }
    }
}
