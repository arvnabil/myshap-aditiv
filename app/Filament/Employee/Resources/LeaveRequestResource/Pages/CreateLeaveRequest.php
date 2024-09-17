<?php

namespace App\Filament\Employee\Resources\LeaveRequestResource\Pages;

use App\Filament\Employee\Resources\LeaveRequestResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateLeaveRequest extends CreateRecord
{
    protected static string $resource = LeaveRequestResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('menu.leaves.create_leave');
    }

    protected function getRedirectUrl(): string
    {
        // https://filamentphp.com/docs/3.x/panels/resources/editing-records
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    // protected function getSavedNotificationTitle(): ?string
    // {
    //     return 'User updated';
    // }

    // protected function getSavedNotification(): ?Notification
    // {
    //     return Notification::make()
    //         ->success()
    //         ->title('User updated')
    //         ->body('The user has been saved successfully.');
    // }

}
