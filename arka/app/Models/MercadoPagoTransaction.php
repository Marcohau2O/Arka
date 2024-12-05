<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MercadoPagoTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'collection_status',
        'external_reference',
        'merchant_account_id',
        'merchant_order_id',
        'payment_id',
        'payment_type',
        'preference_id',
        'processing_mode',
        'site_id',
        'status',
        'user_name',
        'user_email',
        'tasks',
        'total_amount',
    ];
}
