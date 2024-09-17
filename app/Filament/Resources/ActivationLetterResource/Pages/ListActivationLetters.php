<?php

namespace App\Filament\Resources\ActivationLetterResource\Pages;

use App\Filament\Resources\ActivationLetterResource;
use App\Imports\ActivationLetterImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListActivationLetters extends ListRecords
{
    protected static string $resource = ActivationLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importLeaveRequest')
            ->label('Import Activation Letter')
            ->color('warning')
                ->icon('heroicon-m-document-arrow-down')
                ->form([
                    FileUpload::make('attachment')
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/') . $data['attachment'];

                    Excel::import(new ActivationLetterImport, $file);
                    Notification::make()
                        ->title('Activation Letter Imported Successfully')
                        ->icon('heroicon-m-check-circle')
                        ->success()
                        ->body('Dicek kembali ya!')
                        ->send();
                })
        ];
    }
}
