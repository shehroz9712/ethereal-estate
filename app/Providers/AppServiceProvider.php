<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\Blade::component('app-layout', \App\View\Components\AppLayout::class);
        \Illuminate\Support\Facades\Blade::component('layouts.app', \App\View\Components\AppLayout::class);
        \Illuminate\Support\Facades\Blade::component('admin-layout', \App\View\Components\AdminLayout::class);
        \Illuminate\Support\Facades\Blade::component('layouts.admin', \App\View\Components\AdminLayout::class);
        \Illuminate\Support\Facades\Blade::component('user-layout', \App\View\Components\UserLayout::class);
        \Illuminate\Support\Facades\Blade::component('layouts.user', \App\View\Components\UserLayout::class);
    }
}
