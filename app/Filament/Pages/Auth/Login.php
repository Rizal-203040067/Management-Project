<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Actions\Action;

class Login extends BaseLogin
{
    protected function getFormActions(): array
    {
        return [
            Action::make('backtohome')
            ->label(__('Back to home'))
            ->url('/'),

            Action::make('authenticate')
            ->label(__('filament-panels::pages/auth/login.form.actions.authenticate.label'))
            ->submit('authenticate')
        ];
    }
}
