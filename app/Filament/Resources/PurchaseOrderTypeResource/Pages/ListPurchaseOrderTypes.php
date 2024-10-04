<?php

namespace App\Filament\Resources\PurchaseOrderTypeResource\Pages;

use App\Filament\Resources\PurchaseOrderTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPurchaseOrderTypes extends ListRecords
{
    protected static string $resource = PurchaseOrderTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
