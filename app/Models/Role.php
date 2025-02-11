<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends SpatieRole
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->useLogName('Role')
            ->setDescriptionForEvent(fn (string $eventName) => "Role has been {$eventName}");
    }
}
