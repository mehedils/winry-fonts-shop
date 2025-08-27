@extends('layouts.app')

@section('title', 'পাসওয়ার্ড রিসেট - ফন্টবাজার')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <i class="fas fa-unlock-alt text-blue-600 text-4xl"></i>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900 bengali-text">পাসওয়ার্ড রিসেট</h2>
                <p class="mt-2 text-sm text-gray-600 bengali-text">আপনার ইমেইল দিন, আমরা রিসেট লিঙ্ক পাঠাব</p>
            </div>

            <form class="mt-8 space-y-6" action="#" method="POST" onsubmit="event.preventDefault(); alert('Stub: Reset link sent');">
                <div>
                    <label for="email" class="sr-only">ইমেইল</label>
                    <input id="email" name="email" type="email" required 
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="ইমেইল">
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        রিসেট লিঙ্ক পাঠান
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
