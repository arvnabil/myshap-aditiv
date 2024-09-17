<?php

namespace App\Imports;

use App\Models\ZoomProductType;
use App\Models\ZoomSubAccount;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportZoomSubAccount implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new ZoomSubAccount([
            "account_name" => $row['account_name'] ?? "NONAME",
            "account_owner" => $row['account_owner'] ?? 'NONAME',
            "account_number" => $row['account_number'],
            "total_license" => $row['total_license'],
            'start_date'  => $row['start_date'] !== null ? self::getDate($row['start_date']) : null,
            'end_date' => $row['end_date'] !== null ? self::getDate($row['end_date']) : null,
            "activ_email" => $row['activ_email'],
            "dealreg_id" => $row['dealreg_id'],
            "dealreg_info" =>  $row['dealreg_info'],
            "is_active" => $row['is_active'] ?? false,
            "zoom_product_type_id" => self::getZoomProductTypeId($row['zoom_product_type_id']) ?? null,
            "created_at" => $row['created_at'] !== null ? self::getDate($row['created_at']) : null,
        ]);
    }

    public static function getZoomProductTypeId($alias)
    {
        if($alias){
            return  ZoomProductType::where('alias', $alias)->first()->id;
        }
    }

    public static function getDate($date)
    {
        return Carbon::parse($date)->timezone('Asia/Jakarta')->format('Y-m-d');
    }
}
