<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff', 'finance']);
    }

    /**
     * Determine whether the user can create models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super', 'manager']);
    }

    /**
     * Determine whether the user can update the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Project $project
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Project $project): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff']);
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Project $project
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->hasAnyRole(['super', 'manager']);
    }
    
}
