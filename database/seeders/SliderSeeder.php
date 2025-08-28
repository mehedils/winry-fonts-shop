<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'বাংলার সেরা ফন্ট মার্কেটপ্লেস',
                'description' => '১০০০+ প্রিমিয়াম বাংলা ফন্ট এবং ফ্রি ফন্ট সংগ্রহ',
                'image_path' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'button_text' => 'বিনামূল্যে ফন্ট এক্সপ্লোর করুন',
                'button_link' => '/fonts',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'প্রিমিয়াম বাংলা ফন্ট',
                'description' => 'উচ্চ মানের টাইপোগ্রাফি আপনার প্রজেক্টে যোগ করুন',
                'image_path' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'button_text' => 'প্রিমিয়াম ফন্ট কিনুন',
                'button_link' => '/fonts?category=premium',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'ফ্রি বাংলা ফন্ট',
                'description' => 'বিনামূল্যে ডাউনলোড করুন এবং ব্যবহার করুন',
                'image_path' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'button_text' => 'ফ্রি ফন্ট দেখুন',
                'button_link' => '/fonts?category=free',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
