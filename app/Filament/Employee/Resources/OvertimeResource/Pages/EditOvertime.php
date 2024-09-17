<?php

namespace App\Filament\Employee\Resources\OvertimeResource\Pages;

use App\Filament\Employee\Resources\OvertimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditOvertime extends EditRecord
{
    protected static string $resource = OvertimeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return __('menu.overtimes.update_overtime');
    }
}
