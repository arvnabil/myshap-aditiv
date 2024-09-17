<?php

namespace App\Models;

use App\Observers\OvertimeRequestObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy([OvertimeRequestObserver::class])]
class OvertimeRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'request_date',
        'overtime_status',
        'user_id',
        'checked_by',
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
    public function user_checked_by()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function overtime_items()
    {
        return $this->hasMany(OvertimeItem::class, 'overtime_id');
    }
}
