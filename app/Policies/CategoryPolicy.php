<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super', 'finance']);
    }

    /**
     * Determine whether the user can create models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super', 'finance']);
    }

    /**
     * Determine whether the user can update the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Category $category
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Category $category): bool
    {
        return $user->hasAnyRole(['super', 'finance']);
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Category $category
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->hasAnyRole(['super', 'finance']);
    }
    
}
