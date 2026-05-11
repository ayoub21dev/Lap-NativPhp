<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Native\Mobile\Edge\Components\Navigation\BottomNav;
use Native\Mobile\Edge\Components\Navigation\BottomNavItem;
use Native\Mobile\Edge\Components\Navigation\HorizontalDivider;
use Native\Mobile\Edge\Components\Navigation\SideNav;
use Native\Mobile\Edge\Components\Navigation\SideNavHeader;
use Native\Mobile\Edge\Components\Navigation\SideNavItem;
use Native\Mobile\Edge\Components\Navigation\TopBar;
use Native\Mobile\Edge\Components\Navigation\TopBarAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::component('native-top-bar', TopBar::class);
        Blade::component('native-top-bar-action', TopBarAction::class);
        Blade::component('native-bottom-nav', BottomNav::class);
        Blade::component('native-bottom-nav-item', BottomNavItem::class);
        Blade::component('native-side-nav', SideNav::class);
        Blade::component('native-side-nav-header', SideNavHeader::class);
        Blade::component('native-side-nav-item', SideNavItem::class);
        Blade::component('native-horizontal-divider', HorizontalDivider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
