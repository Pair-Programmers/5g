<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_price',
        'opening_qty',
        'available_qty',
        'category_id',
        'sub_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
        'colors',
        'description',
        'brand',
    ];

    public function category(){
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function subCategory(){
        return $this->hasOne(ProductSubCategory::class, 'id', 'sub_category_id');
    }

}
