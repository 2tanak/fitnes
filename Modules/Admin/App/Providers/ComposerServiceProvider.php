<?php

namespace Modules\Admin\App\Providers;

use Modules\Admin\App\Http\ViewComposers\ResourceComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // main
		$route = Route::currentRouteName();
		dd($route);
        View::composer('admin::page.'.$route, ResourceComposer::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
