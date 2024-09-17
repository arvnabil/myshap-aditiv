<?php

namespace App\Filament\Employee\Resources\LeaveRequestResource\Pages;

use App\Filament\Employee\Resources\LeaveRequestResource;
use App\Filament\Employee\Resources\LeaveRequestResource\Widgets\StatsLeaveOverview;
use App\Imports\LeaveRequestImport;
use App\Models\LeaveRequest;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Maatwebsite\Excel\Facades\Excel;

class ListLeaveRequests extends ListRecords
{
    protected static string $resource = LeaveRequestResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importLeaveRequest')
            ->label('Import Leave Request')
            ->visible(auth()->user()->hasRole('leave_import'))
            ->color('warning')
                ->icon('heroicon-m-document-arrow-down')
                ->form([
                    FileUpload::make('attachment')
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/') . $data['attachment'];
                    Excel::import(new LeaveRequestImport, $file);
                    Notification::make()
                        ->title('Leave Request Imported Successfully')
                        ->icon('heroicon-m-check-circle')
                        ->success()
                        ->body('Dicek kembali ya!')
                        ->send();
                })
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsLeaveOverview::class
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return __('menu.leaves.manage_leave');
    }
}
