@extends('layouts.app')

@section('title', 'যোগাযোগ - ফন্টবাজার')

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 bengali-text">যোগাযোগ করুন</h1>
            <p class="text-gray-700 bengali-text mb-4">প্রশ্ন বা মতামত থাকলে আমাদের লিখুন।</p>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Stub: Message sent');" class="space-y-4">
                <input type="text" placeholder="নাম" class="w-full border rounded px-3 py-2">
                <input type="email" placeholder="ইমেইল" class="w-full border rounded px-3 py-2">
                <textarea placeholder="বার্তা" class="w-full border rounded px-3 py-2" rows="5"></textarea>
                <button class="btn-primary text-white px-4 py-2 rounded">পাঠান</button>
            </form>
        </div>
    </section>
@endsection
