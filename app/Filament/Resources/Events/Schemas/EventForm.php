<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Event Details')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\DatePicker::make('event_date')
                            ->label('Date'),
                        \Filament\Forms\Components\TextInput::make('event_time')
                            ->label('Time')
                            ->placeholder('e.g., 9:00 AM - 5:00 PM'),
                        \Filament\Forms\Components\TextInput::make('location')
                            ->placeholder('e.g., Mirpur, Dhaka'),
                        \Filament\Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }
}
