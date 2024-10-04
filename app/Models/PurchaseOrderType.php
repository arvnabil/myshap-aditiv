<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PurchaseOrderType extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_alias',
        'company_name',
        'company_phone',
        'company_address',
        'company_email',
        'logo',
        'npwp_number',
    ];

    public static function booted(): void
    {
        self::deleted(function (self $model) {
            if ($model->logo !== null) {
                Storage::disk('public')->delete($model->logo);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('logo') && ($model->getOriginal('logo') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('logo'));
            }
        });
    }

    public function purchase_order()
    {
        return $this->hasMany(PurchaseOrder::class, 'purchase_order_type_id');
    }

}
