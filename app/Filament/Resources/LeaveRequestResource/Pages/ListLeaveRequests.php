<?php

namespace App\Filament\Resources\LeaveRequestResource\Pages;

use App\Filament\Resources\LeaveRequestResource;
use App\Imports\LeaveRequestImport;
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
                ->color('warning')
                ->icon('heroicon-m-document-arrow-down')
                ->form([
                    FileUpload::make('attachment')
                ])
                ->action(function(array $data){
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

    public function getTitle(): string|Htmlable
    {
        return __('menu.leaves.manage_leave');
    }
}
