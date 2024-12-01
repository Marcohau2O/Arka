<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 
        'payer_id', 
        'payment_id', 
        'payment_source', 
        'facilitator_access_token', 
        'user_name', 
        'user_email',
        'cart',
        'total_amount',
        'status',
    ];
}
