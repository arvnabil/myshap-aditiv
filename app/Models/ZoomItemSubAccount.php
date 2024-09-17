<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ZoomItemSubAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type',
        'start_date',
        'end_date',
        'role',
        'email',
        'type',
        'notes',
        'status',
        'is_backup',
        'customer_id',
        'zoom_sub_account_id',
    ];

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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function zoom_sub_account()
    {
        return $this->belongsTo(ZoomSubAccount::class, 'zoom_sub_account_id');
    }
}
