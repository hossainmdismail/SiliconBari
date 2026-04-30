<?php

namespace App\Filament\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class VisitWebsiteWidget extends Widget
{
    protected static ?int $sort = -4;

    protected static bool $isLazy = false;

    protected string $view = 'filament.widgets.visit-website-widget';

    public static function canView(): bool
    {
        return Filament::auth()->check();
    }

    protected function getViewData(): array
    {
        return [
            'websiteUrl' => route('home'),
        ];
    }
}
