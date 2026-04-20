<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Pages\ViewService;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?string $navigationLabel = 'Services';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Service';

    protected static ?string $pluralModelLabel = 'Services';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Service')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Service Details')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Name')
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

                                        TextInput::make('category')
                                            ->label('Category')
                                            ->required()
                                            ->maxLength(150)
                                            ->placeholder('Design & Architecture'),

                                        TextInput::make('sort_order')
                                            ->label('Sort Order')
                                            ->numeric()
                                            ->default(fn (): int => (Service::query()->max('sort_order') ?? 0) + 1)
                                            ->helperText('You can also drag and drop in the list page.'),

                                        Textarea::make('short_description')
                                            ->label('Short Description')
                                            ->required()
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Textarea::make('overview')
                                            ->label('Overview')
                                            ->rows(6)
                                            ->columnSpanFull(),

                                        Textarea::make('key_features_description')
                                            ->label('Key Features Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true),

                                        Toggle::make('is_featured')
                                            ->label('Featured')
                                            ->default(false),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Media')
                            ->schema([
                                Section::make('Images')
                                    ->schema([
                                        FileUpload::make('thumbnail')
                                            ->label('Thumbnail')
                                            ->disk('public')
                                            ->directory('services')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096)
                                            ->columnSpanFull(),

                                        FileUpload::make('banner')
                                            ->label('Banner')
                                            ->disk('public')
                                            ->directory('services')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(6144)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Sections')
                            ->schema([
                                Section::make('What We Deliver')
                                    ->schema([
                                        static::makeItemRepeater('what_we_deliver', 'Add Deliverable'),
                                    ]),

                                Section::make('Our Process')
                                    ->schema([
                                        static::makeItemRepeater('our_process', 'Add Process Step'),
                                    ]),

                                Section::make('Key Features')
                                    ->schema([
                                        static::makeItemRepeater('key_features', 'Add Key Feature'),
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

                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),

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
                SelectFilter::make('category')
                    ->label('Category')
                    ->options(fn (): array => Service::query()
                        ->whereNotNull('category')
                        ->orderBy('category')
                        ->pluck('category', 'category')
                        ->all()),

                TernaryFilter::make('is_active')
                    ->label('Active'),

                TernaryFilter::make('is_featured')
                    ->label('Featured'),
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
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'view' => ViewService::route('/{record}'),
            'edit' => EditService::route('/{record}/edit'),
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

        while (Service::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-copy-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    public static function mutateReplicatedData(array $data): array
    {
        $data['name'] = "{$data['name']} (Copy)";
        $data['slug'] = static::generateUniqueSlug($data['slug'] ?? $data['name']);
        $data['sort_order'] = (Service::query()->max('sort_order') ?? 0) + 1;

        return $data;
    }
}
