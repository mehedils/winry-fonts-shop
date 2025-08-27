<div class="font-card bg-white rounded-lg p-6" data-type="{{ $font->type }}">
    <div class="bg-gray-100 rounded-lg p-8 mb-4 text-center">
        <p class="text-3xl text-gray-800 bengali-text" style="font-family: '{{ $font->name }}', sans-serif;">
            {{ $font->preview_text ?? 'আমার বাংলা' }}
        </p>
    </div>
    
    <h3 class="font-bold text-lg mb-2">{{ $font->display_name }}</h3>
    <p class="text-gray-600 mb-3 bengali-text">{{ $font->description }}</p>
    
    <div class="flex justify-between items-center">
        @if($font->type === 'free')
            <span class="text-lg font-bold text-green-600">ফ্রি</span>
            <form action="{{ route('fonts.download', $font->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-600 transition">
                    ডাউনলোড
                </button>
            </form>
        @else
            <span class="text-2xl font-bold text-blue-600">৳{{ number_format($font->price) }}</span>
            <form action="{{ route('cart.add') }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="font_id" value="{{ $font->id }}">
                <button type="submit" class="btn-primary text-white px-4 py-2 rounded-lg text-sm">
                    কিনুন
                </button>
            </form>
        @endif
    </div>
    
    <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
        <span>{{ $font->downloads_count ?? 0 }} ডাউনলোড</span>
        <div class="flex items-center">
            @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star {{ $i <= ($font->rating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
            @endfor
        </div>
    </div>
</div>
