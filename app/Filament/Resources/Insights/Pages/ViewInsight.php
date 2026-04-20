<?php

namespace App\Filament\Resources\Insights\Pages;

use App\Filament\Resources\Insights\InsightResource;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInsight extends ViewRecord
{
    protected static string $resource = InsightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            ReplicateAction::make()
                ->label('Duplicate')
                ->excludeAttributes(['slug'])
                ->mutateRecordDataUsing(fn (array $data): array => InsightResource::mutateReplicatedData($data)),
        ];
    }
}
