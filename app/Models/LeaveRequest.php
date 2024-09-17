<?php

namespace App\Models;

use App\Observers\LeaveRequestObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[ObservedBy([LeaveRequestObserver::class])]
class LeaveRequest extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'description',
        'status',
        'year',
        'total_leave',
        'attachment',
        'user_id',
        'approved_at',
        'checked_by',
        'leave_type_id',
        'is_imported'
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'approved_at' => 'date',
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
        self::deleted(function (self $model) {
            if ($model->attachment !== null) {
                Storage::disk('public')->delete($model->attachment);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('attachment') && ($model->getOriginal('attachment') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('attachment'));
            }
        });
    }

    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user_checked_by()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }
}
