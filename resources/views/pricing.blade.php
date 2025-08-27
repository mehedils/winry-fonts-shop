@extends('layouts.app')

@section('title', 'মূল্য নির্ধারণ - ফন্টবাজার')

@section('content')
    <!-- Pricing Section -->
    <section id="pricing" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 bengali-text">মূল্য নির্ধারণ</h1>
                <p class="text-xl text-gray-600 bengali-text">আপনার প্রয়োজন অনুযায়ী সঠিক প্ল্যান বেছে নিন</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Free Plan -->
                <div class="border border-gray-200 rounded-lg p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4 bengali-text">ফ্রি</h3>
                    <p class="text-4xl font-bold text-blue-600 mb-4">০৳</p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ৫০+ ফ্রি ফন্ট</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ব্যক্তিগত ব্যবহার</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> বেসিক সাপোর্ট</li>
                        <li class="flex items-center"><i class="fas fa-times text-red-500 mr-2"></i> বাণিজ্যিক লাইসেন্স</li>
                        <li class="flex items-center"><i class="fas fa-times text-red-500 mr-2"></i> প্রিমিয়াম ফন্ট</li>
                    </ul>
                    <a href="{{ route('register') }}" class="w-full border border-blue-600 text-blue-600 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition block">
                        বিনামূল্যে শুরু করুন
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="border-2 border-blue-600 rounded-lg p-8 text-center bg-blue-50 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <div class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">জনপ্রিয়</div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 bengali-text">প্রো</h3>
                    <p class="text-4xl font-bold text-blue-600 mb-4">৳১,৫০০<span class="text-lg text-gray-600">/মাস</span></p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ৫০০+ প্রিমিয়াম ফন্ট</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> বাণিজ্যিক লাইসেন্স</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ২৪/৭ সাপোর্ট</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> অগ্রাধিকার ডাউনলোড</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ফন্ট আপডেট</li>
                    </ul>
                    <a href="{{ route('checkout.pro', ['plan' => 'pro']) }}" class="w-full btn-primary text-white py-2 rounded-lg block">
                        প্রো প্ল্যান কিনুন
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="border border-gray-200 rounded-lg p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4 bengali-text">এন্টারপ্রাইজ</h3>
                    <p class="text-4xl font-bold text-blue-600 mb-4">যোগাযোগ করুন</p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> সব ফন্ট অ্যাক্সেস</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> কাস্টম ফন্ট ডিজাইন</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> ডেডিকেটেড সাপোর্ট</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> API অ্যাক্সেস</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> কাস্টম লাইসেন্স</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="w-full border border-blue-600 text-blue-600 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition block">
                        যোগাযোগ করুন
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 bengali-text">সাধারণ প্রশ্ন</h2>
            <div class="max-w-3xl mx-auto space-y-6">
                @foreach($faqs as $faq)
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(this)">
                            <h3 class="text-lg font-semibold bengali-text">{{ $faq->question }}</h3>
                            <i class="fas fa-chevron-down text-gray-500 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 bengali-text hidden">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Payment Methods -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center mb-8 bengali-text">পেমেন্ট পদ্ধতি</h3>
            <div class="flex justify-center items-center space-x-8">
                @foreach($paymentMethods as $method)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <img src="{{ $method->logo }}" alt="{{ $method->name }}" class="h-10">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        
        content.classList.toggle('hidden');
        icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }
</script>
@endpush
