<?php

namespace App\Filament\Resources\Careers;

use App\Filament\Resources\Careers\Pages\CreateCareer;
use App\Filament\Resources\Careers\Pages\EditCareer;
use App\Filament\Resources\Careers\Pages\ListCareers;
use App\Filament\Resources\Careers\Pages\ViewCareer;
use App\Models\Career;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $navigationLabel = 'Careers';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Career';

    protected static ?string $pluralModelLabel = 'Careers';

    protected static ?int $navigationSort = 10;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Career')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Career Details')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(191)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, callable $set, callable $get): void {
                                                if (filled($get('slug'))) {
                                                    return;
                                                }

                                                $set('slug', Str::slug((string) $state));
                                            }),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(191),

                                        Select::make('work_location_type')
                                            ->label('Work Location Type')
                                            ->options([
                                                'On Site' => 'On Site',
                                                'Remote' => 'Remote',
                                                'Hybrid' => 'Hybrid',
                                            ])
                                            ->required(),

                                        Select::make('employment_type')
                                            ->label('Employment Type')
                                            ->options([
                                                'Full Time' => 'Full Time',
                                                'Part Time' => 'Part Time',
                                                'Project Based' => 'Project Based',
                                            ])
                                            ->required(),

                                        TextInput::make('location')
                                            ->label('Location')
                                            ->placeholder('e.g. Dhaka, Bangladesh')
                                            ->maxLength(191),

                                        TextInput::make('experience_level')
                                            ->label('Experience Level')
                                            ->placeholder('e.g. 2+ years')
                                            ->maxLength(191),

                                        TextInput::make('working_hour')
                                            ->label('Working Hour')
                                            ->placeholder('e.g. 10AM - 6PM')
                                            ->maxLength(191),

                                        TextInput::make('working_days')
                                            ->label('Working Days')
                                            ->placeholder('e.g. Weekly: 5 days, Weekend: Sat, Sun')
                                            ->maxLength(191),

                                        TextInput::make('sort_order')
                                            ->label('Sort Order')
                                            ->numeric()
                                            ->default(fn (): int => (Career::query()->max('sort_order') ?? 0) + 1),

                                        Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true),

                                        Textarea::make('short_description')
                                            ->label('Short Description')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        RichEditor::make('description')
                                            ->label('Description')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Details')
                            ->schema([
                                Section::make('Key Qualifications')
                                    ->schema([
                                        static::makeItemRepeater('key_qualifications', 'Add Qualification'),
                                    ]),

                                Section::make('Responsibilities')
                                    ->schema([
                                        static::makeItemRepeater('responsibilities', 'Add Responsibility'),
                                    ]),

                                Section::make('Benefits')
                                    ->schema([
                                        static::makeItemRepeater('benefits', 'Add Benefit'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->paginatedWhileReordering()
            ->columns([
                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable()
                    ->badge(),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('work_location_type')
                    ->label('Location Type')
                    ->badge(),

                TextColumn::make('employment_type')
                    ->label('Employment')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('work_location_type')
                    ->label('Location Type')
                    ->options([
                        'On Site' => 'On Site',
                        'Remote' => 'Remote',
                        'Hybrid' => 'Hybrid',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ReplicateAction::make()
                    ->label('Duplicate')
                    ->excludeAttributes(['slug', 'sort_order'])
                    ->mutateRecordDataUsing(fn (array $data): array => static::mutateReplicatedData($data)),
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
            'index' => ListCareers::route('/'),
            'create' => CreateCareer::route('/create'),
            'view' => ViewCareer::route('/{record}'),
            'edit' => EditCareer::route('/{record}/edit'),
        ];
    }

    protected static function makeItemRepeater(string $name, string $addActionLabel): Repeater
    {
        return Repeater::make($name)
            ->label('')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),
            ])
            ->default([])
            ->reorderable()
            ->collapsible()
            ->cloneable()
            ->addActionLabel($addActionLabel)
            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
            ->dehydrateStateUsing(fn (?array $state): array => static::normalizeItems($state));
    }

    protected static function normalizeItems(?array $state): array
    {
        return Collection::make($state)
            ->filter(fn ($item): bool => filled($item['title'] ?? null))
            ->values()
            ->map(fn (array $item, int $index): array => [
                'title' => $item['title'],
                'sort_order' => $index + 1,
            ])
            ->all();
    }

    protected static function generateUniqueSlug(string $value): string
    {
        $baseSlug = Str::slug($value);
        $slug = $baseSlug;
        $suffix = 1;

        while (Career::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-copy-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    public static function mutateReplicatedData(array $data): array
    {
        $data['title'] = "{$data['title']} (Copy)";
        $data['slug'] = static::generateUniqueSlug($data['slug'] ?? $data['title']);
        $data['sort_order'] = (Career::query()->max('sort_order') ?? 0) + 1;

        return $data;
    }
}
