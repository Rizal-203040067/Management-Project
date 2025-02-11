<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Transaction;
use App\Policies\RolePolicy;
use App\Policies\TaskPolicy;
use App\Policies\UserPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ActivityPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use App\Policies\TransactionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, ActivityPolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Transaction::class, TransactionPolicy::class);
        Gate::policy(Customer::class, CustomerPolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);
        Gate::policy(Project::class, ProjectPolicy::class);
        Gate::policy(Task::class, TaskPolicy::class);

    }
}
