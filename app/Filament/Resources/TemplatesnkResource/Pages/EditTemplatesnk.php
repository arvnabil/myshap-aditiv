<?php

namespace App\Filament\Resources\TemplatesnkResource\Pages;

use App\Filament\Resources\TemplatesnkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplatesnk extends EditRecord
{
    protected static string $resource = TemplatesnkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
