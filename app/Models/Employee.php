<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'account_number',
        'phone_number',
        'gender',
        'dateofbirth',
        'dateofjoining',
        'dateofleaving',
        'blood_group',
        'address',
        'pincode',
        'user_id',
        'city',
        'zip_code',
        'matrial_status',
        'position_id',
        'nationality_id'
    ];

    public function getFullNameAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }
}
