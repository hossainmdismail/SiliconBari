<?php

namespace App\Filament\Resources\Insights;

use App\Filament\Resources\Insights\Pages\CreateInsight;
use App\Filament\Resources\Insights\Pages\EditInsight;
use App\Filament\Resources\Insights\Pages\ListInsights;
use App\Filament\Resources\Insights\Pages\ViewInsight;
use App\Models\Insight;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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
use Illuminate\Support\Str;

class InsightResource extends Resource
{
    protected static ?string $model = Insight::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $navigationLabel = 'Blogs / Insights';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Insight';

    protected static ?string $pluralModelLabel = 'Blogs / Insights';

    protected static ?int $navigationSort = 6;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Insight')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Content Details')
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

                                        TextInput::make('author')
                                            ->label('Author')
                                            ->maxLength(150)
                                            ->placeholder('Admin Team'),

                                        TextInput::make('category')
                                            ->label('Category')
                                            ->maxLength(150)
                                            ->placeholder('Semiconductor News'),

                                        Textarea::make('short_description')
                                            ->label('Short Description')
                                            ->required()
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        RichEditor::make('body')
                                            ->label('Body')
                                            ->toolbarButtons([
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'h2',
                                                'h3',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'underline',
                                                'undo',
                                            ])
                                            ->fileAttachmentsDisk('public')
                                            ->fileAttachmentsDirectory('insights/body')
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

                        Tab::make('Media & Features')
                            ->schema([
                                Section::make('Media')
                                    ->schema([
                                        FileUpload::make('thumbnail')
                                            ->label('Thumbnail')
                                            ->disk('public')
                                            ->directory('insights')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('SEO')
                            ->schema([
                                Section::make('Meta')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(255),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Section::make('Social')
                                    ->schema([
                                        TextInput::make('og_title')
                                            ->label('OG Title')
                                            ->maxLength(255),

                                        Textarea::make('og_description')
                                            ->label('OG Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        FileUpload::make('og_image')
                                            ->label('OG Image')
                                            ->disk('public')
                                            ->directory('insights/seo')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Section::make('Robots & Schema')
                                    ->schema([
                                        Toggle::make('robots_index')
                                            ->label('Allow Index')
                                            ->default(true),

                                        Toggle::make('robots_follow')
                                            ->label('Allow Follow')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author')
                    ->label('Author')
                    ->searchable()
                    ->toggleable(),

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
                    ->options(fn (): array => Insight::query()
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
                    ->excludeAttributes(['slug'])
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
            'index' => ListInsights::route('/'),
            'create' => CreateInsight::route('/create'),
            'view' => ViewInsight::route('/{record}'),
            'edit' => EditInsight::route('/{record}/edit'),
        ];
    }

    protected static function generateUniqueSlug(string $value): string
    {
        $baseSlug = Str::slug($value);
        $slug = $baseSlug;
        $suffix = 1;

        while (Insight::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-copy-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    public static function mutateReplicatedData(array $data): array
    {
        $data['title'] = "{$data['title']} (Copy)";
        $data['slug'] = static::generateUniqueSlug($data['slug'] ?? $data['title']);

        return $data;
    }
}
