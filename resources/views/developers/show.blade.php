@extends('layouts.app')

@section('title', $contributorData->name . ' - প্রোফাইল - ' . siteTitle())

@push('styles')
@if(isset($contributorData->fonts) && $contributorData->fonts->count())
<style>
@foreach($contributorData->fonts as $f)
    @if(!empty($f->font_file_path))
    @font-face {
        font-family: 'Font{{ $f->id }}';
        src: url('{{ asset('storage/' . $f->font_file_path) }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @endif
@endforeach
</style>
@endif
@endpush

@section('content')
    <div class="bg-gray-50 py-8">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('developers') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="bengali-text">সব ডেভেলপার দেখুন</span>
                </a>
            </div>

            <!-- Profile Header -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8">
                    <div class="flex flex-col md:flex-row items-center">
                        <!-- Profile Image -->
                        <div class="flex-shrink-0 mb-6 md:mb-0 md:mr-8">
                            @if($contributorData->photo_path)
                                <img src="{{ asset('storage/' . $contributorData->photo_path) }}" 
                                     alt="{{ $contributorData->name }}" 
                                     class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                            @else
                                <div class="w-32 h-32 rounded-full bg-white bg-opacity-20 border-4 border-white shadow-lg flex items-center justify-center">
                                    <i class="fas fa-user text-4xl text-white"></i>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Profile Info -->
                        <div class="text-center md:text-left text-white">
                            <h1 class="text-3xl font-bold mb-2">{{ $contributorData->name }}</h1>
                            <div class="flex flex-wrap justify-center md:justify-start space-x-3 mb-4">
                                @if($contributorData->is_designer)
                                    <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                                        <i class="fas fa-palette mr-2"></i>ডিজাইনার
                                    </span>
                                @endif
                                @if($contributorData->is_developer)
                                    <span class="bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                                        <i class="fas fa-code mr-2"></i>ডেভেলপার
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex flex-wrap justify-center md:justify-start space-x-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">{{ $contributorData->fonts_count }}</div>
                                    <div class="text-sm opacity-90 bengali-text">মোট ফন্ট</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                @if($contributorData->website || $contributorData->facebook || $contributorData->instagram || $contributorData->twitter || $contributorData->behance || $contributorData->whatsapp)
                    <div class="p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 bengali-text">সামাজিক যোগাযোগ</h3>
                        <div class="flex flex-wrap space-x-4">
                            @if($contributorData->website)
                                <a href="{{ $contributorData->website }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-globe mr-2"></i>
                                    <span class="bengali-text">ওয়েবসাইট</span>
                                </a>
                            @endif
                            @if($contributorData->facebook)
                                <a href="{{ $contributorData->facebook }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                    <i class="fab fa-facebook mr-2"></i>
                                    <span class="bengali-text">ফেসবুক</span>
                                </a>
                            @endif
                            @if($contributorData->instagram)
                                <a href="{{ $contributorData->instagram }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-pink-100 hover:text-pink-600 transition-colors">
                                    <i class="fab fa-instagram mr-2"></i>
                                    <span class="bengali-text">ইনস্টাগ্রাম</span>
                                </a>
                            @endif
                            @if($contributorData->twitter)
                                <a href="{{ $contributorData->twitter }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-400 transition-colors">
                                    <i class="fab fa-twitter mr-2"></i>
                                    <span class="bengali-text">টুইটার</span>
                                </a>
                            @endif
                            @if($contributorData->behance)
                                <a href="{{ $contributorData->behance }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                    <i class="fab fa-behance mr-2"></i>
                                    <span class="bengali-text">বিহ্যান্স</span>
                                </a>
                            @endif
                            @if($contributorData->whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contributorData->whatsapp) }}" target="_blank" 
                                   class="flex items-center px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-green-100 hover:text-green-600 transition-colors">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    <span class="bengali-text">হোয়াটসঅ্যাপ</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Fonts Section -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 bengali-text">{{ $contributorData->name }} এর ফন্টসমূহ</h2>
                
                @if($contributorData->fonts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($contributorData->fonts as $font)
                            <div class="font-card bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors">
                                <!-- Font Preview -->
                                <div class="bg-white rounded-lg p-4 mb-4 text-center">
                                    <p class="text-2xl text-gray-800 bengali-text" style="font-family: 'Font{{ $font->id }}', 'Hind Siliguri', sans-serif;">
                                        {{ $font->name }}
                                    </p>
                                </div>
                                
                                <!-- Font Info -->
                                <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $font->name }}</h3>
                                <p class="text-gray-600 mb-3 bengali-text text-sm">{{ $font->description ?? 'বাংলা ফন্ট' }}</p>
                                
                                <!-- Price and Action -->
                                <div class="flex justify-between items-center">
                                    @if($font->type === 'free')
                                        <span class="text-lg font-bold text-green-600">ফ্রি</span>
                                        <a href="{{ route('fonts.show', $font->id) }}" 
                                           class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-600 transition-colors bengali-text">
                                            দেখুন
                                        </a>
                                    @else
                                        <span class="text-lg font-bold text-blue-600">৳{{ number_format($font->price) }}</span>
                                        <a href="{{ route('fonts.show', $font->id) }}" 
                                           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 transition-colors bengali-text">
                                            দেখুন
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-font text-4xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2 bengali-text">কোন ফন্ট পাওয়া যায়নি</h3>
                        <p class="text-gray-500 bengali-text">এই ডেভেলপার/ডিজাইনারের এখনও কোন ফন্ট প্রকাশিত হয়নি</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
