<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description'
    ];

    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = Cache::remember("setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     */
    public static function set($key, $value, $type = 'text', $group = 'general', $label = null, $description = null)
    {
        try {
            // Debug logging
            \Log::info("Setting::set called with key: {$key}, value: " . var_export($value, true) . ", type: {$type}, group: {$group}");
            
            if (empty($key)) {
                \Log::error("Setting::set called with empty key!");
                throw new \InvalidArgumentException("Setting key cannot be empty");
            }

            $setting = static::updateOrCreate(
                ['key' => $key],
                [
                    'key' => $key,
                    'value' => $value,
                    'type' => $type,
                    'group' => $group,
                    'label' => $label ?: ucfirst(str_replace('_', ' ', $key)),
                    'description' => $description
                ]
            );

            Cache::forget("setting.{$key}");
            return $setting;
        } catch (\Exception $e) {
            \Log::error("Setting::set error for key {$key}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get all settings by group
     */
    public static function getByGroup($group)
    {
        return static::where('group', $group)->get();
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache()
    {
        try {
            \Log::info('=== Starting clearCache ===');
            
            $settings = static::all();
            \Log::info('Settings retrieved: ' . count($settings) . ' items');
            \Log::info('Settings type: ' . gettype($settings));
            
            if (!is_object($settings) || !method_exists($settings, 'each')) {
                \Log::error('Settings is not a collection. Type: ' . gettype($settings));
                throw new \Exception('Settings is not a collection. Type: ' . gettype($settings));
            }
            
            foreach ($settings as $setting) {
                \Log::info('Clearing cache for setting: ' . $setting->key);
                Cache::forget("setting.{$setting->key}");
            }
            
            \Log::info('=== clearCache completed successfully ===');
        } catch (\Exception $e) {
            \Log::error("Error clearing settings cache: " . $e->getMessage());
            \Log::error("Stack trace: " . $e->getTraceAsString());
            throw $e;
        }
    }
}
