<a href="{{ route('fonts.show', $font->id) }}" class="font-card bg-white rounded-lg p-6 block hover:shadow-lg transition-all duration-300" data-type="{{ $font->type }}">
    <div class="bg-gray-100 rounded-lg p-8 mb-4 text-center hover:bg-gray-200 transition">
        <p class="text-3xl text-gray-800 bengali-text" style="font-family: '{{ $font->family_css ?? ('Font'.$font->id) }}', 'Hind Siliguri', sans-serif;">
            {{ $font->preview_text ?? 'আমার বাংলা' }}
        </p>
    </div>
    
    <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $font->display_name }}</h3>
    @if(isset($font->category) && $font->category)
        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">{{ $font->category->name }}</span>
    @endif
    <p class="text-gray-600 mb-3 bengali-text">{{ $font->description }}</p>
    
    <div class="flex justify-between items-center">
        @if($font->type === 'free')
            <span class="text-lg font-bold text-green-600">ফ্রি</span>
            <span class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm">
                ডাউনলোড
            </span>
        @else
            <span class="text-2xl font-bold text-blue-600">৳{{ number_format($font->price) }}</span>
            <span class="btn-primary text-white px-4 py-2 rounded-lg text-sm">
                কিনুন
            </span>
        @endif
    </div>
    
    <div class="mt-4 text-sm text-gray-500">
        <span>{{ $font->downloads_count ?? 0 }} ডাউনলোড</span>
    </div>
</a>
