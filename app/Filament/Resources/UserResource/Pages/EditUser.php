<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;



class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

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
