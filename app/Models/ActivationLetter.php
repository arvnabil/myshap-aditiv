<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ActivationLetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'email',
        'address',
        'start_date',
        'end_date',
        'total_license',
        'code_reference',
        'company_id',
        'user_id',
        'brand_id',
        'is_prorate',
        'zoom_sub_account_id',
    ];

    protected $casts = [
        'is_prorate' => 'boolean',
    ];

    //  * Get the value indicating whether the IDs are incrementing.
    //  *
    //  * @return bool
    //  */
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function zoom_sub_account()
    {
        return $this->belongsTo(ZoomSubAccount::class, 'zoom_sub_account_id');
    }
}
