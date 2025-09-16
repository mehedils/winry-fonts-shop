<?php

use App\Helpers\SettingsHelper;

if (!function_exists('siteTitle')) {
    /**
     * Get the site title
     */
    function siteTitle(): string
    {
        return SettingsHelper::siteTitle();
    }
}

if (!function_exists('siteDescription')) {
    /**
     * Get the site description
     */
    function siteDescription(): string
    {
        return SettingsHelper::siteDescription();
    }
}

if (!function_exists('siteLogo')) {
    /**
     * Get the site logo URL
     */
    function siteLogo(): ?string
    {
        return SettingsHelper::siteLogo();
    }
}

if (!function_exists('siteFavicon')) {
    /**
     * Get the site favicon URL
     */
    function siteFavicon(): ?string
    {
        return SettingsHelper::siteFavicon();
    }
}

if (!function_exists('siteKeywords')) {
    /**
     * Get the site keywords
     */
    function siteKeywords(): string
    {
        return SettingsHelper::siteKeywords();
    }
}

if (!function_exists('contactEmail')) {
    /**
     * Get the contact email
     */
    function contactEmail(): string
    {
        return SettingsHelper::contactEmail();
    }
}

if (!function_exists('contactPhone')) {
    /**
     * Get the contact phone
     */
    function contactPhone(): string
    {
        return SettingsHelper::contactPhone();
    }
}

if (!function_exists('contactAddress')) {
    /**
     * Get the contact address
     */
    function contactAddress(): string
    {
        return SettingsHelper::contactAddress();
    }
}

if (!function_exists('businessHours')) {
    /**
     * Get the business hours
     */
    function businessHours(): string
    {
        return SettingsHelper::businessHours();
    }
}

if (!function_exists('socialLinks')) {
    /**
     * Get the social media links
     */
    function socialLinks(): array
    {
        return SettingsHelper::socialLinks();
    }
}

if (!function_exists('footerCopyright')) {
    /**
     * Get the footer copyright
     */
    function footerCopyright(): string
    {
        return SettingsHelper::footerCopyright();
    }
}

if (!function_exists('footerDescription')) {
    /**
     * Get the footer description
     */
    function footerDescription(): string
    {
        return SettingsHelper::footerDescription();
    }
}

if (!function_exists('aboutUsContent')) {
    /**
     * Get the About Us rich text content
     */
    function aboutUsContent(): ?string
    {
        return SettingsHelper::aboutUsContent();
    }
}
