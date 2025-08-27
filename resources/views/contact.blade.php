@extends('layouts.app')

@section('title', 'যোগাযোগ - ' . \App\Helpers\SettingsHelper::siteTitle())

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 bengali-text text-center">যোগাযোগ করুন</h1>
            <p class="text-gray-700 bengali-text mb-8 text-center">প্রশ্ন বা মতামত থাকলে আমাদের লিখুন।</p>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4 bengali-text">আমাদের লিখুন</h2>
                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Stub: Message sent');" class="space-y-4">
                        <input type="text" placeholder="নাম" class="w-full border rounded px-3 py-2">
                        <input type="email" placeholder="ইমেইল" class="w-full border rounded px-3 py-2">
                        <textarea placeholder="বার্তা" class="w-full border rounded px-3 py-2" rows="5"></textarea>
                        <button class="btn-primary text-white px-4 py-2 rounded">পাঠান</button>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold mb-4 bengali-text">যোগাযোগের তথ্য</h2>
                    
                    @if(\App\Helpers\SettingsHelper::contactEmail())
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-envelope text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="font-semibold bengali-text">ইমেইল</h3>
                            <p class="text-gray-600">{{ \App\Helpers\SettingsHelper::contactEmail() }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if(\App\Helpers\SettingsHelper::contactPhone())
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-phone text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="font-semibold bengali-text">ফোন</h3>
                            <p class="text-gray-600">{{ \App\Helpers\SettingsHelper::contactPhone() }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if(\App\Helpers\SettingsHelper::contactAddress())
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="font-semibold bengali-text">ঠিকানা</h3>
                            <p class="text-gray-600">{{ \App\Helpers\SettingsHelper::contactAddress() }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if(\App\Helpers\SettingsHelper::businessHours())
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-clock text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="font-semibold bengali-text">কর্মঘণ্টা</h3>
                            <p class="text-gray-600">{{ \App\Helpers\SettingsHelper::businessHours() }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Social Media Links -->
                    @php($socialLinks = \App\Helpers\SettingsHelper::socialLinks())
                    @if(array_filter($socialLinks))
                    <div class="pt-4">
                        <h3 class="font-semibold bengali-text mb-3">সামাজিক মাধ্যম</h3>
                        <div class="flex space-x-4">
                            @if($socialLinks['facebook'])
                                <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 transition">
                                    <i class="fab fa-facebook text-2xl"></i>
                                </a>
                            @endif
                            @if($socialLinks['twitter'])
                                <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="text-blue-400 hover:text-blue-600 transition">
                                    <i class="fab fa-twitter text-2xl"></i>
                                </a>
                            @endif
                            @if($socialLinks['instagram'])
                                <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="text-pink-600 hover:text-pink-800 transition">
                                    <i class="fab fa-instagram text-2xl"></i>
                                </a>
                            @endif
                            @if($socialLinks['linkedin'])
                                <a href="{{ $socialLinks['linkedin'] }}" target="_blank" class="text-blue-700 hover:text-blue-900 transition">
                                    <i class="fab fa-linkedin text-2xl"></i>
                                </a>
                            @endif
                            @if($socialLinks['youtube'])
                                <a href="{{ $socialLinks['youtube'] }}" target="_blank" class="text-red-600 hover:text-red-800 transition">
                                    <i class="fab fa-youtube text-2xl"></i>
                                </a>
                            @endif
                            @if($socialLinks['github'])
                                <a href="{{ $socialLinks['github'] }}" target="_blank" class="text-gray-800 hover:text-gray-600 transition">
                                    <i class="fab fa-github text-2xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
