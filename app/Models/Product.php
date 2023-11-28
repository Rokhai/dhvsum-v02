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
        'is_active', // this is the product status
        'is_approved', // this is the product approval status
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getPrice()
    {
        return '₱' . number_format($this->price, 2);
    }

    


    // Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
}
