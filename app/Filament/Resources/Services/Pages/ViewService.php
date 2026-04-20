<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Resources\Pages\ViewRecord;

class ViewService extends ViewRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ReplicateAction::make()
                ->label('Duplicate')
                ->excludeAttributes(['slug', 'sort_order'])
                ->mutateRecordDataUsing(fn (array $data): array => ServiceResource::mutateReplicatedData($data)),
            EditAction::make(),
        ];
    }
}
