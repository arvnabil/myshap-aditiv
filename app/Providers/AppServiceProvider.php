<?php

namespace App\Providers;

use App\Http\Responses\LogoutResponse;
use App\Models\LeaveRequest;
use App\Observers\LeaveRequestObserver;
use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Js;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentAsset::register([
            Js::make('custom-script', __DIR__ . '/../../resources/js/custom-script.js'),
        ]);
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->visible(outsidePanels: true)
                ->outsidePanelRoutes([
                    'home',
                    // Additional custom routes where the switcher should be visible outside panels
                ])
                ->outsidePanelPlacement(Placement::TopRight)
                ->displayLocale('id')
                ->flags([
                    'id' => asset('flags/id.svg'),
                    'en' => asset('flags/en.svg'),
                ])
                ->circular()
                ->locales(['en', 'id']);
        });
    }
}
