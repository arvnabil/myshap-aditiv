<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'description',
        'code',
        'logo',
    ];

    public function zoom_sub_accounts()
    {
        return $this->hasMany(ZoomItemSubAccount::class, 'customer_id');
    }
}
