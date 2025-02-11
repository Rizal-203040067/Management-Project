<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super']);
    }

    /**
     * Determine whether the user can create models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Activity $activity
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Activity $activity): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Activity $activity
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Activity $activity): bool
    {
        return false;
    }
    
}
