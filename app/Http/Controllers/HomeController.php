<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Contributor;
use App\Models\Category;
use App\Models\Slider;
use App\Models\CompanyLogo;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();

        $categories = Category::where('is_active', true)
            ->take(4)
            ->get()
            ->map(function ($category) {
                $icons = [
                    'handwriting' => 'fas fa-pen-fancy',
                    'bold' => 'fas fa-bold',
                    'thin' => 'fas fa-minus',
                    'decorative' => 'fas fa-font',
                    'serif' => 'fas fa-font',
                    'sans-serif' => 'fas fa-font',
                    'headline' => 'fas fa-heading',
                    'body-text' => 'fas fa-paragraph',
                ];
                
                return (object) [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'icon' => $icons[$category->slug] ?? 'fas fa-font',
                ];
            });

        $featuredFonts = Font::with(['designers', 'developers', 'category'])
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($font) {
                return (object) [
                    'id' => $font->id,
                    'type' => $font->price > 0 ? 'premium' : 'free',
                    'name' => $font->name,
                    'display_name' => $font->name,
                    'preview_text' => 'আমার সোনার বাংলা',
                    'description' => $font->description ?? 'বাংলা ফন্ট',
                    'price' => $font->price,
                    'downloads_count' => $font->downloads_count ?? 0, // Actual database value
                    'font_file_path' => $font->font_file_path,
                    'preview_image_path' => $font->preview_image_path,
                    'preview_images' => $font->preview_images ?? [],
                    'slider_images' => $font->slider_images ?? [],
                    'category' => $font->category,
                ];
            });


        $companyLogos = CompanyLogo::active()->ordered()->get();
        $services = Service::active()->ordered()->get();

        return view('home', compact('sliders', 'categories', 'featuredFonts', 'companyLogos', 'services'));
    }
}
