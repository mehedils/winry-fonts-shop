@if($sliders->count() > 0)
    <div class="w-[90%] mx-auto">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide relative overflow-hidden rounded-2xl h-[50vh] min-h-[400px] max-h-[600px] w-full mx-auto">
                    <div class="absolute top-0 left-0 bg-center bg-no-repeat w-full h-full bg-cover z-[1]" style="background-image: url('{{ $slider->image_url }}');">
                        <div class="absolute top-0 left-0 right-0 bottom-0 z-[2]"></div>

                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center z-[3] w-[90%] max-w-6xl">
                            @if($slider->title)
                                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 bengali-text drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                                    {{ $slider->title }}
                                </h1>
                            @endif
                            @if($slider->description)
                                <p class="text-lg md:text-xl lg:text-2xl mb-8 opacity-90 bengali-text drop-shadow-[1px_1px_2px_rgba(0,0,0,0.8)]">
                                    {{ $slider->description }}
                                </p>
                            @endif
                            @if($slider->button_text && $slider->button_link)
                                <div class="flex flex-col md:flex-row gap-4 justify-center">
                                    <a href="{{ $slider->button_link }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-100 transition bengali-text shadow-[0_4px_6px_rgba(0,0,0,0.3)]">
                                        {{ $slider->button_text }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@else
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


