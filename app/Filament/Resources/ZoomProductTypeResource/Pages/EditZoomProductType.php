<?php

namespace App\Filament\Resources\ZoomProductTypeResource\Pages;

use App\Filament\Resources\ZoomProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZoomProductType extends EditRecord
{
    protected static string $resource = ZoomProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
