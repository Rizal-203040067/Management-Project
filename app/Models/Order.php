<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer_id',
        'date_order',
        'amount',
        'note',

    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
