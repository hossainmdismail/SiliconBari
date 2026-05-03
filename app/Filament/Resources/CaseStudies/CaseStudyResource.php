<?php

namespace App\Filament\Resources\CaseStudies;

use App\Filament\Resources\CaseStudies\Pages\CreateCaseStudy;
use App\Filament\Resources\CaseStudies\Pages\EditCaseStudy;
use App\Filament\Resources\CaseStudies\Pages\ListCaseStudies;
use App\Filament\Resources\CaseStudies\Pages\ViewCaseStudy;
use App\Models\CaseStudy;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Case Studies';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Case Study';

    protected static ?string $pluralModelLabel = 'Case Studies';

    protected static ?int $navigationSort = 7;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Case Study')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Case Study Details')
                                    ->schema([
                                        DatePicker::make('published_date')
                                            ->label('Published Date')
                                            ->native(false),

                                        Select::make('status')
                                            ->options([
                                                'draft' => 'Draft',
                                                'published' => 'Published',
                                            ])
                                            ->default('published')
                                            ->required()
                                            ->native(false),

                                        Toggle::make('is_featured')
                                            ->label('Featured')
                                            ->default(false)
                                            ->columnSpanFull(),

                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, callable $set, callable $get): void {
                                                if (filled($get('slug'))) {
                                                    return;
                                                }

                                                $set('slug', Str::slug((string) $state));
                                            })
                                            ->maxLength(191),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(191),

                                        TextInput::make('written_by')
                                            ->label('Written By')
                                            ->maxLength(191)
                                            ->placeholder('Author name'),

                                        TextInput::make('industry')
                                            ->label('Industry')
                                            ->maxLength(191)
                                            ->placeholder('Automotive'),

                                        TextInput::make('category')
                                            ->label('Category')
                                            ->maxLength(191)
                                            ->placeholder('Verification'),

                                        Textarea::make('short_description')
                                            ->label('Short Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        FileUpload::make('thumbnail')
                                            ->label('Thumbnail')
                                            ->disk('public')
                                            ->directory('case-studies')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096)
                                            ->columnSpanFull(),

                                        Select::make('technologies')
                                            ->label('Technology')
                                            ->relationship(
                                                name: 'technologies',
                                                titleAttribute: 'name',
                                                modifyQueryUsing: fn (Builder $query): Builder => $query->where('is_active', true)->ordered(),
                                            )
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Content')
                            ->schema([
                                Section::make('Body Content')
                                    ->schema([
                                        RichEditor::make('text_body')
                                            ->label('Text Body')
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
                                            ->fileAttachmentsDirectory('case-studies/body')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('Features')
                            ->schema([
                                Section::make('Features')
                                    ->schema([
                                        static::makeFeaturesRepeater(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_date', 'desc')
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('published_date')
                    ->label('Published')
                    ->date()
                    ->sortable(),

                ToggleColumn::make('is_featured')
                    ->label('Featured'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('industry')
                    ->label('Industry')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('industry')
                    ->label('Industry')
                    ->options(fn (): array => CaseStudy::query()
                        ->whereNotNull('industry')
                        ->orderBy('industry')
                        ->pluck('industry', 'industry')
                        ->all()),

                SelectFilter::make('category')
                    ->label('Category')
                    ->options(fn (): array => CaseStudy::query()
                        ->whereNotNull('category')
                        ->orderBy('category')
                        ->pluck('category', 'category')
                        ->all()),

                SelectFilter::make('technologies')
                    ->label('Technology')
                    ->relationship('technologies', 'name'),

                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
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
            'index' => ListCaseStudies::route('/'),
            'create' => CreateCaseStudy::route('/create'),
            'view' => ViewCaseStudy::route('/{record}'),
            'edit' => EditCaseStudy::route('/{record}/edit'),
        ];
    }

    protected static function makeFeaturesRepeater(): Repeater
    {
        return Repeater::make('features')
            ->label('')
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('value')
                    ->label('Value')
                    ->required()
                    ->maxLength(255),
            ])
            ->default([])
            ->reorderable()
            ->collapsible()
            ->cloneable()
            ->addActionLabel('Add Feature')
            ->columns(2)
            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
            ->dehydrateStateUsing(fn (?array $state): array => static::normalizeFeatures($state));
    }

    protected static function normalizeFeatures(?array $state): array
    {
        return Collection::make($state)
            ->filter(fn ($item): bool => filled($item['name'] ?? null) && filled($item['value'] ?? null))
            ->values()
            ->map(fn (array $item, int $index): array => [
                'name' => $item['name'],
                'value' => $item['value'],
                'sort_order' => $index + 1,
            ])
            ->all();
    }

    protected static function generateUniqueSlug(string $value): string
    {
        $baseSlug = Str::slug($value);
        $slug = $baseSlug;
        $suffix = 1;

        while (CaseStudy::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-copy-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    public static function mutateReplicatedData(array $data): array
    {
        $data['title'] = ($data['title'] ?? 'Case Study') . ' Copy';
        $data['slug'] = static::generateUniqueSlug($data['slug'] ?? $data['title']);

        return $data;
    }
}
