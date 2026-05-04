<?php

namespace App\Filament\Resources\CareerSubmissions;

use App\Filament\Resources\CareerSubmissions\Pages\ListCareerSubmissions;
use App\Filament\Resources\CareerSubmissions\Pages\ViewCareerSubmission;
use App\Models\CareerSubmission;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class CareerSubmissionResource extends Resource
{
    protected static ?string $model = CareerSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Career Submissions';

    protected static string|\UnitEnum|null $navigationGroup = 'Leads';

    protected static ?string $modelLabel = 'Career Submission';

    protected static ?string $pluralModelLabel = 'Career Submissions';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submission Details')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'reviewed' => 'Reviewed',
                                'shortlisted' => 'Shortlisted',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),

                        TextInput::make('career.title')
                            ->label('Applied For')
                            ->disabled(),

                        TextInput::make('full_name')
                            ->label('Full Name')
                            ->disabled(),

                        TextInput::make('email')
                            ->label('Email')
                            ->disabled(),

                        TextInput::make('phone')
                            ->label('Phone')
                            ->disabled(),

                        TextInput::make('current_location')
                            ->label('Location')
                            ->disabled(),

                        TextInput::make('highest_education')
                            ->label('Education')
                            ->disabled(),

                        TextInput::make('university')
                            ->label('University')
                            ->disabled(),

                        TextInput::make('years_of_experience')
                            ->label('Experience')
                            ->disabled(),

                        TextInput::make('current_company')
                            ->label('Current Company')
                            ->disabled(),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn')
                            ->disabled(),

                        TextInput::make('portfolio_url')
                            ->label('Portfolio')
                            ->disabled(),

                        FileUpload::make('resume_path')
                            ->label('Resume (PDF)')
                            ->disk('public')
                            ->directory('resumes')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->disabled(),

                        TextInput::make('created_at')
                            ->label('Submitted At')
                            ->disabled()
                            ->formatStateUsing(fn ($state): ?string => blank($state) ? null : Carbon::parse($state)->format('M d, Y h:i A')),

                        Textarea::make('cover_letter')
                            ->label('Cover Letter')
                            ->rows(8)
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('career.title')
                    ->label('Position')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),

                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'shortlisted' => 'Shortlisted',
                        'rejected' => 'Rejected',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('career_id')
                    ->label('Position')
                    ->relationship('career', 'title'),
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCareerSubmissions::route('/'),
            'view' => ViewCareerSubmission::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
