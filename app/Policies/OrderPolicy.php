<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param App\Models\User  $user
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'finance']);
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
     * @param Spatie\Permission\Models\Order $order
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Order $order): bool
    {
        return $user->hasAnyRole(['super', 'manager', 'finance']);
    }

    /**
     * Determine whether the user can delete the model.
     * @param App\Models\User  $user
     * @param Spatie\Permission\Models\Order $order
     * @return Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Order $order): bool
    {
        return $user->hasAnyRole(['super']);
    }
    
}
