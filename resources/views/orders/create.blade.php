@extends('layouts.app')

@section('title', 'অর্ডার করুন - ' . $font->name)

@push('styles')
@if($font->font_file_path)
<style>
@font-face {
    font-family: 'OrderFont{{ $font->id }}';
    src: url('{{ asset('storage/' . $font->font_file_path) }}') format('truetype');
    font-weight: normal;
    font-style: normal;
}
</style>
@endif
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            
            <!-- Font Information -->
            <div class="border-b pb-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4 bengali-text">অর্ডার করুন</h1>
                <div class="flex items-start space-x-4">
                    <!-- Font Preview -->
                    @if($font->font_file_path)
                    <div class="bg-gray-100 rounded-lg p-6 text-center min-w-[200px]">
                        <p class="text-2xl text-gray-800 bengali-text" style="font-family: 'OrderFont{{ $font->id }}', 'Hind Siliguri', sans-serif;">
                            আমার বাংলা
                        </p>
                    </div>
                    @endif
                    
                    <!-- Font Details -->
                    <div class="bg-gray-100 rounded-lg p-4 flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $font->name }}</h3>
                        <p class="text-gray-600 mb-2 bengali-text">{{ $font->description }}</p>
                        <div class="text-2xl font-bold text-blue-600">৳{{ number_format($font->price) }}</div>
                    </div>
                </div>
            </div>

            <!-- Payment Instructions -->
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3 bengali-text">পেমেন্ট নির্দেশনা</h3>
                <div class="space-y-3 text-sm text-blue-700 bengali-text">
                    <p><strong>১.</strong> নিচের যেকোনো মোবাইল ব্যাংকিং এ পেমেন্ট করুন:</p>
                    @if($paymentMethods->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-{{ min($paymentMethods->count(), 4) }} gap-4 my-3">
                            @foreach($paymentMethods as $method)
                                <div class="{{ $method->color_class }} p-3 rounded text-center">
                                    @if($method->icon_class)
                                        <i class="{{ $method->icon_class }} text-lg mb-1"></i><br>
                                    @endif
                                    <strong>{{ $method->display_name }}</strong><br>
                                    <span class="text-sm font-mono">{{ $method->account_number }}</span>
                                    @if($method->account_type === 'merchant')
                                        <br><small class="text-xs">(Merchant)</small>
                                    @endif
                                    @if($method->instructions)
                                        <br><small class="text-xs bengali-text">{{ $method->instructions }}</small>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-red-100 text-red-700 p-4 rounded">
                            <p class="bengali-text">কোনো পেমেন্ট মাধ্যম সক্রিয় নেই। অনুগ্রহ করে পরে আবার চেষ্টা করুন।</p>
                        </div>
                    @endif
                    <p><strong>২.</strong> পেমেন্ট সম্পন্ন হওয়ার পর Transaction ID এবং আপনার তথ্য দিয়ে নিচের ফর্ম পূরণ করুন।</p>
                    <p><strong>৩.</strong> পেমেন্টের স্ক্রিনশট আপলোড করুন (ঐচ্ছিক কিন্তু সুপারিশকৃত)।</p>
                    <p><strong>৪.</strong> আমরা ২৪ ঘন্টার মধ্যে যাচাই করে আপনার ইমেইলে ফন্ট পাঠিয়ে দেব।</p>
                </div>
            </div>

            <!-- Order Form -->
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="font_id" value="{{ $font->id }}">

                <!-- Customer Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">নাম *</label>
                        <input type="text" name="customer_name" id="customer_name" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('customer_name') }}" placeholder="আপনার পুরো নাম">
                        @error('customer_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">মোবাইল নম্বর *</label>
                        <input type="tel" name="customer_phone" id="customer_phone" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('customer_phone') }}" placeholder="01XXXXXXXXX">
                        @error('customer_phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">ইমেইল *</label>
                        <input type="email" name="customer_email" id="customer_email" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('customer_email') }}" placeholder="example@email.com">
                        @error('customer_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">পেমেন্ট মাধ্যম *</label>
                        <select name="payment_method" id="payment_method" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">নির্বাচন করুন</option>
                            @foreach($paymentMethods as $method)
                                <option value="{{ $method->name }}" {{ old('payment_method') == $method->name ? 'selected' : '' }}>
                                    {{ $method->display_name }}
                                    @if($method->account_type === 'merchant') (Merchant) @endif
                                </option>
                            @endforeach
                            <option value="other" {{ old('payment_method') == 'other' ? 'selected' : '' }}>অন্যান্য</option>
                        </select>
                        @error('payment_method')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="transaction_id" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">Transaction ID *</label>
                        <input type="text" name="transaction_id" id="transaction_id" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('transaction_id') }}" placeholder="ABC123456789">
                        @error('transaction_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Screenshot Upload -->
                <div>
                    <label for="payment_screenshot" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">পেমেন্ট স্ক্রিনশট (ঐচ্ছিক)</label>
                    <input type="file" name="payment_screenshot" id="payment_screenshot" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1 bengali-text">JPG, PNG ফরম্যাট, সর্বোচ্চ ৫MB</p>
                    @error('payment_screenshot')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Note -->
                <div>
                    <label for="note" class="block text-sm font-medium text-gray-700 mb-2 bengali-text">অতিরিক্ত মন্তব্য (ঐচ্ছিক)</label>
                    <textarea name="note" id="note" rows="3"
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="কোনো বিশেষ নির্দেশনা বা মন্তব্য">{{ old('note') }}</textarea>
                    @error('note')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold text-lg hover:bg-blue-700 transition bengali-text">
                        অর্ডার জমা দিন
                    </button>
                    <a href="{{ route('fonts.show', $font) }}" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-400 transition bengali-text">
                        বাতিল
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
