@extends('layouts.app')

@section('title', 'হোম - ' . siteTitle())

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@if(isset($featuredFonts))
<style>
@foreach($featuredFonts as $f)
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

<style>
/* Hero Swiper Styles */
.hero-swiper {
    width: 100% !important;
    height: 50vh !important;
    min-height: 400px !important;
    position: relative !important;
}

.hero-swiper .swiper-slide {
    width: 100% !important;
    height: 50vh !important;
    min-height: 400px !important;
    position: relative !important;
}

.hero-slide {
    width: 100% !important;
    height: 50vh !important;
    min-height: 400px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    position: relative !important;
}

/* Swiper Navigation */
.hero-swiper .swiper-button-next,
.hero-swiper .swiper-button-prev {
    color: white;
    background: rgba(0, 0, 0, 0.3);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.hero-swiper .swiper-button-next:hover,
.hero-swiper .swiper-button-prev:hover {
    background: rgba(0, 0, 0, 0.6);
    transform: scale(1.1);
}

.hero-swiper .swiper-button-next:after,
.hero-swiper .swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
}

/* Swiper Pagination */
.hero-swiper .swiper-pagination-bullet {
    background: white;
    opacity: 0.6;
    width: 12px;
    height: 12px;
    margin: 0 6px;
    transition: all 0.3s ease;
}

.hero-swiper .swiper-pagination-bullet-active {
    opacity: 1;
    transform: scale(1.2);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .hero-swiper {
        height: 50vh !important;
        min-height: 350px !important;
    }
    
    .hero-swiper .swiper-slide {
        height: 50vh !important;
        min-height: 350px !important;
    }
    
    .hero-slide {
        height: 50vh !important;
        min-height: 350px !important;
    }
    
    .hero-swiper .swiper-button-next,
    .hero-swiper .swiper-button-prev {
        width: 40px;
        height: 40px;
    }
    
    .hero-swiper .swiper-button-next:after,
    .hero-swiper .swiper-button-prev:after {
        font-size: 14px;
    }
}
</style>
@endpush

@section('content')
    <!-- Hero Slider Section -->
    @if($sliders->count() > 0)
        <!-- Debug: {{ $sliders->count() }} sliders found -->
        <!-- Hero Swiper Section -->
        <div class="swiper hero-swiper" style="height: 50vh;">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide" style="height: 50vh;">
                        <div style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-image: url('{{ $slider->image_url }}');
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                            z-index: 1;
                        ">
                            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); z-index: 2;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; z-index: 3; width: 90%; max-width: 1200px;">
                                @if($slider->title)
                                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 bengali-text" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                        {{ $slider->title }}
                                    </h1>
                                @endif
                                @if($slider->description)
                                    <p class="text-lg md:text-xl lg:text-2xl mb-8 opacity-90 bengali-text" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">
                                        {{ $slider->description }}
                                    </p>
                                @endif
                                @if($slider->button_text && $slider->button_link)
                                    <div class="flex flex-col md:flex-row gap-4 justify-center">
                                        <a href="{{ $slider->button_link }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-100 transition bengali-text" style="box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                            {{ $slider->button_text }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Navigation arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    @else
        <!-- Debug: No sliders found, showing fallback -->
        <!-- Fallback Hero Section -->
        <section id="home" class="hero-section text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 bengali-text">
                    বাংলার সেরা ফন্ট মার্কেটপ্লেস
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 bengali-text">
                    ১০০০+ প্রিমিয়াম বাংলা ফন্ট এবং ফ্রি ফন্ট সংগ্রহ
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <a href="{{ route('fonts.index') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-100 transition">
                        বিনামূল্যে ফন্ট এক্সপ্লোর করুন
                    </a>
                    <a href="{{ route('fonts.index') }}?category=premium" class="border-2 border-white text-white px-8 py-3 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition">
                        প্রিমিয়াম ফন্ট কিনুন
                    </a>
                </div>
            </div>
        </section>
    @endif



    <!-- Featured Fonts -->
    <section id="fonts" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 bengali-text">আমাদের ফন্ট</h2>
                <select class="border border-gray-300 rounded-lg px-4 py-2 bengali-text" id="font-filter">
                    <option value="">সব ফন্ট</option>
                    <option value="free">ফ্রি ফন্ট</option>
                    <option value="premium">প্রিমিয়াম ফন্ট</option>
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" id="fonts-grid">
                @foreach($featuredFonts as $font)
                    @php($font->family_css = !empty($font->font_file_path) ? 'Font'.$font->id : null)
                    @include('partials.font-card', ['font' => $font])
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('fonts.index') }}" class="btn-primary text-white px-8 py-3 rounded-lg font-medium">
                    সব ফন্ট দেখুন
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing Swiper...');
        
        // Check if swiper element exists
        const swiperElement = document.querySelector('.hero-swiper');
        if (!swiperElement) {
            console.error('Swiper element not found!');
            return;
        }
        
        console.log('Swiper element found:', swiperElement);
        
        const heroSwiper = new Swiper('.hero-swiper', {
            // Basic configuration first
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            
            // Auto play
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            
            // Navigation
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            
            // Pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            
            // Effects
            speed: 1000,
            
            // Callbacks
            on: {
                init: function () {
                    console.log('Swiper initialized successfully with', this.slides.length, 'slides');
                },
                slideChange: function () {
                    console.log('Slide changed to:', this.activeIndex);
                }
            }
        });
        
        // Manual check
        setTimeout(() => {
            console.log('Swiper slides found:', document.querySelectorAll('.swiper-slide').length);
            console.log('Background images:', 
                Array.from(document.querySelectorAll('.hero-slide')).map(el => 
                    el.style.backgroundImage
                )
            );
        }, 1000);
    });

    // Font filter functionality
    document.getElementById('font-filter').addEventListener('change', function() {
        const filter = this.value;
        const fontCards = document.querySelectorAll('.font-card');
        
        fontCards.forEach(card => {
            const isFree = card.dataset.type === 'free';
            const isPremium = card.dataset.type === 'premium';
            
            if (filter === '' || 
                (filter === 'free' && isFree) || 
                (filter === 'premium' && isPremium)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
@endpush
