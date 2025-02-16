<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Spatie\Activitylog\Models\Activity;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\ActivityLogResource\Pages;

class ActivityLogResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject_id')
                    ->label('Subject ID'),
                TextColumn::make('log_name')
                    ->label('Subject Name')
                    ->sortable(),
                TextColumn::make('subject_type')
                    ->label('Subject Type'),
                TextColumn::make('event')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted',
                        default => ucfirst($state),
                    })
                    ->colors([
                        'success' => 'created',
                        'primary' => 'updated',
                        'danger' => 'deleted',
                    ])
                    ->badge(),
                TextColumn::make('causer_id')
                    ->label('Admin ID'),
                TextColumn::make('causer.name')
                    ->label('Admin Name')
                    ->searchable(),
                 TextColumn::make('causer.roles.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state),
                TextColumn::make('created_at')
                    ->label('Timestamp')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('log_name')
                    ->label('Filter by Log Name')
                    ->options(
                        Activity::query()->pluck('log_name', 'log_name')->unique()
                    ),
            ])
            ->actions([])
            ->defaultSort('created_at', 'desc');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }
}
