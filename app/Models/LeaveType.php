<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'max_days_allowed',
        'strict'
    ];

    public function getFullNameAttribute()
    {
        return $this->description . " (" . $this->max_days_allowed . " Hari)";
    }

    public function leaves()
    {
        return $this->hasMany(LeaveRequest::class, 'leave_type_id');
    }
}
