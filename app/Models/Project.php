<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'task_id',
        'name',
        'model',
        'budget',
        'status',
        'start_date',
        'end_date',
        'description',
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}

