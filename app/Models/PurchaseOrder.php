<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'due_date',
        'purchase_order_date',
        'purchase_order_number',
        'spelled_out',
        'message',
        'ppn',
        'subtotal',
        'total',
        'insufficient_payment',
        'supplier_id',
        'user_id'
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchase_order_items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'purchase_order_id');
    }
}
