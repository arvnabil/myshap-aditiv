<?php

namespace App\Filament\Resources\ActivationLetterResource\Pages;

use App\Filament\Resources\ActivationLetterResource;
use App\Models\Customer;
use App\Models\ZoomItemSubAccount;
use App\Models\ZoomSubAccount;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateActivationLetter extends CreateRecord
{
    protected static string $resource = ActivationLetterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string|Htmlable
    {
        return __('menu.activation_letters.create_activation_letter');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $zoomSubAccount = ZoomSubAccount::where('id', $data['zoom_sub_account_id'])->first();
        $data['start_date'] = $zoomSubAccount->start_date;
        $data['end_date'] = $zoomSubAccount->end_date;
        $data['code'] = $zoomSubAccount->zoom_product_type->code;

        // check data Item Sub Account
        $zoomItem = ZoomItemSubAccount::where('email', $data['email'])->first();

        if ($zoomItem === null) {
            $customerCheck = Customer::where('email', $data['email'])->first();
            if ($customerCheck) {
                $customer = $customerCheck;
            } else {
                $customer = Customer::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'company_id' => $data['company_id'],
                    'user_id' => auth()->user()->id,
                ]);
            }
            ZoomItemSubAccount::create([
                'account_type' => $zoomSubAccount->zoom_product_type->alias,
                'start_date' => $zoomSubAccount->start_date,
                'end_date' => $zoomSubAccount->end_date,
                'role' => "Member",
                'email' => $data['email'],
                'type' => "Licensed",
                'notes' => "Create in Activation Letter",
                'status' => "Active",
                'is_backup' => false,
                'customer_id' => $customer->id,
                'zoom_sub_account_id' => $zoomSubAccount->id,
            ]);
        } else {
            $customerCheck = Customer::where('email', $data['email'])->first();
            if ($customerCheck) {
                $customer = $customerCheck;
            } else {
                $customer = Customer::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'company_id' => $data['company_id'],
                    'user_id' => auth()->user()->id,
                ]);
            }
            $zoomItem->update([
                'account_type' => $zoomSubAccount->zoom_product_type->alias,
                'start_date' => $zoomSubAccount->start_date,
                'end_date' => $zoomSubAccount->end_date,
                'role' => "Member",
                'email' => $data['email'],
                'type' => "Licensed",
                'notes' => "Update in Activation Letter",
                'status' => "Active",
                'is_backup' => false,
                'customer_id' => $customer->id,
                'zoom_sub_account_id' => $zoomSubAccount->id,
            ]);
        }
        return $data;
    }
}
