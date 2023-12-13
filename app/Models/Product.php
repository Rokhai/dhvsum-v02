<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $casts = [
        'is_active' => 'boolean',
        'is_approved' => 'boolean',
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

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected static function booted()
    {
        static::created(function ($product) {
            // Get the lowest rating from the feedback table
            $lowestRating = \DB::table('ratings')->orderBy('id')->first();
            // ::min('rating');

            // Create a new feedback for the product with the lowest rating
            \App\Models\Feedback::create([

                'product_id' => $product->id,
                'user_id' => '1', // Add the user_id here
                'rating_id' => $lowestRating->id,
                'rating' => $lowestRating->rating,

                // Add other necessary fields here
            ]);
        });
    }
    public function feedback()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    
    // Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
}
