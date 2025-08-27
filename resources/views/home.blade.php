@extends('layouts.app')

@section('title', 'হোম - ফন্টবাজার')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-section text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 bengali-text">
                বাংলার সেরা ফন্ট মার্কেটপ্লেস
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 bengali-text">
                ১০০০+ প্রিমিয়াম বাংলা ফন্ট এবং ফ্রি ফন্ট সংগ্রহ
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="#" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-100 transition">
                    বিনামূল্যে ফন্ট এক্সপ্লোর করুন
                </a>
                <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition">
                    প্রিমিয়াম ফন্ট কিনুন
                </a>
            </div>
        </div>
    </section>

    <!-- Font Categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 bengali-text">ফন্ট ক্যাটেগরি</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($categories as $category)
                    <a href="{{ route('fonts.category', $category->slug) }}" class="text-center p-6 bg-blue-50 rounded-lg hover:bg-blue-100 transition cursor-pointer">
                        <i class="{{ $category->icon }} text-3xl text-blue-600 mb-3"></i>
                        <h3 class="font-semibold bengali-text">{{ $category->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Fonts -->
    <section id="fonts" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 bengali-text">বৈশিষ্ট্যপূর্ণ ফন্ট</h2>
                <select class="border border-gray-300 rounded-lg px-4 py-2 bengali-text" id="font-filter">
                    <option value="">সব ফন্ট</option>
                    <option value="free">ফ্রি ফন্ট</option>
                    <option value="premium">প্রিমিয়াম ফন্ট</option>
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" id="fonts-grid">
                @foreach($featuredFonts as $font)
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

    <!-- Payment Methods -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center mb-8 bengali-text">পেমেন্ট পদ্ধতি</h3>
            <div class="flex justify-center items-center space-x-8">
                @foreach($paymentMethods as $method)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <img src="{{ $method->logo }}" alt="{{ $method->name }}" class="h-10">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
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
