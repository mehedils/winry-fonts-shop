<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = [
            (object) ['name' => 'হাতের লেখা', 'slug' => 'handwriting', 'icon' => 'fas fa-pen-fancy'],
            (object) ['name' => 'বোল্ড', 'slug' => 'bold', 'icon' => 'fas fa-bold'],
            (object) ['name' => 'পাতলা', 'slug' => 'thin', 'icon' => 'fas fa-minus'],
            (object) ['name' => 'ডেকোরেটিভ', 'slug' => 'decorative', 'icon' => 'fas fa-font'],
        ];

        $featuredFonts = [
            (object) [
                'id' => 1,
                'type' => 'premium',
                'name' => 'Amar Bangla',
                'display_name' => 'বাংলা প্রিমিয়াম',
                'preview_text' => 'আমার বাংলা',
                'description' => 'মডার্ন বাংলা ফন্ট',
                'price' => 500,
                'downloads_count' => 245,
                'rating' => 4,
            ],
            (object) [
                'id' => 2,
                'type' => 'free',
                'name' => 'Bangla Sundor',
                'display_name' => 'সুন্দর বাংলা',
                'preview_text' => 'বাংলা সুন্দর',
                'description' => 'ফ্রি ফন্ট',
                'price' => 0,
                'downloads_count' => 1200,
                'rating' => 5,
            ],
            (object) [
                'id' => 3,
                'type' => 'premium',
                'name' => 'Bangla Classic',
                'display_name' => 'ক্লাসিক প্রো',
                'preview_text' => 'বাংলা ক্লাসিক',
                'description' => 'ট্র্যাডিশনাল স্টাইল',
                'price' => 750,
                'downloads_count' => 530,
                'rating' => 4,
            ],
            (object) [
                'id' => 4,
                'type' => 'premium',
                'name' => 'Bangla Modern',
                'display_name' => 'মডার্ন লাইট',
                'preview_text' => 'বাংলা মডার্ন',
                'description' => 'মিনিমাল ডিজাইন',
                'price' => 400,
                'downloads_count' => 310,
                'rating' => 4,
            ],
        ];

        $paymentMethods = [
            (object) ['name' => 'bKash', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=bKash'],
            (object) ['name' => 'Nagad', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Nagad'],
            (object) ['name' => 'Rocket', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Rocket'],
            (object) ['name' => 'Card', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Card'],
        ];

        return view('home', compact('categories', 'featuredFonts', 'paymentMethods'));
    }
}
