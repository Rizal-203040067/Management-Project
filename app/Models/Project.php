<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'task_id',
        'is_done',
        'deadline',
        'model',
        'description',
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}

