<?php

namespace App\Filament\Resources\OvertimeResource\Pages;

use App\Filament\Resources\OvertimeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateOvertime extends CreateRecord
{
    protected static string $resource = OvertimeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    public function getTitle(): string|Htmlable
    {
        return __('menu.overtimes.create_overtime');
    }
}
