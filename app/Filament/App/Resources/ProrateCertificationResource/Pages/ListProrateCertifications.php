<?php

namespace App\Filament\App\Resources\ProrateCertificationResource\Pages;

use App\Filament\App\Resources\ProrateCertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListProrateCertifications extends ListRecords
{
    protected static string $resource = ProrateCertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return __('Prorate Activation Letter');
    }
}
