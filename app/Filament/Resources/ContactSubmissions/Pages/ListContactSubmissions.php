<?php

namespace App\Filament\Resources\ContactSubmissions\Pages;

use App\Filament\Resources\ContactSubmissions\ContactSubmissionResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListContactSubmissions extends ListRecords
{
    protected static string $resource = ContactSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('exportCsv')
                ->label('Export Filtered CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn () => $this->exportCsv()),
        ];
    }

    protected function exportCsv()
    {
        $records = $this->getTableQueryForExport()
            ->orderByDesc('created_at')
            ->get([
                'name',
                'email',
                'company',
                'service_interest',
                'message',
                'ip_address',
                'user_agent',
                'created_at',
            ]);

        return ContactSubmissionResource::streamCsvDownload($records);
    }
}
