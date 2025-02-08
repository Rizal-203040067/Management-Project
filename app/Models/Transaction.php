<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Transaction extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'category_id',
        'date_transaction',
        'amount',
        'note',
        'image',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'date_transaction', 'amount', 'note', 'image'])
            ->useLogName('Transaction')
            ->setDescriptionForEvent(fn(string $eventName) => "Transaction has been {$eventName}");
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeExpenses($query) {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', true);
        });
    }

    public function scopeIncomes($query) {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', false);
        });
    }
}
