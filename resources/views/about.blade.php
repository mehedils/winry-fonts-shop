@extends('layouts.app')

@section('title', 'আমাদের সম্পর্কে - ফন্টবাজার')

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-4xl font-bold text-gray-800 mb-6 bengali-text">আমাদের সম্পর্কে</h1>
            <p class="text-gray-700 leading-7 bengali-text mb-4">
                ফন্টবাজার বাংলাদেশের প্রথম এবং সবচেয়ে বড় বাংলা ফন্ট মার্কেটপ্লেস। আমরা ডিজাইনার ও ডেভেলপারদের জন্য
                উচ্চমানের বাংলা ফন্ট সরবরাহ করি, যাতে বাংলা কনটেন্ট আরও সুন্দর ও পেশাদারভাবে উপস্থাপন করা যায়।
            </p>
            <p class="text-gray-700 leading-7 bengali-text mb-4">
                আমাদের প্ল্যাটফর্মে রয়েছে ফ্রি এবং প্রিমিয়াম উভয় ধরনের ফন্ট, সাথে আছে বাণিজ্যিক লাইসেন্সিং, দ্রুত সাপোর্ট,
                এবং নিয়মিত আপডেট। আমরা বাংলা টাইপোগ্রাফিকে এগিয়ে নিতে কাজ করে যাচ্ছি।
            </p>
            <div class="grid md:grid-cols-3 gap-6 mt-10">
                <div class="p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 bengali-text">মিশন</h3>
                    <p class="text-gray-600 bengali-text">বাংলা টাইপোগ্রাফির মানোন্নয়ন ও সহজলভ্যতা বৃদ্ধি।</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 bengali-text">ভিশন</h3>
                    <p class="text-gray-600 bengali-text">বিশ্বমানের বাংলা ফন্ট ইকোসিস্টেম তৈরি করা।</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 bengali-text">মান</h3>
                    <p class="text-gray-600 bengali-text">গুণগত মান, স্বচ্ছতা ও ব্যবহারকারীর আস্থা।</p>
                </div>
            </div>
        </div>
    </section>
@endsection
