@extends('layouts.app')

@section('title', 'হোম - ফন্টবাজার')

@push('styles')
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
@endpush

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
