<?php

namespace App\Filament\Employee\Resources\ReimbursementResource\Pages;

use App\Filament\Employee\Resources\ReimbursementResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateReimbursement extends CreateRecord
{
    protected static string $resource = ReimbursementResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    public function getTitle(): string|Htmlable
    {
        return __('menu.reimbursements.create_reimbursement');
    }
}
