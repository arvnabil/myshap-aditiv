<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'description',
        'pic_name',
        'pic_phone',
        'pic_email'
    ];

    public function activation_letters()
    {
        return $this->hasMany(ActivationLetter::class, 'brand_id');
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
}
