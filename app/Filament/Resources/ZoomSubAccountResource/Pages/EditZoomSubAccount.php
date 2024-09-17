<?php

namespace App\Filament\Resources\ZoomSubAccountResource\Pages;

use App\Filament\Resources\ZoomSubAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZoomSubAccount extends EditRecord
{
    protected static string $resource = ZoomSubAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
