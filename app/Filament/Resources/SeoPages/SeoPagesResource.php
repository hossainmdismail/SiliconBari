<?php

namespace App\Filament\Resources\SeoPages;

use App\Filament\Resources\SeoPages\Pages\CreateSeoPages;
use App\Filament\Resources\SeoPages\Pages\EditSeoPages;
use App\Filament\Resources\SeoPages\Pages\ListSeoPages;
use App\Filament\Resources\SeoPages\Pages\ViewSeoPages;
use App\Models\SeoPages;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class SeoPagesResource extends Resource
{
    protected static ?string $model = SeoPages::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentMagnifyingGlass;

    protected static ?string $navigationLabel = 'SEO Pages';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $modelLabel = 'SEO Page';

    protected static ?int $navigationSort = 1;

    protected static ?string $pluralModelLabel = 'SEO Pages';

    protected static ?string $recordTitleAttribute = 'page_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('SEO Page')
                    ->tabs([
                        Tab::make('Page')
                            ->schema([
                                Section::make('Page Details')
                                    ->schema([
                                        TextInput::make('page_name')
                                            ->label('Page Name')
                                            ->helperText('Readable admin label.')
                                            ->required()
                                            ->maxLength(150),

                                        TextInput::make('page_key')
                                            ->label('Page Key')
                                            ->helperText('Unique lookup key.')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(191)
                                            ->placeholder('home'),

                                        Select::make('page_type')
                                            ->label('Page Type')
                                            ->helperText('Group this SEO entry.')
                                            ->options([
                                                'static' => 'Static',
                                                'dynamic' => 'Dynamic',
                                                'landing' => 'Landing',
                                                'custom' => 'Custom',
                                            ])
                                            ->default('static')
                                            ->required()
                                            ->native(false),

                                        Toggle::make('is_active')
                                            ->label('Active')
                                            ->helperText('Use this SEO data.')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Meta')
                            ->schema([
                                Section::make('Meta Tags')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->helperText('Browser and search title.')
                                            ->maxLength(255),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->helperText('Search result summary.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        TextInput::make('canonical_url')
                                            ->label('Canonical URL')
                                            ->helperText('Preferred page URL.')
                                            ->url()
                                            ->maxLength(2048)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Social')
                            ->schema([
                                Section::make('Open Graph')
                                    ->schema([
                                        TextInput::make('og_title')
                                            ->label('OG Title')
                                            ->helperText('Social share title.')
                                            ->maxLength(255),

                                        Textarea::make('og_description')
                                            ->label('OG Description')
                                            ->helperText('Social share summary.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        FileUpload::make('og_image')
                                            ->label('OG Image')
                                            ->helperText('Social preview image.')
                                            ->disk('public')
                                            ->directory('seo-pages')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Robots')
                            ->schema([
                                Section::make('Robots')
                                    ->schema([
                                        Toggle::make('robots_index')
                                            ->label('Allow Index')
                                            ->helperText('Let search engines index it.')
                                            ->default(true),

                                        Toggle::make('robots_follow')
                                            ->label('Allow Follow')
                                            ->helperText('Let crawlers follow links.')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Schema')
                            ->schema([
                                Section::make('Structured Data')
                                    ->schema([
                                        CodeEditor::make('schema_json')
                                            ->label('Schema JSON')
                                            ->helperText('Optional JSON-LD object.')
                                            ->language(Language::Json)
                                            ->formatStateUsing(fn ($state): ?string => blank($state) ? null : json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))
                                            ->dehydrateStateUsing(fn (?string $state): ?array => blank($state) ? null : json_decode($state, true))
                                            ->rules(['nullable', 'json'])
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('page_name')
            ->columns([
                TextColumn::make('page_name')
                    ->label('Page')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('page_key')
                    ->label('Key')
                    ->searchable()
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('page_type')
                    ->label('Type')
                    ->badge()
                    ->sortable(),

                ImageColumn::make('og_image')
                    ->label('OG Image')
                    ->disk('public')
                    ->square()
                    ->toggleable(),

                IconColumn::make('robots_index')
                    ->label('Index')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('robots_follow')
                    ->label('Follow')
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
                SelectFilter::make('page_type')
                    ->label('Type')
                    ->options([
                        'static' => 'Static',
                        'dynamic' => 'Dynamic',
                        'landing' => 'Landing',
                        'custom' => 'Custom',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Active'),

                TernaryFilter::make('robots_index')
                    ->label('Allow Index'),

                TernaryFilter::make('robots_follow')
                    ->label('Allow Follow'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSeoPages::route('/'),
            'create' => CreateSeoPages::route('/create'),
            'view' => ViewSeoPages::route('/{record}'),
            'edit' => EditSeoPages::route('/{record}/edit'),
        ];
    }
}
