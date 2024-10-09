<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'address',
        'phone',
        'email',
        'user_id',
        'city',
        'state',
        'zipcode',
        'country',
        'is_active',
        'website'
    ];

    public function reimbursement_items()
    {
        return $this->hasMany(ReimbursementItem::class, 'company_id');
    }

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
