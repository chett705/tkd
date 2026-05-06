<?php

namespace App\Providers;

use App\Models\Setting;
// use App\Models\MenuGroup;
// use App\Models\Page;
// use App\Models\Cms\Setting;
// use App\Models\SectionItem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Blade::anonymousComponentPath(resource_path('views/backend/components'));
        Schema::defaultStringLength(191);

        View::composer('Frontend.*', function ($view) {
            $view->with(
                'contacts',
                Setting::where('group_name', 'contact')->get()->keyBy('key_name')
            );

            $view->with(
                'branding',
                Setting::where('group_name', 'led')->get()->keyBy('key_name')
            );
        });
    }
}
