@extends('layouts.app')

@section('title', 'আমার অর্ডার - ফন্টবাজার')

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-5xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 bengali-text">আমার অর্ডার</h1>
            @if($orders->count() === 0)
                <div class="text-gray-600 bengali-text">কোন অর্ডার পাওয়া যায়নি।</div>
            @else
                <div class="grid grid-cols-1 gap-4">
                    @foreach($orders as $order)
                        <div class="border rounded p-4">
                            <div class="font-semibold">অর্ডার #{{ $order->id }}</div>
                            <div class="text-sm text-gray-600">{{ $order->created_at }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
