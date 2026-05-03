<?php

namespace App\Filament\Resources\EventSubmissions;

use App\Filament\Resources\EventSubmissions\Pages\ManageEventSubmissions;
use App\Models\EventSubmission;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;

class EventSubmissionResource extends Resource
{
    protected static ?string $model = EventSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|\UnitEnum|null $navigationGroup = 'Leads';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('event_id')
                    ->relationship('event', 'title')
                    ->required(),
                TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                TextInput::make('current_location')
                    ->maxLength(255),
                TextInput::make('job_title')
                    ->maxLength(255),
                TextInput::make('university_company')
                    ->maxLength(255),
                TextInput::make('industry')
                    ->maxLength(255),
                Textarea::make('additional_info')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_name')
            ->columns([
                TextColumn::make('event.title')
                    ->label('Event')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('university_company')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('event')
                    ->relationship('event', 'title'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEventSubmissions::route('/'),
        ];
    }
}
