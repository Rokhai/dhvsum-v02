<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id', // this is the backpack user
        'image', // this is the product image
        'name',
        'stock', // this is the product stock
        'price',
        'description',
        'category_id',
    ];
}
