<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_code',
        'alpha_2_code',
        'alpha_3_code',
        'en_short_name',
        'nationality',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'nationality_id');
    }
}
