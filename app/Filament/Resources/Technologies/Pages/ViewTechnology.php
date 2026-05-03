<?php

namespace App\Filament\Resources\Technologies\Pages;

use App\Filament\Resources\Technologies\TechnologyResource;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTechnology extends ViewRecord
{
    protected static string $resource = TechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ReplicateAction::make()
                ->label('Duplicate')
                ->excludeAttributes(['sort_order'])
                ->mutateRecordDataUsing(fn (array $data): array => TechnologyResource::mutateReplicatedData($data)),
            EditAction::make(),
        ];
    }
}
