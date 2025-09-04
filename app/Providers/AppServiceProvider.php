<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
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
        FilamentColor::register([
                'primary' => Color::generateV3Palette('#047857'),
        ]);

        FilamentView::registerRenderHook(
            PanelsRenderHook::SIDEBAR_FOOTER,
            function () {
                return view('filament.panels.sidebar-footer');
            }
        );
    }
}
