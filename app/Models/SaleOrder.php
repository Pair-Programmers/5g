<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'total_amount',
        'no_of_items',
        'no_of_products',
        'date',
        'user_id',
        'discount',
        'reference_no',
        'description'
    ];

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function detail(){
        return $this->hasMany(SaleOrderDetail::class, 'sale_order_id');
    }
}
