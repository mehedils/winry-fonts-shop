<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.manage-settings';

    protected static ?string $title = 'Site Settings';

    protected static ?string $description = 'Manage your website configuration, contact information, and social media links.';

    // Form field properties
    public ?string $site_title = '';
    public ?string $site_description = '';
    public array $site_logo = [];
    public array $site_favicon = [];
    public ?string $site_keywords = '';
    public ?string $contact_email = '';
    public ?string $contact_phone = '';
    public ?string $contact_address = '';
    public ?string $business_hours = '';
    public ?string $social_facebook = '';
    public ?string $social_twitter = '';
    public ?string $social_instagram = '';
    public ?string $social_linkedin = '';
    public ?string $social_youtube = '';
    public ?string $social_github = '';
    public ?string $social_behance = '';
    public ?string $footer_copyright = '';
    public ?string $footer_description = '';

    public function mount(): void
    {
        // Populate form with existing data
        $this->populateForm();
    }

    private function populateForm(): void
    {
        try {
            $allSettings = Setting::all();
            
            // Filter out any settings without a key field
            $validSettings = $allSettings->filter(function($setting) {
                return !empty($setting->key);
            });
            
            // Create a collection and then keyBy
            $settings = collect($validSettings)->keyBy('key');
            
            // Prepare form data
            $formData = [
                'site_title' => $settings->get('site_title')?->value ?? '',
                'site_description' => $settings->get('site_description')?->value ?? '',
                'site_logo' => $settings->get('site_logo')?->value ? [$settings->get('site_logo')->value] : [],
                'site_favicon' => $settings->get('site_favicon')?->value ? [$settings->get('site_favicon')->value] : [],
                'site_keywords' => $settings->get('site_keywords')?->value ?? '',
                'contact_email' => $settings->get('contact_email')?->value ?? '',
                'contact_phone' => $settings->get('contact_phone')?->value ?? '',
                'contact_address' => $settings->get('contact_address')?->value ?? '',
                'business_hours' => $settings->get('business_hours')?->value ?? '',
                'social_facebook' => $settings->get('social_facebook')?->value ?? '',
                'social_twitter' => $settings->get('social_twitter')?->value ?? '',
                'social_instagram' => $settings->get('social_instagram')?->value ?? '',
                'social_linkedin' => $settings->get('social_linkedin')?->value ?? '',
                'social_youtube' => $settings->get('social_youtube')?->value ?? '',
                'social_github' => $settings->get('social_github')?->value ?? '',
                'social_behance' => $settings->get('social_behance')?->value ?? '',
                'footer_copyright' => $settings->get('footer_copyright')?->value ?? '',
                'footer_description' => $settings->get('footer_description')?->value ?? '',
            ];
            
            // Fill the form with existing data
            $this->form->fill($formData);
            
        } catch (\Exception $e) {
            \Log::error('Error in populateForm: ' . $e->getMessage());
            throw $e;
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Basic Site Information
                Forms\Components\Section::make('Basic Information')
                    ->icon('heroicon-o-globe-alt')
                    ->description('Configure your website\'s basic details and branding')
                    ->schema([
                        Forms\Components\TextInput::make('site_title')
                            ->label('Website Title')
                            ->required()
                            ->placeholder('Enter your website title')
                            ->helperText('This will appear in browser tabs and search results')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('site_description')
                            ->label('Website Description')
                            ->rows(3)
                            ->placeholder('Brief description of your website')
                            ->helperText('Used for SEO and social media sharing')
                            ->maxLength(500),
                        
                        Forms\Components\FileUpload::make('site_logo')
                            ->label('Website Logo')
                            ->image()
                            ->imageEditor()
                            ->directory('settings')
                            ->disk('public')
                            ->helperText('Upload your logo (PNG, JPG, SVG recommended, max 2MB)')
                            ->maxSize(2048),
                        
                        Forms\Components\FileUpload::make('site_favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('settings')
                            ->disk('public')
                            ->helperText('Small icon that appears in browser tabs (32x32px recommended)')
                            ->maxSize(1024),
                    ])
                    ->columns(2),

                // Contact Information
                Forms\Components\Section::make('Contact Information')
                    ->icon('heroicon-o-envelope')
                    ->description('How customers can reach you and your business details')
                    ->schema([
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->placeholder('info@yourwebsite.com')
                            ->helperText('Primary contact email for customer inquiries'),
                        
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Phone Number')
                            ->tel()
                            ->placeholder('+1 234 567 8900')
                            ->helperText('Business phone number for customer support'),
                        
                        Forms\Components\Textarea::make('contact_address')
                            ->label('Business Address')
                            ->rows(3)
                            ->placeholder('Your complete business address')
                            ->helperText('Physical address for your business'),
                        
                        Forms\Components\TextInput::make('business_hours')
                            ->label('Business Hours')
                            ->placeholder('Monday - Friday: 9:00 AM - 6:00 PM')
                            ->helperText('Your operating hours for customer reference'),
                    ])
                    ->columns(2),

                // Social Media
                Forms\Components\Section::make('Social Media')
                    ->icon('heroicon-o-share')
                    ->description('Your social media profiles and online presence')
                    ->schema([
                        Forms\Components\TextInput::make('social_facebook')
                            ->label('Facebook')
                            ->url()
                            ->placeholder('https://facebook.com/yourpage')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_twitter')
                            ->label('Twitter/X')
                            ->url()
                            ->placeholder('https://twitter.com/yourhandle')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_instagram')
                            ->label('Instagram')
                            ->url()
                            ->placeholder('https://instagram.com/yourprofile')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_linkedin')
                            ->label('LinkedIn')
                            ->url()
                            ->placeholder('https://linkedin.com/company/yourcompany')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_youtube')
                            ->label('YouTube')
                            ->url()
                            ->placeholder('https://youtube.com/@yourchannel')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_github')
                            ->label('GitHub')
                            ->url()
                            ->placeholder('https://github.com/yourusername')
                            ->prefixIcon('heroicon-o-link'),

                        Forms\Components\TextInput::make('social_behance')
                            ->label('Behance')
                            ->url()
                            ->placeholder('https://behance.net/yourportfolio')
                            ->prefixIcon('heroicon-o-link'),
                    ])
                    ->columns(2),

                // Footer Content
                Forms\Components\Section::make('Footer Content')
                    ->icon('heroicon-o-document-text')
                    ->description('Information displayed in the website footer')
                    ->schema([
                        Forms\Components\TextInput::make('footer_copyright')
                            ->label('Copyright Text')
                            ->placeholder('© 2025 Your Company. All rights reserved.')
                            ->helperText('Copyright notice displayed in the footer'),
                        
                        Forms\Components\Textarea::make('footer_description')
                            ->label('Footer Description')
                            ->rows(3)
                            ->placeholder('Brief description about your company')
                            ->helperText('Short description displayed in the footer')
                            ->maxLength(300),
                    ])
                    ->columns(2),
            ]);
    }

    public function saveSettings(): void
    {
        try {
            // Get the form state
            $data = $this->form->getState();
            
            // Process file uploads - handle both new uploads and existing files
            $siteLogo = $this->processFileUpload($data['site_logo'] ?? []);
            $siteFavicon = $this->processFileUpload($data['site_favicon'] ?? []);
            
            // Use the validated form data
            $settingsData = [
                'site_title' => $data['site_title'] ?? '',
                'site_description' => $data['site_description'] ?? '',
                'site_logo' => $siteLogo,
                'site_favicon' => $siteFavicon,
                'site_keywords' => $data['site_keywords'] ?? '',
                'contact_email' => $data['contact_email'] ?? '',
                'contact_phone' => $data['contact_phone'] ?? '',
                'contact_address' => $data['contact_address'] ?? '',
                'business_hours' => $data['business_hours'] ?? '',
                'social_facebook' => $data['social_facebook'] ?? '',
                'social_twitter' => $data['social_twitter'] ?? '',
                'social_instagram' => $data['social_instagram'] ?? '',
                'social_linkedin' => $data['social_linkedin'] ?? '',
                'social_youtube' => $data['social_youtube'] ?? '',
                'social_github' => $data['social_github'] ?? '',
                'social_behance' => $data['social_behance'] ?? '',
                'footer_copyright' => $data['footer_copyright'] ?? '',
                'footer_description' => $data['footer_description'] ?? '',
            ];

            foreach ($settingsData as $key => $value) {
                if ($value !== null && $value !== '') {
                    $type = $this->getFieldType($key);
                    $group = $this->getFieldGroup($key);
                    $label = $this->getFieldLabel($key);

                    Setting::set($key, $value, $type, $group, $label);
                }
            }

            Setting::clearCache();

            Notification::make()
                ->title('Settings updated successfully!')
                ->success()
                ->send();

        } catch (\Exception $e) {
            \Log::error('Error in saveSettings: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            Notification::make()
                ->title('Error updating settings')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    private function processFileUpload($fileData): string
    {
        // If it's already a string (existing file path), return it
        if (is_string($fileData) && !empty($fileData)) {
            return $fileData;
        }
        
        // If it's an array, get the first value
        if (is_array($fileData) && !empty($fileData)) {
            $firstValue = reset($fileData);
            return $firstValue;
        }
        
        // If it's empty or null, return empty string
        return '';
    }

    private function getFieldType(string $key): string
    {
        try {
            $type = match ($key) {
                'site_logo', 'site_favicon' => 'image',
                'site_description', 'contact_address', 'footer_description' => 'textarea',
                'contact_email' => 'email',
                'social_facebook', 'social_twitter', 'social_instagram', 'social_linkedin', 'social_youtube', 'social_github' => 'url',
                default => 'text',
            };
            return $type;
        } catch (\Exception $e) {
            \Log::error("Error in getFieldType for {$key}: " . $e->getMessage());
            return 'text';
        }
    }

    private function getFieldGroup(string $key): string
    {
        try {
            $group = match (true) {
                str_starts_with($key, 'site_') => 'general',
                str_starts_with($key, 'contact_') => 'contact',
                str_starts_with($key, 'social_') => 'social',
                str_starts_with($key, 'footer_') => 'footer',
                default => 'general',
            };
            return $group;
        } catch (\Exception $e) {
            \Log::error("Error in getFieldGroup for {$key}: " . $e->getMessage());
            return 'general';
        }
    }

    private function getFieldLabel(string $key): string
    {
        try {
            $label = match ($key) {
                'site_title' => 'Website Title',
                'site_description' => 'Website Description',
                'site_logo' => 'Website Logo',
                'site_favicon' => 'Favicon',
                'site_keywords' => 'Site Keywords',
                'contact_email' => 'Email Address',
                'contact_phone' => 'Phone Number',
                'contact_address' => 'Address',
                'business_hours' => 'Business Hours',
                'social_facebook' => 'Facebook',
                'social_twitter' => 'Twitter/X',
                'social_instagram' => 'Instagram',
                'social_linkedin' => 'LinkedIn',
                'social_youtube' => 'YouTube',
                'social_github' => 'GitHub',
                'footer_copyright' => 'Copyright Text',
                'footer_description' => 'Footer Description',
                default => ucfirst(str_replace('_', ' ', $key)),
            };
            return $label;
        } catch (\Exception $e) {
            \Log::error("Error in getFieldLabel for {$key}: " . $e->getMessage());
            return ucfirst(str_replace('_', ' ', $key));
        }
    }
}
