<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('menu.companies.create_company');
    }
}
