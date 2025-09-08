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
    margin-top: 20px !important;
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
    @include('home.hero')

    @include('home.social')

    <section id="fonts" class="py-16 bg-gray-50 max-w-7xl mx-auto">
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

    @include('home.services')
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
