<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvertimeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_in',
        'time_out',
        'activity_name',
        'overtime_date',
        'reason',
        'total_hours',
        'status',
        'overtime_id',
    ];

    public function overtime()
    {
        return $this->belongsTo(OvertimeRequest::class, 'overtime_id');
    }
}
