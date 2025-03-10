<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        activity()
            ->performedOn($this->record)
            ->causedBy(Auth::user())
            ->withProperties(['attributes' => $this->record->toArray()]);
    }
}
