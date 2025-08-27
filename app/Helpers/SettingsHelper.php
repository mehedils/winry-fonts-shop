<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        return Setting::get($key, $default);
    }

    /**
     * Get site title
     */
    public static function siteTitle()
    {
        return self::get('site_title', 'Bongolekhon Web');
    }

    /**
     * Get site description
     */
    public static function siteDescription()
    {
        return self::get('site_description', 'A Laravel + Filament powered Bangla font marketplace');
    }

    /**
     * Get site logo URL
     */
    public static function siteLogo()
    {
        $logo = self::get('site_logo');
        return $logo ? asset('storage/' . $logo) : null;
    }

    /**
     * Get site favicon URL
     */
    public static function siteFavicon()
    {
        $favicon = self::get('site_favicon');
        return $favicon ? asset('storage/' . $favicon) : null;
    }

    /**
     * Get site keywords
     */
    public static function siteKeywords()
    {
        return self::get('site_keywords', 'bangla, fonts, typography, bengali, unicode');
    }

    /**
     * Get contact email
     */
    public static function contactEmail()
    {
        return self::get('contact_email', 'info@bongolekhon.com');
    }

    /**
     * Get contact phone
     */
    public static function contactPhone()
    {
        return self::get('contact_phone', '+880 1234 567890');
    }

    /**
     * Get contact address
     */
    public static function contactAddress()
    {
        return self::get('contact_address', 'Dhaka, Bangladesh');
    }

    /**
     * Get business hours
     */
    public static function businessHours()
    {
        return self::get('business_hours', 'Monday - Friday: 9:00 AM - 6:00 PM');
    }

    /**
     * Get social media links
     */
    public static function socialLinks(): array
    {
        return [
            'facebook' => self::get('social_facebook'),
            'twitter' => self::get('social_twitter'),
            'instagram' => self::get('social_instagram'),
            'linkedin' => self::get('social_linkedin'),
            'youtube' => self::get('social_youtube'),
            'github' => self::get('social_github'),
            'behance' => self::get('social_behance'),
        ];
    }

    /**
     * Get footer copyright
     */
    public static function footerCopyright()
    {
        return self::get('footer_copyright', '© 2025 Bongolekhon Web. All rights reserved.');
    }

    /**
     * Get footer description
     */
    public static function footerDescription()
    {
        return self::get('footer_description', 'Your trusted source for high-quality Bangla fonts and typography solutions.');
    }
}
