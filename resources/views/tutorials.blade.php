@extends('layouts.app')

@section('title', 'টিউটোরিয়াল - ' . siteTitle())

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 bengali-text">টিউটোরিয়াল</h1>
            <ul class="list-disc pl-6 text-gray-700 space-y-2 bengali-text">
                <li>ফন্ট ডাউনলোড ও ইনস্টল</li>
                <li>লাইসেন্সিং বোঝা</li>
                <li>ডিজাইনে বাংলা ফন্টের ব্যবহার</li>
            </ul>
        </div>
    </section>
@endsection
