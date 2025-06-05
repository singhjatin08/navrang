<?php

namespace App\Providers;

use App\Http\Middleware\loginMiddleware;
use App\Models\category\categoryModel;
use App\Models\metaModel;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middlewareGroup('adminCheck', [
            loginMiddleware::class,
        ]);

        View::composer('*', function ($view) {
            $categories = categoryModel::where('status', 1)->orderBy('id','desc')->get();
            $footercategories = categoryModel::where('status', 1)->whereNull('parent_id')->limit(4)->orderBy('id', 'desc')->get();

            $meta = metaModel::orderBy('id', 'desc')->first();
            $view->with([
                    'header_categories'=>$categories,
                    'top_categories'=> $footercategories,
                    'meta'=>$meta,
                ]);
        });
        // View::composer('*', function ($view) {
            
        //     $view->with('top_categories', $categories);
        // });
        // View::composer('*', function ($view) {
        //     $meta = metaModel::orderBy('id', 'desc')->first();
        //     $view->with();
        // });
    }
}
