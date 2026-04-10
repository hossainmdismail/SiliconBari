<?php

namespace App\Filament\Pages;

use App\Models\MarketingSettings as MarketingSettingsModel;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class MarketingSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Marketing Settings';

    protected static ?string $title = 'Marketing Settings';

    protected static ?int $navigationSort = 2;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected string $view = 'filament.pages.marketing-settings';

    public ?array $data = [];

    public ?MarketingSettingsModel $record = null;

    public function mount(): void
    {
        $this->record = MarketingSettingsModel::firstOrCreate(
            ['id' => 1],
            [
                'gtm_enabled' => false,
                'ga4_enabled' => false,
                'meta_pixel_enabled' => false,
                'tiktok_pixel_enabled' => false,
            ]
        );

        $this->form->fill($this->record->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Marketing Settings')
                    ->tabs([
                        Tab::make('Tracking Pixels')
                            ->schema([
                                Section::make('Google Tag Manager (GTM)')
                                    ->schema([
                                        Forms\Components\Toggle::make('gtm_enabled')
                                            ->label('Enable GTM')
                                            ->helperText('Enable Google Tag Manager tracking.')
                                            ->default(false),

                                        Forms\Components\TextInput::make('gtm_container_id')
                                            ->label('GTM Container ID')
                                            ->helperText('Example: GTM-XXXXXX')
                                            ->placeholder('GTM-XXXXXX')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),

                                Section::make('Google Analytics 4 (GA4)')
                                    ->schema([
                                        Forms\Components\Toggle::make('ga4_enabled')
                                            ->label('Enable GA4')
                                            ->helperText('Enable Google Analytics 4 tracking.')
                                            ->default(false),

                                        Forms\Components\TextInput::make('ga4_measurement_id')
                                            ->label('GA4 Measurement ID')
                                            ->helperText('Example: G-XXXXXXXXXX')
                                            ->placeholder('G-XXXXXXXXXX')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),

                                Section::make('Meta Pixel (Facebook)')
                                    ->schema([
                                        Forms\Components\Toggle::make('meta_pixel_enabled')
                                            ->label('Enable Meta Pixel')
                                            ->helperText('Enable Facebook/Meta Pixel tracking.')
                                            ->default(false),

                                        Forms\Components\TextInput::make('meta_pixel_id')
                                            ->label('Meta Pixel ID')
                                            ->helperText('Your Facebook Pixel ID')
                                            ->placeholder('123456789012345')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),

                                Section::make('TikTok Pixel')
                                    ->schema([
                                        Forms\Components\Toggle::make('tiktok_pixel_enabled')
                                            ->label('Enable TikTok Pixel')
                                            ->helperText('Enable TikTok Pixel tracking.')
                                            ->default(false),

                                        Forms\Components\TextInput::make('tiktok_pixel_id')
                                            ->label('TikTok Pixel ID')
                                            ->helperText('Your TikTok Pixel ID')
                                            ->placeholder('12345678901234567')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Verification')
                            ->schema([
                                Section::make('Search Console & Webmaster Verification')
                                    ->schema([
                                        Forms\Components\TextInput::make('google_search_console_verification')
                                            ->label('Google Search Console Verification')
                                            ->helperText('Meta verification code or tag content')
                                            ->placeholder('google-site-verification code')
                                            ->maxLength(500),

                                        Forms\Components\TextInput::make('bing_webmaster_verification')
                                            ->label('Bing Webmaster Verification')
                                            ->helperText('Bing webmaster tools verification code')
                                            ->placeholder('msvalidate.01 code')
                                            ->maxLength(500),

                                        Forms\Components\TextInput::make('meta_domain_verification')
                                            ->label('Meta Domain Verification')
                                            ->helperText('Meta domain verification code')
                                            ->placeholder('verification code')
                                            ->maxLength(500),
                                    ])
                                    ->columns(1),
                            ]),

                        Tab::make('Custom Scripts')
                            ->schema([
                                Section::make('Head Scripts')
                                    ->schema([
                                        CodeEditor::make('custom_head_scripts')
                                            ->label('Head Scripts')
                                            ->helperText('Scripts to be added in <head> tag')
                                            ->language(Language::Html)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Body Start Scripts')
                                    ->schema([
                                        CodeEditor::make('custom_body_start_scripts')
                                            ->label('Body Start Scripts')
                                            ->helperText('Scripts to be added at the start of <body> tag')
                                            ->language(Language::Html)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Body End Scripts')
                                    ->schema([
                                        CodeEditor::make('custom_body_end_scripts')
                                            ->label('Body End Scripts')
                                            ->helperText('Scripts to be added at the end of <body> tag')
                                            ->language(Language::Html)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ]),
            ])
            ->model($this->record)
            ->statePath('data');
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    public function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions()),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $this->record->update($state);

        Notification::make()
            ->title('Marketing settings updated successfully.')
            ->success()
            ->send();
    }
}
