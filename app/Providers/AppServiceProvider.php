<?php

namespace App\Providers;

use App\Models\User;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Writer;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
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

        Gate::define('guardian',function(User $user){
            return $user->type == 'guardian';
        });

    

        Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });
        Writer::macro('setCreator', function (Writer $writer, string $creator) {
            $writer->getDelegate()->getProperties()->setCreator($creator);
        });
        Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
            $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
        });

    }
}
