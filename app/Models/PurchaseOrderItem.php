<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'qty',
        'unit_price',
        'discount',
        'discount_price',
        'vat',
        'vat_price',
        'amount',
        'satuan',
        'purchase_order_id',
    ];

    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}
