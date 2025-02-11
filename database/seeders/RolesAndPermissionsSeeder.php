<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // Activity Model
        $activityPermission2 = Permission::create(['name' => 'read: activity']);

        // User Model
        $userPermission1 = Permission::create(['name' => 'create: user']);
        $userPermission2 = Permission::create(['name' => 'read: user']);
        $userPermission3 = Permission::create(['name' => 'update: user']);
        $userPermission4 = Permission::create(['name' => 'delete: user']);

        // Role Model
        $rolePermission1 = Permission::create(['name' => 'create: role']);
        $rolePermission2 = Permission::create(['name' => 'read: role']);
        $rolePermission3 = Permission::create(['name' => 'update: role']);
        $rolePermission4 = Permission::create(['name' => 'delete: role']);

        // Permission Model
        $permission1 = Permission::create(['name' => 'create: permission']);
        $permission2 = Permission::create(['name' => 'read: permission']);
        $permission3 = Permission::create(['name' => 'update: permission']);
        $permission4 = Permission::create(['name' => 'delete: permission']);

        // Admins
        $adminPermission1 = Permission::create(['name' => 'read: admin']);
        $adminPermission2 = Permission::create(['name' => 'update: admin']);

        // Category Model
        $categoryPermission1 = Permission::create(['name' => 'create: category']);
        $categoryPermission2 = Permission::create(['name' => 'read: category']);
        $categoryPermission3 = Permission::create(['name' => 'update: category']);
        $categoryPermission4 = Permission::create(['name' => 'delete: category']);

        // Transaction Model
        $transactionPermission1 = Permission::create(['name' => 'create: transaction']);
        $transactionPermission2 = Permission::create(['name' => 'read: transaction']);
        $transactionPermission3 = Permission::create(['name' => 'update: transaction']);
        $transactionPermission4 = Permission::create(['name' => 'delete: transaction']);

        // Customer Model
        $customerPermission1 = Permission::create(['name' => 'create: customer']);
        $customerPermission2 = Permission::create(['name' => 'read: customer']);
        $customerPermission3 = Permission::create(['name' => 'update: customer']);
        $customerPermission4 = Permission::create(['name' => 'delete: customer']);

        // Order Model
        $orderPermission1 = Permission::create(['name' => 'create: order']);
        $orderPermission2 = Permission::create(['name' => 'read: order']);
        $orderPermission3 = Permission::create(['name' => 'update: order']);
        $orderPermission4 = Permission::create(['name' => 'delete: order']);

        // Project Model
        $projectPermission1 = Permission::create(['name' => 'create: project']);
        $projectPermission2 = Permission::create(['name' => 'read: project']);
        $projectPermission3 = Permission::create(['name' => 'update: project']);
        $projectPermission4 = Permission::create(['name' => 'delete: project']);

        // Task Model
        $taskPermission1 = Permission::create(['name' => 'create: task']);
        $taskPermission2 = Permission::create(['name' => 'read: task']);
        $taskPermission3 = Permission::create(['name' => 'update: task']);
        $taskPermission4 = Permission::create(['name' => 'delete: task']);

        // Create Roles
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);
        $superRole = Role::create(['name' => 'super'])->syncPermissions([
            $activityPermission2,
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $categoryPermission1,
            $categoryPermission2,
            $categoryPermission3,
            $categoryPermission4,
            $transactionPermission1,
            $transactionPermission2,
            $transactionPermission3,
            $transactionPermission4,
            $customerPermission1,
            $customerPermission2,
            $customerPermission3,
            $customerPermission4,
            $orderPermission1,
            $orderPermission2,
            $orderPermission3,
            $orderPermission4,
            $projectPermission1,
            $projectPermission2,
            $projectPermission3,
            $projectPermission4,
            $taskPermission1,
            $taskPermission2,
            $taskPermission3,
            $taskPermission4,
            $adminPermission1,
            $adminPermission2,
        ]);
        $managerRole = Role::create(['name' => 'manager'])->syncPermissions([
            $orderPermission1,
            $orderPermission2,
            $orderPermission3,
            $projectPermission1,
            $projectPermission2,
            $projectPermission3,
            $projectPermission4,
            $taskPermission1,
            $taskPermission2,
            $taskPermission3,
            $taskPermission4,
            $adminPermission1,
        ]);
        $staffRole = Role::create(['name' => 'staff'])->syncPermissions([
            $projectPermission2,
            $projectPermission3,
            $taskPermission1,
            $taskPermission2,
            $taskPermission3,
            $taskPermission4,
            $adminPermission1,
        ]);
        $financeRole = Role::create(['name' => 'finance'])->syncPermissions([
            $categoryPermission1,
            $categoryPermission2,
            $categoryPermission3,
            $categoryPermission4,
            $transactionPermission1,
            $transactionPermission2,
            $transactionPermission3,
            $transactionPermission4,
            $projectPermission2,
            $orderPermission2,
            $orderPermission3,
            $adminPermission1,
        ]);

        User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($superRole);
        
        User::create([
            'name' => 'manager',
            'is_admin' => 1,
            'email' => 'manager@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($managerRole);
        
        User::create([
            'name' => 'finance',
            'is_admin' => 1,
            'email' => 'finance@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($financeRole);

        User::create([
            'name' => 'staff',
            'is_admin' => 1,
            'email' => 'staff@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($staffRole);

        for ($i=1; $i < 50; $i++) {
            User::create([
                'name' => 'Test '.$i,
                'is_admin' => 0,
                'email' => 'test'.$i.'@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'remember_token' => Str::random(10),
            ])->assignRole($userRole);
        }
    }
}
