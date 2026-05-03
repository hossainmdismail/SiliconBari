<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\GlobalSettings;
use App\Filament\Pages\MarketingSettings;
use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\CaseStudies\CaseStudyResource;
use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Industries\IndustryResource;
use App\Filament\Resources\Insights\InsightResource;
use App\Filament\Resources\SeoPages\SeoPagesResource;
use App\Filament\Resources\Services\ServiceResource;
use App\Filament\Resources\Teams\TeamResource;
use App\Filament\Resources\Technologies\TechnologyResource;
use App\Filament\Resources\Testimonials\TestimonialResource;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardQuickLinks extends Widget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.dashboard-quick-links';

    public function revokeSession(string $sessionId): void
    {
        if (! $this->supportsDatabaseSessions()) {
            return;
        }

        if ($sessionId === session()->getId()) {
            Notification::make()
                ->warning()
                ->title('Current session cannot be logged out from here.')
                ->send();

            return;
        }

        DB::table(config('session.table', 'sessions'))
            ->where('id', $sessionId)
            ->where('user_id', filament()->auth()->id())
            ->delete();

        filament()->auth()->user()?->forceFill([
            'remember_token' => Str::random(60),
        ])->save();

        Notification::make()
            ->success()
            ->title('Session logged out successfully.')
            ->send();
    }

    public function revokeOtherSessions(): void
    {
        if (! $this->supportsDatabaseSessions()) {
            return;
        }

        DB::table(config('session.table', 'sessions'))
            ->where('user_id', filament()->auth()->id())
            ->where('id', '!=', session()->getId())
            ->delete();

        filament()->auth()->user()?->forceFill([
            'remember_token' => Str::random(60),
        ])->save();

        Notification::make()
            ->success()
            ->title('All other sessions have been logged out.')
            ->send();
    }

    protected function getViewData(): array
    {
        return [
            'contentLinks' => [
                [
                    'label' => 'Services',
                    'description' => 'Manage service pages and add new offerings.',
                    'icon' => Heroicon::OutlinedWrenchScrewdriver,
                    'manageUrl' => ServiceResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => ServiceResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Industries',
                    'description' => 'Update industry blocks and ordering.',
                    'icon' => Heroicon::OutlinedBuildingOffice2,
                    'manageUrl' => IndustryResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => IndustryResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Technologies',
                    'description' => 'Manage technology names, ordering, and publish status.',
                    'icon' => Heroicon::OutlinedCpuChip,
                    'manageUrl' => TechnologyResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => TechnologyResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Case Studies',
                    'description' => 'Manage case study content, features, and linked technologies.',
                    'icon' => Heroicon::OutlinedClipboardDocumentList,
                    'manageUrl' => CaseStudyResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => CaseStudyResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Brands',
                    'description' => 'Upload brand logos shown across the site.',
                    'icon' => Heroicon::OutlinedSwatch,
                    'manageUrl' => BrandResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => BrandResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Testimonials',
                    'description' => 'Curate client feedback and social proof.',
                    'icon' => Heroicon::OutlinedChatBubbleLeftRight,
                    'manageUrl' => TestimonialResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => TestimonialResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Blogs / Insights',
                    'description' => 'Publish articles, updates, and featured insights.',
                    'icon' => Heroicon::OutlinedNewspaper,
                    'manageUrl' => InsightResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => InsightResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'SEO Pages',
                    'description' => 'Control page-specific metadata and social previews.',
                    'icon' => Heroicon::OutlinedDocumentMagnifyingGlass,
                    'manageUrl' => SeoPagesResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => SeoPagesResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'FAQs',
                    'description' => 'Manage frequently asked questions, ordering, and publish status.',
                    'icon' => Heroicon::OutlinedQuestionMarkCircle,
                    'manageUrl' => FaqResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => FaqResource::getUrl('create', panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Team',
                    'description' => 'Manage team members, profile images, ordering, and publish status.',
                    'icon' => Heroicon::OutlinedUserGroup,
                    'manageUrl' => TeamResource::getUrl(panel: 'siliconadmin'),
                    'createUrl' => TeamResource::getUrl('create', panel: 'siliconadmin'),
                ],
            ],
            'settingsLinks' => [
                [
                    'label' => 'Global Settings',
                    'description' => 'Logo, footer, site info, and default SEO fallbacks.',
                    'icon' => Heroicon::OutlinedCog6Tooth,
                    'url' => GlobalSettings::getUrl(panel: 'siliconadmin'),
                ],
                [
                    'label' => 'Marketing Settings',
                    'description' => 'Tracking pixels, verification codes, and script injections.',
                    'icon' => Heroicon::OutlinedLightBulb,
                    'url' => MarketingSettings::getUrl(panel: 'siliconadmin'),
                ],
            ],
            'supportsDatabaseSessions' => $this->supportsDatabaseSessions(),
            'activeSessions' => $this->getActiveSessions(),
        ];
    }

    protected function supportsDatabaseSessions(): bool
    {
        return config('session.driver') === 'database';
    }

    protected function getActiveSessions(): array
    {
        if (! $this->supportsDatabaseSessions() || blank(filament()->auth()->id())) {
            return [];
        }

        $cutoff = now()->subMinutes((int) config('session.lifetime', 120))->timestamp;
        $currentSessionId = session()->getId();

        return DB::table(config('session.table', 'sessions'))
            ->where('user_id', filament()->auth()->id())
            ->where('last_activity', '>=', $cutoff)
            ->orderByDesc('last_activity')
            ->get(['id', 'ip_address', 'user_agent', 'last_activity'])
            ->map(fn (object $session): array => [
                'id' => $session->id,
                'ip_address' => $session->ip_address ?: 'Unknown IP',
                'user_agent' => $session->user_agent ?: 'Unknown device',
                'last_active' => now()->setTimestamp((int) $session->last_activity)->diffForHumans(),
                'is_current' => $session->id === $currentSessionId,
            ])
            ->all();
    }
}
