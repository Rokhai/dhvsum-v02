<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'rating_id',
        'product_id',
        'comment',
        'rating',
    ];
}


