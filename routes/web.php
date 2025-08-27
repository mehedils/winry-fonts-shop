<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Fonts routes (temporary stubs to satisfy view links)
Route::get('/fonts', function () {
    return view('fonts.index', [
        'fonts' => collect([]),
        'categories' => collect([]),
    ]);
})->name('fonts.index');

Route::get('/fonts/category/{slug}', function (string $slug) {
    return redirect()->route('fonts.index');
})->name('fonts.category');

Route::get('/fonts/search', function () {
    return redirect()->route('fonts.index');
})->name('fonts.search');

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