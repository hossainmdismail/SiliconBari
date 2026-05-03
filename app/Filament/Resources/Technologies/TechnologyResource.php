<?php

namespace App\Filament\Resources\Technologies;

use App\Filament\Resources\Technologies\Pages\CreateTechnology;
use App\Filament\Resources\Technologies\Pages\EditTechnology;
use App\Filament\Resources\Technologies\Pages\ListTechnologies;
use App\Filament\Resources\Technologies\Pages\ViewTechnology;
use App\Models\Technology;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TechnologyResource extends Resource
{
    protected static ?string $model = Technology::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCpuChip;

    protected static ?string $navigationLabel = 'Technologies';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Technology';

    protected static ?string $pluralModelLabel = 'Technologies';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Technology Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(191),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(fn (): int => (Technology::query()->max('sort_order') ?? 0) + 1)
                            ->helperText('You can also drag and drop in the list view.'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
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

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
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
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ReplicateAction::make()
                    ->label('Duplicate')
                    ->excludeAttributes(['sort_order'])
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
            'index' => ListTechnologies::route('/'),
            'create' => CreateTechnology::route('/create'),
            'view' => ViewTechnology::route('/{record}'),
            'edit' => EditTechnology::route('/{record}/edit'),
        ];
    }

    public static function mutateReplicatedData(array $data): array
    {
        $data['name'] = ($data['name'] ?? 'Technology') . ' Copy';
        $data['sort_order'] = (Technology::query()->max('sort_order') ?? 0) + 1;

        return $data;
    }
}
