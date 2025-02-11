<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff']);
    }

    /**
     * Determine whether the user can create models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff']);
    }

    /**
     * Determine whether the user can update the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Task $task
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Task $task): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff']);
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Task $task
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'staff']);
    }
    
}
