<?php

namespace App\Filament\Resources\CaseStudies\Pages;

use App\Filament\Resources\CaseStudies\CaseStudyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseStudy extends EditRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ReplicateAction::make()
                ->label('Duplicate')
                ->mutateRecordDataUsing(fn (array $data): array => CaseStudyResource::mutateReplicatedData($data)),
            DeleteAction::make(),
        ];
    }
}
