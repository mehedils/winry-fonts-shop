@extends('layouts.app')

@section('title', $fontData->display_name . ' - ' . siteTitle())

@section('content')
    <section class="py-6 sm:py-8 md:py-10 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="lg:col-span-2">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 bengali-text">{{ $fontData->display_name }}</h1>
                    <p class="text-gray-600 mt-2 text-sm sm:text-base bengali-text">{{ $fontData->description }}</p>

                    <!-- Font Details -->
                    <div class="mt-4 sm:mt-6 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <i class="fas fa-language text-blue-600 text-sm sm:text-base"></i>
                                <div>
                                    <div class="font-semibold text-xs sm:text-sm bengali-text">Supported Encodings</div>
                                    <div class="text-gray-700 text-xs sm:text-sm">{{ $fontData->supported_encodings }}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 sm:gap-3">
                                <i class="fas fa-font text-green-600 text-sm sm:text-base"></i>
                                <div>
                                    <div class="font-semibold text-xs sm:text-sm bengali-text">Number of Glyphs</div>
                                    <div class="text-gray-700 text-xs sm:text-sm">{{ $fontData->glyphs }} characters</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($fontData->price > 0)
                        <!-- Premium Font Preview Slider -->
                        <div class="mt-6 sm:mt-8 bg-white border rounded-lg p-4 sm:p-6">
                            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 bengali-text flex items-center gap-2">
                                <i class="fas fa-images text-blue-600 text-lg sm:text-xl"></i>
                                Font Style Preview
                            </h2>
                            <div class="bg-gray-50 rounded-lg p-2 sm:p-4 w-full overflow-hidden">
                                @if(!empty($fontData->slider_images) && count($fontData->slider_images) > 1)
                                    <!-- Swiper Container -->
                                    <div class="swiper font-preview-swiper w-full max-w-full">
                                        <div class="swiper-wrapper">
                                            @foreach($fontData->slider_images as $image)
                                                <div class="swiper-slide">
                                                    <div class="text-center w-full h-full flex items-center justify-center">
                                                        <img src="{{ asset('storage/' . $image) }}" 
                                                             alt="{{ $fontData->display_name }} Style {{ $loop->iteration }}" 
                                                             class="w-full h-full object-contain rounded-lg shadow-lg">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Navigation buttons -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <!-- Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                @elseif(!empty($fontData->slider_images) && count($fontData->slider_images) == 1)
                                    <!-- Single image fallback -->
                                    <div class="text-center w-full max-w-full overflow-hidden">
                                        <img src="{{ asset('storage/' . $fontData->slider_images[0]) }}" 
                                             alt="{{ $fontData->display_name }} Preview" 
                                             class="w-full max-w-full max-h-96 object-contain mx-auto rounded-lg shadow-lg">
                                    </div>
                                @else
                                    <!-- No slider images yet - placeholder -->
                                    <div class="text-center py-12">
                                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-3xl"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-700 mb-2 bengali-text">স্লাইডার ইমেজ যোগ করা হয়নি</h3>
                                        <p class="text-sm text-gray-500 bengali-text">এই ফন্টের জন্য স্লাইডার ইমেজ যোগ করতে অ্যাডমিন প্যানেলে যান</p>
                                    </div>
                                @endif
                                <p class="text-sm text-gray-600 mt-4 text-center bengali-text">
                                    এই ফন্টটি প্রিমিয়াম। সম্পূর্ণ ফন্ট ডাউনলোড করতে ক্রয় করুন।
                                </p>
                            </div>
                        </div>
                    @else
                        <!-- Free Font Type Tester -->
                        <div class="mt-8 bg-white border rounded-lg p-6">
                            <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                                <i class="fas fa-edit text-blue-600"></i>
                                Type Tester
                            </h2>
                        
                        <!-- Text Input Section -->
                        <div class="grid md:grid-cols-4 gap-4 mb-6">
                            <div class="md:col-span-3">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class="fas fa-font text-gray-500"></i>
                                    <input id="tester-input" type="text" value="ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type your text here..." />
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-arrows-alt-v text-gray-500"></i>
                                <input id="size-range" type="range" min="16" max="128" value="48" class="w-full" />
                                <span id="size-value" class="w-16 text-right font-medium text-gray-700">48px</span>
                            </div>
                        </div>

                        <!-- Style Controls -->
                        <div class="grid md:grid-cols-3 gap-6 mb-6">
                            <!-- Font Style Controls -->
                            <div class="flex items-center gap-4">
                                <i class="fas fa-palette text-gray-500"></i>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-blue-600 transition">
                                    <input id="toggle-bold" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <i class="fas fa-bold text-lg"></i>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-blue-600 transition">
                                    <input id="toggle-italic" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <i class="fas fa-italic text-lg"></i>
                                </label>
                            </div>
                            
                            <!-- Font Weight Control -->
                            <div class="flex items-center gap-3">
                                <i class="fas fa-weight-hanging text-gray-500"></i>
                                <input id="weight-range" type="range" min="100" max="900" step="50" value="400" class="w-full" />
                                <span id="weight-value" class="w-12 text-right text-sm font-medium text-gray-700">400</span>
                            </div>
                            
                            <!-- Text Alignment -->
                            <div class="flex items-center gap-2">
                                <i class="fas fa-align-left text-gray-500"></i>
                                <button type="button" data-align="left" class="align-btn p-2 border rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button type="button" data-align="center" class="align-btn p-2 border rounded-lg hover:bg-gray-100 transition">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button type="button" data-align="right" class="align-btn p-2 border rounded-lg hover:bg-gray-100 transition">
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sample Text Buttons -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-lightbulb text-gray-500"></i>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($testerSamples as $sample)
                                        <button class="px-3 py-2 rounded-lg bg-gray-100 hover:bg-blue-100 hover:text-blue-700 transition text-sm bengali-text" onclick="setTesterText('{{ $sample }}')">
                                            {{ $sample }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Output Preview -->
                        <div class=" rounded-lg p-6 bg-gray-50">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-eye text-gray-500"></i>
                                </div>
                                <button onclick="copyToClipboard()" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Copy CSS">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div id="tester-output" class="bengali-text min-h-[120px] flex items-center" style="font-size: 48px; line-height: 1.4; font-weight: 400; font-style: normal; text-align: left; font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">
                                ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($fontData->price == 0)
                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                            <i class="fas fa-font text-blue-600"></i>
                            Glyph Preview
                        </h2>
                        <div class="space-y-8">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-letters text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-12 gap-3 text-center">
                                    @foreach($basicGlyphs as $g)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-blue-50 hover:border-blue-200 transition cursor-pointer group" title="{{ $g }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $g }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-music text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-8 sm:grid-cols-10 md:grid-cols-12 gap-3 text-center">
                                    @foreach($marks as $m)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-green-50 hover:border-green-200 transition cursor-pointer group" title="{{ $m }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $m }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-link text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-8 gap-3 text-center">
                                    @foreach($complexGlyphs as $cg)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-purple-50 hover:border-purple-200 transition cursor-pointer group" title="{{ $cg }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl leading-tight bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $cg }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Designer and Developer Section -->
                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                            <i class="fas fa-users text-blue-600"></i>
                            Contributors
                        </h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Designer Section -->
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text flex items-center gap-2">
                                    <i class="fas fa-palette text-gray-600"></i>
                                    ডিজাইনার
                                </h3>
                                @if(isset($fontData->designers) && count($fontData->designers) > 0)
                                    @foreach($fontData->designers as $designer)
                                        <div class="flex items-center space-x-3 mb-3">
                                            @if($designer->photo_path)
                                                <img src="{{ asset('storage/' . $designer->photo_path) }}" 
                                                     alt="{{ $designer->name }}" 
                                                     class="w-10 h-10 rounded-full object-cover">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="font-medium text-gray-800">
                                                    <a href="{{ route('font-artist.show', $designer->id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        {{ $designer->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-gray-500 bengali-text">ডিজাইনার তথ্য নেই</div>
                                @endif
                            </div>

                            <!-- Developer Section -->
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text flex items-center gap-2">
                                    <i class="fas fa-code text-gray-600"></i>
                                    টাইপ ডেভেলপার
                                </h3>
                                @if(isset($fontData->developers) && count($fontData->developers) > 0)
                                    @foreach($fontData->developers as $developer)
                                        <div class="flex items-center space-x-3 mb-3">
                                            @if($developer->photo_path)
                                                <img src="{{ asset('storage/' . $developer->photo_path) }}" 
                                                     alt="{{ $developer->name }}" 
                                                     class="w-10 h-10 rounded-full object-cover">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="font-medium text-gray-800">
                                                    <a href="{{ route('font-artist.show', $developer->id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        {{ $developer->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-gray-500 bengali-text">ডেভেলপার তথ্য নেই</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="lg:col-span-1 order-first lg:order-last">
                    <div class="border rounded-lg p-4 sm:p-6 lg:sticky lg:top-24">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-3 sm:mb-4">
                            {{ $fontData->price > 0 ? '৳'.number_format($fontData->price) : 'ফ্রি' }}
                        </div>
                        @if($fontData->type === 'free')
                            <a href="{{ route('fonts.download', $fontData->id) }}" class="w-full bg-green-600 text-white px-4 py-2 sm:py-3 rounded-lg hover:bg-green-700 block text-center bengali-text text-sm sm:text-base font-medium">
                                ডাউনলোড
                            </a>
                        @else
                            <a href="{{ route('orders.create', $fontData->id) }}" class="w-full btn-primary text-white px-4 py-2 sm:py-3 rounded-lg block text-center bengali-text text-sm sm:text-base font-medium">
                                কিনুন
                            </a>
                        @endif

                        <div class="mt-4 sm:mt-6 text-xs sm:text-sm text-gray-600 space-y-1 sm:space-y-2">
                            <div class="bengali-text">প্রকাশিত: {{ 
                                \Illuminate\Support\Carbon::parse($fontData->published_at)->translatedFormat('d F, Y') 
                            }}</div>
                            <div class="bengali-text">ডাউনলোড: {{ number_format($fontData->downloads_count ?? 0) }} বার</div>
                            <div class="bengali-text">লাইসেন্স: ব্যক্তিগত/বাণিজ্যিক</div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@if($fontData->font_file_path && $fontData->price == 0)
<style>
    @font-face {
        font-family: '{{ $fontData->name }}';
        src: url('{{ asset('storage/' . $fontData->font_file_path) }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
</style>
@endif

@if($fontData->price > 0)
<style>
/* Font Preview Swiper Styles */
.font-preview-swiper {
    width: 100% !important;
    max-width: 100% !important;
    height: 500px;
    margin: 0 auto;
    padding: 0 20px;
    overflow: hidden;
    box-sizing: border-box;
}

.font-preview-swiper .swiper-wrapper {
    width: 100% !important;
    max-width: 100% !important;
}

.font-preview-swiper .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    padding: 20px;
    width: 100% !important;
    max-width: 100% !important;
    box-sizing: border-box;
}

.font-preview-swiper .swiper-slide img {
    width: 100% !important;
    height: 100%;
    object-fit: contain;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
    max-width: 100% !important;
    max-height: 100%;
    box-sizing: border-box;
}

.font-preview-swiper .swiper-slide img:hover {
    transform: scale(1.02);
}

/* Navigation buttons */
.font-preview-swiper .swiper-button-next,
.font-preview-swiper .swiper-button-prev {
    color: #3b82f6;
    background: rgba(255, 255, 255, 0.95);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.font-preview-swiper .swiper-button-next:hover,
.font-preview-swiper .swiper-button-prev:hover {
    background: white;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.font-preview-swiper .swiper-button-next:after,
.font-preview-swiper .swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
}

/* Pagination */
.font-preview-swiper .swiper-pagination {
    bottom: 20px;
}

.font-preview-swiper .swiper-pagination-bullet {
    background: #3b82f6;
    opacity: 0.6;
    width: 12px;
    height: 12px;
    margin: 0 6px;
    transition: all 0.3s ease;
}

.font-preview-swiper .swiper-pagination-bullet-active {
    opacity: 1;
    transform: scale(1.3);
    background: #1d4ed8;
}

/* Tablet responsive */
@media (max-width: 1024px) {
    .font-preview-swiper {
        height: 450px;
        padding: 0 15px;
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-wrapper {
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .font-preview-swiper .swiper-slide {
        padding: 15px;
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-slide img {
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        object-fit: contain;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-button-next,
    .font-preview-swiper .swiper-button-prev {
        width: 45px;
        height: 45px;
    }
    
    .font-preview-swiper .swiper-button-next:after,
    .font-preview-swiper .swiper-button-prev:after {
        font-size: 16px;
    }
}

/* Mobile responsive */
@media (max-width: 768px) {
    .font-preview-swiper {
        height: 350px;
        padding: 0 5px;
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-wrapper {
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .font-preview-swiper .swiper-slide {
        padding: 5px;
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-slide img {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        object-fit: contain;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-button-next,
    .font-preview-swiper .swiper-button-prev {
        width: 40px;
        height: 40px;
    }
    
    .font-preview-swiper .swiper-button-next:after,
    .font-preview-swiper .swiper-button-prev:after {
        font-size: 14px;
    }
    
    .font-preview-swiper .swiper-pagination {
        bottom: 15px;
    }
    
    .font-preview-swiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        margin: 0 4px;
    }
}

/* Small mobile responsive */
@media (max-width: 480px) {
    .font-preview-swiper {
        height: 280px;
        padding: 0 2px;
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-wrapper {
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .font-preview-swiper .swiper-slide {
        padding: 2px;
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-slide img {
        width: 100% !important;
        max-width: 100% !important;
        height: 100%;
        object-fit: contain;
        border-radius: 6px;
        box-sizing: border-box;
    }
    
    .font-preview-swiper .swiper-button-next,
    .font-preview-swiper .swiper-button-prev {
        width: 35px;
        height: 35px;
    }
    
    .font-preview-swiper .swiper-button-next:after,
    .font-preview-swiper .swiper-button-prev:after {
        font-size: 12px;
    }
    
    .font-preview-swiper .swiper-pagination {
        bottom: 10px;
    }
    
    .font-preview-swiper .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        margin: 0 3px;
    }
    }
</style>
@endif
@endpush

@push('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    // Initialize Font Preview Swiper for premium fonts
    document.addEventListener('DOMContentLoaded', function() {
        @if($fontData->price > 0 && !empty($fontData->slider_images) && count($fontData->slider_images) > 1)
        const fontPreviewSwiper = new Swiper('.font-preview-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.font-preview-swiper .swiper-button-next',
                prevEl: '.font-preview-swiper .swiper-button-prev',
            },
            pagination: {
                el: '.font-preview-swiper .swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            }
        });
        @endif
    });

    function setTesterText(text) {
        const input = document.getElementById('tester-input');
        input.value = text;
        updateTester();
    }
    
    function updateTester() {
        const text = document.getElementById('tester-input').value;
        const size = document.getElementById('size-range').value;
        const weight = document.getElementById('weight-range').value;
        const bold = document.getElementById('toggle-bold').checked;
        const italic = document.getElementById('toggle-italic').checked;
        const out = document.getElementById('tester-output');
        
        document.getElementById('size-value').innerText = size + 'px';
        document.getElementById('weight-value').innerText = weight;
        out.style.fontSize = size + 'px';
        out.style.fontWeight = bold ? '700' : weight;
        out.style.fontStyle = italic ? 'italic' : 'normal';
        out.textContent = text;
    }
    
    function copyToClipboard() {
        const text = document.getElementById('tester-input').value;
        const size = document.getElementById('size-range').value;
        const weight = document.getElementById('weight-range').value;
        const bold = document.getElementById('toggle-bold').checked;
        const italic = document.getElementById('toggle-italic').checked;
        
        const css = `font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;
font-size: ${size}px;
font-weight: ${bold ? '700' : weight};
font-style: ${italic ? 'italic' : 'normal'};`;
        
        const copyText = `Text: ${text}\n\nCSS:\n${css}`;
        
        navigator.clipboard.writeText(copyText).then(() => {
            // Show success message
            const copyBtn = document.querySelector('[onclick="copyToClipboard()"]');
            const originalText = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            copyBtn.classList.add('text-green-600');
            
            setTimeout(() => {
                copyBtn.innerHTML = originalText;
                copyBtn.classList.remove('text-green-600');
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = copyText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        });
    }
    
    // Event listeners
    document.getElementById('tester-input').addEventListener('input', updateTester);
    document.getElementById('size-range').addEventListener('input', updateTester);
    document.getElementById('weight-range').addEventListener('input', updateTester);
    document.getElementById('toggle-bold').addEventListener('change', updateTester);
    document.getElementById('toggle-italic').addEventListener('change', updateTester);

    document.querySelectorAll('.align-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active state from all buttons
            document.querySelectorAll('.align-btn').forEach(b => {
                b.classList.remove('bg-blue-100', 'text-blue-700');
                b.classList.add('hover:bg-gray-100');
            });
            
            // Add active state to clicked button
            btn.classList.add('bg-blue-100', 'text-blue-700');
            btn.classList.remove('hover:bg-gray-100');
            
            document.getElementById('tester-output').style.textAlign = btn.dataset.align;
        });
    });
    
    // Initialize the tester
    document.addEventListener('DOMContentLoaded', function() {
        updateTester();
    });
</script>
@endpush
