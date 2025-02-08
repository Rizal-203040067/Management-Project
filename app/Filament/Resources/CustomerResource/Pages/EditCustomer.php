<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use Filament\Actions;
use App\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;


class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        activity()
            ->performedOn($this->record)
            ->causedBy(Auth::user())
            ->withProperties(['attributes' => $this->record->toArray()]);
    }
}
