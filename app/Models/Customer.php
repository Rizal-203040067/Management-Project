<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Customer extends Model
{
    use HasFactory;
    use LogsActivity;


    protected $fillable = [
        'name',
        'email',
        'contact',
        'address',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'contact', 'address'])
            ->useLogName('Customer')
            ->setDescriptionForEvent(fn(string $eventName) => "Customer has been {$eventName}");
    }
}
