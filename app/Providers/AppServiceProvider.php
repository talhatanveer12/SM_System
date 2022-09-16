<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin' , function(User $user){
            return $user->type == 'admin';
        });

        Gate::define('student',function(User $user){
            return $user->type == 'student';
        });

        Gate::define('teacher',function(User $user){
            return $user->type == 'teacher';
        });
    }
}
