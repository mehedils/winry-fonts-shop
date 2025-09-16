<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 বেঙ্গালি-text">আমাদের সেবাসমূহ</h2>
            <p class="text-gray-600 বেঙ্গালি-text">আপনার ব্র্যান্ডের জন্য ফন্ট এবং ডিজাইন সেবা</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @forelse($services as $service)
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 border border-gray-200">
                    <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="{{ $service->icon_class }} text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 বেঙ্গালি-text">{{ $service->title }}</h3>
                    <p class="text-gray-600 বেঙ্গালি-text">{{ $service->description }}</p>
                    @if($service->button_text && $service->button_url)
                        <div class="mt-4">
                            <a href="{{ $service->button_url }}" target="_blank" rel="noopener" class="inline-flex items-center px-4 py-2 rounded-lg text-white btn-primary">
                                {{ $service->button_text }}
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 বেঙ্গালি-text">কোন সেবা যোগ করা হয়নি</div>
            @endforelse
        </div>
    </div>
</section>


