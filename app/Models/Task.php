<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'deadline',
        'is_done',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
