<?php

namespace App\Filament\App\Resources\ProrateCertificationResource\Pages;

use App\Filament\App\Resources\ProrateCertificationResource;
use App\Models\Customer;
use App\Models\ZoomItemSubAccount;
use App\Models\ZoomSubAccount;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditProrateCertification extends EditRecord
{
    protected static string $resource = ProrateCertificationResource::class;
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
        return __('menu.activation_letters.update_activation_letter');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $zoomSubAccount = ZoomSubAccount::where('id', $data['zoom_sub_account_id'])->first();
        $data['code'] = $zoomSubAccount->zoom_product_type->code;
        $data['user_id'] = auth()->user()->id;

        // check data Item Sub Account
        $zoomItem = ZoomItemSubAccount::where('email', $data['email'])->first();
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
        if ($data['is_prorate'] === true ) {
            $zoomItem->update([
                'account_type' => $zoomSubAccount->zoom_product_type->alias,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'role' => "Member",
                'email' => $data['email'],
                'type' => "Licensed",
                'notes' => "Update in Activation Letter",
                'status' => "Active",
                'is_backup' => false,
                'customer_id' => $customer->id,
                'zoom_sub_account_id' => $zoomSubAccount->id,
            ]);
        }else{
            $data['start_date'] = $zoomSubAccount->start_date;
            $data['end_date'] = $zoomSubAccount->end_date;
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
