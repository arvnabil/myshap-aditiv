<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'qty',
        'satuan',
        'unit_price',
        'discount',
        'discount_price',
        'amount',
        'quotation_id',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }
}
