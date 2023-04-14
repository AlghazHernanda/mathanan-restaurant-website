<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', function ($view) {
            //any code to set $val variable
            $admins = User::where('utype', 'ADM')->take(1)->get();
            $view->with('admins', $admins);
        });
    }

    public function register()
    {
        //
    }
}
