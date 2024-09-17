<?php

namespace App\Filament\Resources\ZoomProductTypeResource\Pages;

use App\Filament\Resources\ZoomProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZoomProductTypes extends ListRecords
{
    protected static string $resource = ZoomProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
