<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'sale_price',
        'sale_order_id',
    ];

    public function subcategories(){
        return $this->hasMany(ProductSubCategory::class,'category_id');
    }
}
