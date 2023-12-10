<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_id',
        'order_id',
        'amount',
        'payment_method',
        'payment_status',
        'gcash_number',
        'gcash_transaction_id',
        // 'merchant_name'
    ];
}
