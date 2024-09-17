<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use App\Filament\Employee\Pages\DashboardEmployee;
use App\Filament\Employee\Pages\MyProfile;
use App\Filament\Employee\Widgets\ProfileOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class EmployeePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('employee')
            ->path('employee')
            ->login(Login::class)
            ->passwordReset()
            ->emailVerification(EmailVerificationPrompt::class)
            ->profile()
            ->favicon(asset('images/apple-icon.png'))
            ->breadcrumbs(false)
            ->collapsibleNavigationGroups(false)
            ->sidebarCollapsibleOnDesktop()
            ->userMenuItems([
                'logout' => MenuItem::make()->label('Log out'),
                'profile' => MenuItem::make()->url(fn (): string => MyProfile::getUrl()),
                MenuItem::make()
                    ->label('App')
                    ->icon('heroicon-m-rocket-launch')
                    ->url('/app'),
                MenuItem::make()
                    ->label('Administrator')
                    ->icon('heroicon-m-arrow-right-start-on-rectangle')
                    ->url('/administrator')

            ])
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => "#f67d2e",
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Employee/Resources'), for: 'App\\Filament\\Employee\\Resources')
            ->discoverPages(in: app_path('Filament/Employee/Pages'), for: 'App\\Filament\\Employee\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Employee/Widgets'), for: 'App\\Filament\\Employee\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->databaseNotifications()
            ->plugins([
                \Hasnayeen\Themes\ThemesPlugin::make()
            ]);
    }
}
