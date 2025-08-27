@extends('layouts.app')

@section('title', 'সব ফন্ট - ফন্টবাজার')

@section('content')
    <div class="bg-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 bengali-text">সব ফন্ট</h1>
            
            <!-- Filters -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <form action="{{ route('fonts.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 bengali-text">ফন্ট টাইপ</label>
                        <select name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">সব</option>
                            <option value="free" {{ request('type') === 'free' ? 'selected' : '' }}>ফ্রি</option>
                            <option value="premium" {{ request('type') === 'premium' ? 'selected' : '' }}>প্রিমিয়াম</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 bengali-text">ক্যাটেগরি</label>
                        <select name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">সব ক্যাটেগরি</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 bengali-text">সাজান</label>
                        <select name="sort" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>নতুনতম</option>
                            <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>জনপ্রিয়</option>
                            <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>কম দাম</option>
                            <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>বেশি দাম</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="w-full btn-primary text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-search mr-2"></i>খুঁজুন
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Results Count -->
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600 bengali-text">
                    {{ $fonts->total() }}টি ফন্ট পাওয়া গেছে
                </p>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 bengali-text">প্রতি পৃষ্ঠায়:</span>
                    <select id="per-page" class="border border-gray-300 rounded px-2 py-1 text-sm">
                        <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>১২</option>
                        <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>২৪</option>
                        <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>৪৮</option>
                    </select>
                </div>
            </div>
            
            <!-- Fonts Grid -->
            @if($fonts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($fonts as $font)
                        @include('partials.font-card', ['font' => $font])
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $fonts->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2 bengali-text">কোন ফন্ট পাওয়া যায়নি</h3>
                    <p class="text-gray-500 bengali-text">আপনার অনুসন্ধানের সাথে মিলে এমন কোন ফন্ট নেই</p>
                    <a href="{{ route('fonts.index') }}" class="btn-primary text-white px-6 py-2 rounded-lg mt-4 inline-block">
                        সব ফন্ট দেখুন
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Per page selector
    document.getElementById('per-page').addEventListener('change', function() {
        const url = new URL(window.location);
        url.searchParams.set('per_page', this.value);
        window.location = url;
    });
</script>
@endpush
