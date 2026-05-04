<?php

namespace App\Providers;

// use App\Models\MenuGroup;
// use App\Models\Page;
// use App\Models\Cms\Setting;
// use App\Models\SectionItem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\View;
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
    }
}
