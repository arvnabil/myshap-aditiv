<?php

namespace App\Filament\Employee\Resources\ReimbursementResource\Pages;

use App\Filament\Employee\Resources\ReimbursementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListReimbursements extends ListRecords
{
    protected static string $resource = ReimbursementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return __('menu.reimbursements.manage_reimbursement');
    }
}
