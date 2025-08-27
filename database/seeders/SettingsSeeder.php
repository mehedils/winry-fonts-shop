<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_title',
                'value' => 'Bongolekhon Web',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Title',
                'description' => 'The main title of your website'
            ],
            [
                'key' => 'site_description',
                'value' => 'A Laravel + Filament powered Bangla font marketplace',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Site Description',
                'description' => 'Brief description of your website'
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Site Logo',
                'description' => 'Upload your site logo (PNG, JPG, SVG)'
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Site Favicon',
                'description' => 'Upload your site favicon (ICO, PNG)'
            ],
            [
                'key' => 'site_keywords',
                'value' => 'bangla, fonts, typography, bengali, unicode',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Keywords',
                'description' => 'SEO keywords for your website'
            ],

            // Contact Information
            [
                'key' => 'contact_email',
                'value' => 'info@bongolekhon.com',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Contact Email',
                'description' => 'Primary contact email address'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+880 1234 567890',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Contact Phone',
                'description' => 'Primary contact phone number'
            ],
            [
                'key' => 'contact_address',
                'value' => 'Dhaka, Bangladesh',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Contact Address',
                'description' => 'Business address'
            ],
            [
                'key' => 'business_hours',
                'value' => 'Monday - Friday: 9:00 AM - 6:00 PM',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Business Hours',
                'description' => 'Operating hours'
            ],

            // Social Media
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook URL',
                'description' => 'Your Facebook page URL'
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter URL',
                'description' => 'Your Twitter profile URL'
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram URL',
                'description' => 'Your Instagram profile URL'
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'LinkedIn URL',
                'description' => 'Your LinkedIn company page URL'
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/@bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'YouTube URL',
                'description' => 'Your YouTube channel URL'
            ],
            [
                'key' => 'social_github',
                'value' => 'https://github.com/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'GitHub URL',
                'description' => 'Your GitHub profile URL'
            ],
            [
                'key' => 'social_behance',
                'value' => 'https://behance.net/bongolekhon',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Behance URL',
                'description' => 'Your Behance portfolio URL'
            ],

            // Footer Settings
            [
                'key' => 'footer_copyright',
                'value' => '© 2025 Bongolekhon Web. All rights reserved.',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'Footer Copyright',
                'description' => 'Copyright text in footer'
            ],
            [
                'key' => 'footer_description',
                'value' => 'Your trusted source for high-quality Bangla fonts and typography solutions.',
                'type' => 'textarea',
                'group' => 'footer',
                'label' => 'Footer Description',
                'description' => 'Brief description in footer'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
