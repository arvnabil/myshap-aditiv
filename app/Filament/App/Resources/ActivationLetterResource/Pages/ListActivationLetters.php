<?php

namespace App\Filament\App\Resources\ActivationLetterResource\Pages;

use App\Filament\App\Resources\ActivationLetterResource;
use App\Imports\ActivationLetterImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Maatwebsite\Excel\Facades\Excel;

class ListActivationLetters extends ListRecords
{
    protected static string $resource = ActivationLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTitle(): string|Htmlable
    {
        return __('menu.activation_letters.manage_activation_letter');
    }

}
