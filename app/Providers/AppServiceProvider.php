<?php

namespace App\Providers;

use App\Models\Category;
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

        $categories = Category::select(['name','slug'])->where('category_id', null)->get();
        View::share('categories', $categories);

    }
}
