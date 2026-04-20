<?php

namespace App\Filament\Resources\Testimonials;

use App\Filament\Resources\Testimonials\Pages\CreateTestimonial;
use App\Filament\Resources\Testimonials\Pages\EditTestimonial;
use App\Filament\Resources\Testimonials\Pages\ListTestimonials;
use App\Filament\Resources\Testimonials\Pages\ViewTestimonial;
use App\Models\Testimonial;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Testimonials';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Testimonial';

    protected static ?string $pluralModelLabel = 'Testimonials';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'client_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Details')
                    ->schema([
                        Textarea::make('comments')
                            ->label('Comments')
                            ->required()
                            ->rows(6)
                            ->maxLength(5000)
                            ->columnSpanFull(),

                        TextInput::make('client_name')
                            ->label('Client Name')
                            ->required()
                            ->maxLength(150),

                        TextInput::make('client_designation')
                            ->label('Client Object / Designation')
                            ->maxLength(191)
                            ->helperText('Example: CTO, Product Manager, or company name.'),

                        FileUpload::make('client_profile')
                            ->label('Client Profile')
                            ->disk('public')
                            ->directory('testimonials')
                            ->image()
                            ->imageEditor()
                            ->maxSize(4096)
                            ->columnSpanFull(),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(fn (): int => (Testimonial::query()->max('sort_order') ?? 0) + 1)
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

                ImageColumn::make('client_profile')
                    ->label('Client Profile')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('client_name')
                    ->label('Client Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('client_designation')
                    ->label('Client Object')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('comments')
                    ->label('Comments')
                    ->limit(70)
                    ->wrap(),

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
            'index' => ListTestimonials::route('/'),
            'create' => CreateTestimonial::route('/create'),
            'view' => ViewTestimonial::route('/{record}'),
            'edit' => EditTestimonial::route('/{record}/edit'),
        ];
    }
}
