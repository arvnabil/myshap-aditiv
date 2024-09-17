<?php

namespace App\Models;

use App\Observers\ReimbursementRequestObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy([ReimbursementRequestObserver::class])]
class ReimbursementRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'request_date',
        'total_amount',
        'reimbursement_status',
        'user_id',
        'checked_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user_checked_by()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function reimbursement_items()
    {
        return $this->hasMany(ReimbursementItem::class, 'reimbursement_id');
    }

    // For UUID
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
}
