<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\Pages;
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
        $pages = Pages::all();
        view()->share('categories', $categories);
        view()->share('pages', $pages);
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
