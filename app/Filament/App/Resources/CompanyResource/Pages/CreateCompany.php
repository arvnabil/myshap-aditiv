<?php

namespace App\Filament\App\Resources\CompanyResource\Pages;

use App\Filament\App\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    public function getTitle(): string|Htmlable
    {
        return __('menu.companies.create_company');
    }
    
}
