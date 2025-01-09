<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\PermissionResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function() {

            // Provider show/hidden based on Role of the user
            // But it doesnt work

            // if (auth()->user()) {
            //     if (auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['super-admin', 'admin', 'moderator'])) {
            //         Filament::registerUserMenuItems([
            //             UserMenuItem::make()
            //                 ->label('Manage Users')
            //                 ->url(UserResource::getUrl())
            //                 ->icon('heroicon-s-users')
            //         ]);
            //         Filament::registerUserMenuItems([
            //             UserMenuItem::make()
            //                 ->label('Manage Roles')
            //                 ->url(RoleResource::getUrl())
            //                 ->icon('heroicon-s-cog')
            //         ]);
            //         Filament::registerUserMenuItems([
            //             UserMenuItem::make()
            //                 ->label('Manage Permissions')
            //                 ->url(PermissionResource::getUrl())
            //                 ->icon('heroicon-s-key')
            //         ]);
            //     }
            // }


            // Temporary Code Without Authenctication based on Role
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Manage Users')
                    ->url(UserResource::getUrl())
                    ->icon('heroicon-s-users')
            ]);
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Manage Roles')
                    ->url(RoleResource::getUrl())
                    ->icon('heroicon-s-cog')
            ]);
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Manage Permissions')
                    ->url(PermissionResource::getUrl())
                    ->icon('heroicon-s-key')
            ]);
        });
    }
}
