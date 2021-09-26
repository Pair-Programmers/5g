<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSubCategory;


class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function subcategories(){
        return $this->hasMany(ProductSubCategory::class,'category_id');
    }
}
