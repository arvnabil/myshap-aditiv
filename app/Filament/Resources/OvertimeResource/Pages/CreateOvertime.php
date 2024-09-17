<?php

namespace App\Filament\Resources\OvertimeResource\Pages;

use App\Filament\Resources\OvertimeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateOvertime extends CreateRecord
{
    protected static string $resource = OvertimeResource::class;
    public function getTitle(): string|Htmlable
    {
        return __('menu.overtimes.create_overtime');
    }
}
