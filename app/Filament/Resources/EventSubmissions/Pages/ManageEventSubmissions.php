<?php

namespace App\Filament\Resources\EventSubmissions\Pages;

use App\Filament\Resources\EventSubmissions\EventSubmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEventSubmissions extends ManageRecords
{
    protected static string $resource = EventSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
