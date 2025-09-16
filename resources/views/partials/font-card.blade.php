<a href="{{ route('fonts.show', $font->id) }}" class="font-card bg-white rounded-lg p-4 sm:p-6 block hover:shadow-lg transition-all duration-300" data-type="{{ $font->type }}">
    <!-- Font Preview Area - Consistent Height -->
    <div class="bg-gray-100 rounded-lg mb-3 sm:mb-4 text-center hover:bg-gray-200 transition overflow-hidden h-24 sm:h-32 md:h-36 flex items-center justify-center">
        @if($font->type === 'premium' && !empty($font->preview_image_path))
            <!-- Premium Font Preview Image -->
            <img src="{{ asset('storage/' . $font->preview_image_path) }}" 
                 alt="{{ $font->display_name }} Preview" 
                 class="w-full h-full object-cover rounded-lg">
        @else
            <!-- Free Font Text Preview -->
            <p class="text-2xl sm:text-2xl md:text-4xl text-gray-800 bengali-text leading-tight px-2" style="font-family: '{{ $font->family_css ?? ('Font'.$font->id) }}', 'Hind Siliguri', sans-serif;">
                {{ $font->preview_text ?? 'আমার সোনার বাংলা' }}
            </p>
        @endif
    </div>
    
    <h3 class="font-bold text-base sm:text-lg mb-2 text-gray-800 truncate">{{ $font->display_name }}</h3>
    <div class="flex justify-between items-center gap-2">
        @if($font->type === 'free')
            <span class="text-base sm:text-lg font-bold text-green-600">ফ্রি</span>
            <span class="bg-green-500 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm whitespace-nowrap">
                ডাউনলোড
            </span>
        @else
            <span class="text-lg sm:text-xl md:text-2xl font-bold text-blue-600">৳{{ number_format($font->price) }}</span>
            <span class="btn-primary text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm whitespace-nowrap">
                কিনুন
            </span>
        @endif
    </div>
    
    <div class="mt-3 sm:mt-4 text-xs sm:text-sm text-gray-500">
        <span>{{ $font->downloads_count ?? 0 }} ডাউনলোড</span>
    </div>
</a>
