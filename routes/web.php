<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Font;
use App\Models\Contributor;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Pricing route
Route::get('/pricing', function () {
    $faqs = [
        (object) ['question' => 'প্রো প্ল্যানে কি কি অন্তর্ভুক্ত?', 'answer' => 'প্রো প্ল্যানে ৫০০+ প্রিমিয়াম ফন্ট, বাণিজ্যিক লাইসেন্স, ২৪/৭ সাপোর্ট ইত্যাদি।'],
        (object) ['question' => 'আমি কি যেকোন সময় প্ল্যান বাতিল করতে পারি?', 'answer' => 'হ্যাঁ, আপনি যেকোন সময় প্ল্যান বাতিল করতে পারবেন।'],
        (object) ['question' => 'পেমেন্ট পদ্ধতি কী কী?', 'answer' => 'বিকাশ, নগদ, রকেট এবং আন্তর্জাতিক কার্ড গ্রহণ করা হয়।'],
    ];

    $paymentMethods = [
        (object) ['name' => 'bKash', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=bKash'],
        (object) ['name' => 'Nagad', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Nagad'],
        (object) ['name' => 'Rocket', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Rocket'],
        (object) ['name' => 'Card', 'logo' => 'https://via.placeholder.com/60x40/1e40af/ffffff?text=Card'],
    ];

    return view('pricing', compact('faqs', 'paymentMethods'));
})->name('pricing');

// About route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Support/info routes
Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/tutorials', function () {
    return view('tutorials');
})->name('tutorials');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Profile and orders routes (stubs)
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/orders', function () {
    return view('orders.index', ['orders' => collect([])]);
})->name('orders.index');

// Auth routes (temporary stubs)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    return back()->with('status', 'Logged in (stub).');
})->name('login.attempt');

Route::post('/logout', function () {
    return back()->with('status', 'Logged out (stub).');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (\Illuminate\Http\Request $request) {
    return back()->with('status', 'Registered (stub).');
})->name('register.attempt');

Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

// Fonts routes
Route::get('/fonts', function () {
    $query = Font::with(['designers', 'developers']);
    
    // Filter by type
    if (request('type') === 'free') {
        $query->where('price', 0);
    } elseif (request('type') === 'premium') {
        $query->where('price', '>', 0);
    }
    
    // Filter by category (placeholder for now)
    if (request('category')) {
        // Add category filtering when categories are implemented
    }
    
    // Sort
    switch (request('sort')) {
        case 'popular':
            $query->orderBy('id', 'desc'); // Placeholder for popularity
            break;
        case 'price_low':
            $query->orderBy('price', 'asc');
            break;
        case 'price_high':
            $query->orderBy('price', 'desc');
            break;
        default:
            $query->latest();
    }
    
    $perPage = request('per_page', 12);
    $fonts = $query->paginate($perPage);
    
    // Transform fonts for view
    $fonts->getCollection()->transform(function ($font) {
        return (object) [
            'id' => $font->id,
            'type' => $font->price > 0 ? 'premium' : 'free',
            'name' => $font->name,
            'display_name' => $font->name,
            'preview_text' => 'আমার বাংলা',
            'description' => $font->description ?? 'বাংলা ফন্ট',
            'price' => $font->price,
            'downloads_count' => rand(100, 2000), // Placeholder
            'rating' => rand(3, 5), // Placeholder
            'font_file_path' => $font->font_file_path,
        ];
    });
    
    $categories = [
        (object) ['id' => 1, 'name' => 'হাতের লেখা'],
        (object) ['id' => 2, 'name' => 'বোল্ড'],
        (object) ['id' => 3, 'name' => 'পাতলা'],
        (object) ['id' => 4, 'name' => 'ডেকোরেটিভ'],
    ];
    
    return view('fonts.index', compact('fonts', 'categories'));
})->name('fonts.index');

Route::get('/fonts/category/{slug}', function (string $slug) {
    return redirect()->route('fonts.index');
})->name('fonts.category');

Route::get('/fonts/search', function () {
    return redirect()->route('fonts.index');
})->name('fonts.search');

// Font details route
Route::get('/fonts/{id}', function (int $id) {
    $font = Font::with(['designers', 'developers'])->findOrFail($id);
    
    $fontData = (object) [
        'id' => $font->id,
        'slug' => 'font-' . $font->id,
        'display_name' => $font->name,
        'name' => $font->name,
        'designer' => $font->designers->first()?->name ?? 'Unknown',
        'developers' => $font->developers->pluck('name')->toArray(),
        'price' => $font->price,
        'type' => $font->price > 0 ? 'premium' : 'free',
        'weights' => [400],
        'styles' => ['Regular'],
        'description' => $font->description ?? 'একটি বোল্ড, এলিগ্যান্ট বাংলা হেডলাইন ফন্ট – আধুনিক কার্ভ ও ব্যালেন্সড প্রপোর্শন।',
        'published_at' => $font->published_date?->format('Y-m-d') ?? '2025-08-16',
        'font_file_path' => $font->font_file_path,
    ];

    $testerSamples = [
        'ঢাকা স্মৃতিময় শহর',
        'আমার সোনার বাংলা',
        'বর্ষামুখর দিন শেষে',
        'বাংলা টাইপোগ্রাফি সুন্দর',
    ];

    $basicGlyphs = [
        'অ','আ','ই','ঈ','উ','ঊ','ঋ','এ','ঐ','ও','ঔ',
        'ক','খ','গ','ঘ','ঙ','চ','ছ','জ','ঝ','ঞ',
        'ট','ঠ','ড','ঢ','ণ','ত','থ','দ','ধ','ন',
        'প','ফ','ব','ভ','ম','য','র','ল','শ','ষ','স','হ','ড়','ঢ়','য়','ৎ','ং','ঃ','ঁ',
        '০','১','২','৩','৪','৫','৬','৭','৮','৯',
        '।','–','—','‘','’','“','”'
    ];

    $marks = ['া','ি','ী','ু','ূ','ৃ','ে','ৈ','ো','ৌ','্'];

    $complexGlyphs = [
        'ক্ত','ক্ত্র','ক্ত্ব','গ্ন','ন্ধ','ন্ড','ন্ত্র','ন্ত্র্য','স্খ','স্ক্র','স্ত্র','শ্চ','শ্ব','শ্র','চ্ছ','জ্জ','জ্ঞ','ক্ষ','ক্ষ্ম','ক্ষ্ণ','হ্ম','হ্ন','হ্ল',
        'ঞ্জ','ঞ্চ','ন্ট','ণ্ট','ণ্ড','ন্ড্র','ন্দ','ন্দ্র','ল্ক','ল্গ','ল্প','ম্প','ম্ভ','ম্ব','ম্ভ্র'
    ];

    return view('fonts.show', compact('fontData','testerSamples','basicGlyphs','marks','complexGlyphs'));
})->name('fonts.show');

// Cart routes (temporary stubs)
Route::get('/cart', function () {
    return response('Cart page placeholder');
})->name('cart.index');

Route::post('/cart/add', function (\Illuminate\Http\Request $request) {
    return back()->with('status', 'Added to cart');
})->name('cart.add');

// Font download route (temporary stub)
Route::post('/fonts/{id}/download', function ($id) {
    return back()->with('status', 'Download started for font ID '.$id);
})->name('fonts.download');