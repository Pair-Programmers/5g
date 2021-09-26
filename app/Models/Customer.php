<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    	'name',
    	'phone',
    	'adress',
    	'email',
    	'image_path',
    	'type',
    	'balance',
    	'opening_balance',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'balance' => 'integer',
        'opening_balance' => 'integer'
    ];
}
