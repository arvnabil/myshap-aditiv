<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responsable;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements Responsable
{
    public function toResponse($request): RedirectResponse
    {
        Notification::make()
            ->title('Logout Berhasil!')
            ->success()
            ->body('Good Bye 🤚 ')
            ->icon('heroicon-m-shield-check')
            ->send();
        // change this to your desired route
        return redirect()->route('home');
    }
}
