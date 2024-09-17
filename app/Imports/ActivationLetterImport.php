<?php

namespace App\Imports;

use App\Models\ActivationLetter;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use App\Models\ZoomItemSubAccount;
use App\Models\ZoomSubAccount;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ActivationLetterImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $zoomSubAccount = ZoomSubAccount::where('account_number', $row['account_number'])->first();
        $userId = self::getUserIdFromIDEmployee($row['user_id']);
        // check data Item Sub Account
        $zoomItem = ZoomItemSubAccount::where('zoom_sub_account_id', $zoomSubAccount->id)
        ->orWhere('email', $row['email'])->first();
        $company = self::getCompanyId($row['company_id'], $userId);
        if ($zoomItem === null) {
            $customerCheck = Customer::where('email', $row['email'])->first();
            if ($customerCheck) {
                $customer = $customerCheck;
            } else {
                $customer = Customer::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'address' => $row['address'],
                    'company_id' => $company,
                    'user_id' => $userId,
                ]);
            }
            ZoomItemSubAccount::create([
                'account_type' => $zoomSubAccount->zoom_product_type->alias,
                'start_date' => $zoomSubAccount->start_date,
                'end_date' => $zoomSubAccount->end_date,
                'role' => "Member",
                'email' => $row['email'],
                'type' => "Licensed",
                'notes' => "Create in Activation Letter",
                'status' => "Active",
                'is_backup' => false,
                'customer_id' => $customer->id,
                'zoom_sub_account_id' => $zoomSubAccount->id,
            ]);
        }

        return new ActivationLetter([
            'code' => $zoomSubAccount->zoom_product_type->code,
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            // 'start_date'  => self::getDate($row['start_date']),
            // 'end_date' => self::getDate($row['end_date']),
            'start_date'  => $zoomSubAccount->start_date,
            'end_date' => $zoomSubAccount->end_date,
            'total_license' => $row['total_license'],
            'code_reference' => $row['code_reference'],
            'user_id' => $userId,
            'brand_id' => self::getBrandId($row['brand_id']),
            'company_id' => $company,
            'zoom_sub_account_id' => $zoomSubAccount->id,
        ]);
    }

    public static function getBrandId(string $name)
    {
        $cekBrand =  Brand::where('name', $name)->first();

        if($cekBrand){
            return $cekBrand->id;
        }

        $newBrand = Brand::create(['name' => $name]);

        return $newBrand->id;
    }

    public static function getCompanyId(string $name, $userId)
    {
        $cekCompany =  Company::where('name', $name)->first();

        if ($cekCompany) {
            return $cekCompany->id;
        }

        $newCompany = Company::create([
            'name' => $name,
            'user_id' => $userId,
        ]);

        return $newCompany->id;
    }

    public static function getUserIdFromIDEmployee(string $idEmployee)
    {
        return User::whereHas('employee', function ($query) use ($idEmployee) {
            return $query->where('account_number', '=', $idEmployee);
        })->first()->id;
    }

    public static function getDate(string $date)
    {
        return Carbon::parse($date)->timezone('Asia/Jakarta')->format('Y-m-d');
    }
}
