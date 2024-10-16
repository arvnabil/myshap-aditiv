<?php

namespace App\Filament\App\Resources\QuotationResource\Pages;

use App\Filament\App\Resources\QuotationResource;
use App\Models\Company;
use App\Models\Customer;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditQuotation extends EditRecord
{
    protected static string $resource = QuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $customerId = Customer::where('email', $data['customer_email'])->first();
        if ($customerId === null) {
            $newCustomer = Customer::create([
                'name' => $data['customer_name'],
                'email' => $data['customer_email'],
                'phone' => $data['customer_phone'],
                'address' => $data['customer_address'],
                'user_id' => Auth::user()->id,
            ]);
            $customerId = $newCustomer;
        }
        $company = Company::where('name', $data['customer_company'])->first();
        if ($company === null) {

            $newCompany = Company::create([
                'name' => $data['customer_company'],
                'user_id' => Auth::user()->id,
            ]);

            $customerId->company_id = $newCompany->id;
            $customerId->user_id = Auth::user()->id;
            $customerId->update();
        } else {
            $customerId->company_id = $company->id;
            $customerId->user_id = Auth::user()->id;
            $customerId->update();
        }
        $data['customer_id'] = $customerId->id;
        return $data;
    }
}
