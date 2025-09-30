<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_number',
        'quotation_date',
        'due_date',
        'ppn',
        'subtotal',
        'total',
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_company',
        'customer_phone',
        'customer_id',
        'user_id',
        'templatesnk_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quotation_items()
    {
        return $this->hasMany(QuotationItem::class, 'quotation_id');
    }

    public function templatesnk()
    {
        return $this->belongsTo(Templatesnk::class, 'templatesnk_id');
    }
}
