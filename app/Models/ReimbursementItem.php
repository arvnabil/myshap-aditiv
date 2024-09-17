<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ReimbursementItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'reimbursement_date',
        'description',
        'tag_po',
        'amount',
        'receipt',
        'reimbursement_id',
        'company_id',
        'status',
        'checked_by',
    ];

    public static function booted(): void
    {
        self::deleted(function (self $model) {
            if ($model->receipt !== null) {
                Storage::disk('public')->delete($model->receipt);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('receipt') && ($model->getOriginal('receipt') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('receipt'));
            }
        });
    }

    public function reimbursement()
    {
        return $this->belongsTo(ReimbursementRequest::class, 'reimbursement_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function user_checked_by()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }
}
