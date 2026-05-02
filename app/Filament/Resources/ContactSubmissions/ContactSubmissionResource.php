<?php

namespace App\Filament\Resources\ContactSubmissions;

use App\Filament\Resources\ContactSubmissions\Pages\ListContactSubmissions;
use App\Filament\Resources\ContactSubmissions\Pages\ViewContactSubmission;
use App\Models\ContactSubmission;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Contact Submissions';

    protected static string|\UnitEnum|null $navigationGroup = 'Leads';

    protected static ?string $modelLabel = 'Contact Submission';

    protected static ?string $pluralModelLabel = 'Contact Submissions';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submission Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Your Name')
                            ->disabled(),

                        TextInput::make('email')
                            ->label('Email')
                            ->disabled(),

                        TextInput::make('company')
                            ->label('Company')
                            ->disabled(),

                        TextInput::make('service_interest')
                            ->label('Service Interest')
                            ->disabled(),

                        TextInput::make('ip_address')
                            ->label('IP Address')
                            ->disabled(),

                        TextInput::make('created_at')
                            ->label('Submitted At')
                            ->disabled()
                            ->formatStateUsing(fn ($state): ?string => blank($state) ? null : Carbon::parse($state)->format('M d, Y h:i A')),

                        Textarea::make('message')
                            ->label('Message')
                            ->rows(8)
                            ->disabled()
                            ->columnSpanFull(),

                        Textarea::make('user_agent')
                            ->label('User Agent')
                            ->rows(3)
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
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->sortable(),

                TextColumn::make('company')
                    ->label('Company')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('service_interest')
                    ->label('Service Interest')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('message')
                    ->label('Message')
                    ->limit(80)
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('service_interest')
                    ->label('Service Interest')
                    ->options(fn (): array => ContactSubmission::query()
                        ->whereNotNull('service_interest')
                        ->orderBy('service_interest')
                        ->pluck('service_interest', 'service_interest')
                        ->all()),

                Filter::make('submitted_at')
                    ->schema([
                        DatePicker::make('submitted_from')
                            ->label('Submitted From'),
                        DatePicker::make('submitted_until')
                            ->label('Submitted Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['submitted_from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['submitted_until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('exportSelectedCsv')
                        ->label('Export Selected CSV')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(fn (Collection $records) => static::streamCsvDownload($records)),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactSubmissions::route('/'),
            'view' => ViewContactSubmission::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function streamCsvDownload(Collection $records)
    {
        return response()->streamDownload(function () use ($records): void {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Name',
                'Email',
                'Company',
                'Service Interest',
                'Message',
                'IP Address',
                'User Agent',
                'Submitted At',
            ]);

            foreach ($records as $record) {
                fputcsv($handle, [
                    $record->name,
                    $record->email,
                    $record->company,
                    $record->service_interest,
                    $record->message,
                    $record->ip_address,
                    $record->user_agent,
                    optional($record->created_at)?->toDateTimeString(),
                ]);
            }

            fclose($handle);
        }, 'contact-submissions-'.now()->format('Y-m-d-His').'.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
