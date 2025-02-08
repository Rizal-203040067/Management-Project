<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'model', 'budget', 'status', 'start_date', 'end_date', 'description'])
            ->useLogName('Project')
            ->setDescriptionForEvent(fn(string $eventName) => "Project has been {$eventName}");
    }

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

