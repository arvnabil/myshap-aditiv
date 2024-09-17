<?php

namespace App\Filament\Resources\ZoomSubAccountResource\Pages;

use App\Filament\Resources\ZoomSubAccountResource;
use App\Imports\ImportZoomSubAccount;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListZoomSubAccounts extends ListRecords
{
    protected static string $resource = ZoomSubAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importSubAccountRequest')
            ->label('Import Sub Account Request')
            ->color('warning')
                ->icon('heroicon-m-document-arrow-down')
                ->form([
                    FileUpload::make('attachment')
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/') . $data['attachment'];
                    Excel::import(new ImportZoomSubAccount, $file);
                    Notification::make()
                        ->title('Zoom Request Imported Successfully')
                        ->icon('heroicon-m-check-circle')
                        ->success()
                        ->body('Dicek kembali ya!')
                        ->send();
                })
        ];
    }
}
