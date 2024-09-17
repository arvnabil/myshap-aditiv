<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ZoomSubAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_owner',
        'account_number',
        'total_license',
        'start_date',
        'end_date',
        'activ_email',
        'is_active',
        'dealreg_info',
        'dealreg_id',
        'zoom_product_type_id',
    ];

    public function getNameWithTypeAttribute()
    {
        return $this->account_name . " - " . $this->account_number . " - " . $this->account_owner . " (" . $this->zoom_product_type->alias . ")";
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public static function booted(): void
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function zoom_product_type()
    {
        return $this->belongsTo(ZoomProductType::class, 'zoom_product_type_id');
    }

    public function zoom_item_sub_account_items()
    {
        return $this->hasMany(ZoomItemSubAccount::class, 'zoom_sub_account_id');
    }
    public function activation_letter()
    {
        return $this->hasMany(ActivationLetter::class, 'zoom_sub_account_id');
    }

}
