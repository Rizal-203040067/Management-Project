<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Order extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'order_number',
        'customer_id',
        'status',
        'total_amount',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['order_number', 'status', 'total_amount'])
            ->useLogName('Order')
            ->setDescriptionForEvent(fn(string $eventName) => "Order has been {$eventName}");
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
