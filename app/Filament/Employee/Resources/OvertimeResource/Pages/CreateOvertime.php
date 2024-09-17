<?php

namespace App\Filament\Employee\Resources\OvertimeResource\Pages;

use App\Filament\Employee\Resources\OvertimeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateOvertime extends CreateRecord
{
    protected static string $resource = OvertimeResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('menu.overtimes.create_overtime');
    }

    protected function getRedirectUrl(): string
    {
        // https://filamentphp.com/docs/3.x/panels/resources/editing-records
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
