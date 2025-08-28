@extends('layouts.app')

@section('title', 'অর্ডার সফল - ' . \App\Helpers\SettingsHelper::siteTitle())

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            
            <!-- Success Icon -->
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Success Message -->
            <h1 class="text-2xl font-bold text-gray-800 mb-4 bengali-text">অর্ডার সফলভাবে জমা দেওয়া হয়েছে!</h1>
            <p class="text-gray-600 mb-6 bengali-text">
                আপনার অর্ডার আমাদের কাছে পৌঁছেছে। আমরা শীঘ্রই পেমেন্ট যাচাই করে আপনাকে জানাবো।
            </p>

            <!-- Order Details -->
            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 bengali-text">অর্ডার বিবরণ</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">অর্ডার নম্বর:</span>
                        <span class="font-semibold">#{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">ফন্ট:</span>
                        <span class="font-semibold">{{ $order->font->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">মূল্য:</span>
                        <span class="font-semibold">৳{{ number_format($order->amount) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">পেমেন্ট মাধ্যম:</span>
                        <span class="font-semibold">{{ ucfirst($order->payment_method) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">Transaction ID:</span>
                        <span class="font-semibold">{{ $order->transaction_id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 bengali-text">স্ট্যাটাস:</span>
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status === 'approved') bg-green-100 text-green-800
                            @elseif($order->status === 'rejected') bg-red-100 text-red-800
                            @elseif($order->status === 'completed') bg-blue-100 text-blue-800
                            @else bg-gray-100 text-gray-800
                            @endif bengali-text">
                            @if($order->status === 'pending') পেন্ডিং
                            @elseif($order->status === 'approved') অনুমোদিত
                            @elseif($order->status === 'rejected') প্রত্যাখ্যাত
                            @elseif($order->status === 'completed') সম্পন্ন
                            @else {{ $order->status }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <h4 class="font-semibold text-blue-800 mb-2 bengali-text">পরবর্তী ধাপ:</h4>
                <ul class="text-sm text-blue-700 text-left space-y-1 bengali-text">
                    <li>• আমরা ২৤ ঘন্টার মধ্যে আপনার পেমেন্ট যাচাই করব</li>
                    <li>• যাচাই সম্পন্ন হলে আমরা আপনার ইমেইলে ফন্ট পাঠিয়ে দেব</li>
                    <li>• কোনো সমস্যা হলে আমাদের সাথে যোগাযোগ করুন</li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('fonts.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition bengali-text">
                    আরও ফন্ট দেখুন
                </a>
                <a href="{{ route('home') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-bold hover:bg-gray-400 transition bengali-text">
                    হোমে ফিরুন
                </a>
            </div>

            <!-- Contact Info -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-600 bengali-text">
                    যেকোনো সহায়তার জন্য যোগাযোগ করুন: 
                    <a href="mailto:{{ \App\Helpers\SettingsHelper::contactEmail() }}" class="text-blue-600 hover:underline">
                        {{ \App\Helpers\SettingsHelper::contactEmail() }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
