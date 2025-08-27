<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Contributor;

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

        $featuredFonts = Font::with(['designers', 'developers'])
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($font) {
                return (object) [
                    'id' => $font->id,
                    'type' => $font->price > 0 ? 'premium' : 'free',
                    'name' => $font->name,
                    'display_name' => $font->name,
                    'preview_text' => 'আমার বাংলা',
                    'description' => $font->description ?? 'বাংলা ফন্ট',
                    'price' => $font->price,
                    'downloads_count' => rand(100, 2000), // Placeholder for now
                    'rating' => rand(3, 5), // Placeholder for now
                    'font_file_path' => $font->font_file_path,
                ];
            });

        $paymentMethods = [
            (object) ['name' => 'bKash', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=bKash'],
            (object) ['name' => 'Nagad', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Nagad'],
            (object) ['name' => 'Rocket', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Rocket'],
            (object) ['name' => 'Card', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Card'],
        ];

        return view('home', compact('categories', 'featuredFonts', 'paymentMethods'));
    }
}
