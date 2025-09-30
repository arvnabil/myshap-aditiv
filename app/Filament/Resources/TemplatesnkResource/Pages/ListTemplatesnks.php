<?php

namespace App\Filament\Resources\TemplatesnkResource\Pages;

use App\Filament\Resources\TemplatesnkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemplatesnks extends ListRecords
{
    protected static string $resource = TemplatesnkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
