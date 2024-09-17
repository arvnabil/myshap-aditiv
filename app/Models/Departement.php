<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function position()
    {
        return $this->hasOne(Position::class, 'departement_id');
    }
}
