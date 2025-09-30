<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templatesnk extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
    ];

    protected $casts = [
        "description"=> "array",
    ];

    public function quotation()
    {
        return $this->hasMany(Quotation::class, 'templatesnk_id');
    }

}
