<?php

namespace App\Providers;

use App\Models\Categorie;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Auth::check()) {
            $user = Auth::user();
            view()->share('user', $user);
        }
        $categories = Categorie::with('children')->whereNull('parent_id')->orderBy('ordre', 'asc')->get();
        view()->share('categories', $categories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
