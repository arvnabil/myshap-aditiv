<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'logo',
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
        return $this->hasOne(PurchaseOrder::class, 'supplier_id');
    }
}
