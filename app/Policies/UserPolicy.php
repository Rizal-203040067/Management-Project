<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        return $user->hasAnyRole(['super']);
    }

    /**
     * Determine whether the user can update the model.
     * @param App\Models\User  $user
     * @param App\Models\User  $model
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super']);
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param App\Models\User  $model
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super']);
    }

    /**
     * Determine whether the user can restore the model.
     * @param App\Models\User  $user
     * @param App\Models\User  $model
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super']);
    }

}
