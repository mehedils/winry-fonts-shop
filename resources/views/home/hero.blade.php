@if($sliders->count() > 0)
    <div class="swiper hero-swiper" style="height: 50vh; width: 90% !important; margin: 0 auto;">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide relative overflow-hidden rounded-2xl" style="height: 50vh;">
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
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 2;"></div>
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
        <div class="swiper-pagination"></div>
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


