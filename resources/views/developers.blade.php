@extends('layouts.app')

@section('title', 'ডেভেলপার এবং ডিজাইনার - ' . siteTitle())

@section('content')
    <div class="bg-gray-50 py-8">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800 bengali-text">ডেভেলপার এবং ডিজাইনার</h1>
            
            <!-- Filter Tabs -->
            <div class="flex justify-center space-x-4 mb-8">
                <button class="filter-tab active px-6 py-3 rounded-lg font-medium transition-colors" data-filter="all">
                    সব
                </button>
                <button class="filter-tab px-6 py-3 rounded-lg font-medium transition-colors" data-filter="designer">
                    ডিজাইনার
                </button>
                <button class="filter-tab px-6 py-3 rounded-lg font-medium transition-colors" data-filter="developer">
                    ডেভেলপার
                </button>
            </div>
            
            <!-- Contributors Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($contributors as $contributor)
                    <div class="contributor-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" 
                         data-type="{{ $contributor->is_designer ? 'designer' : 'developer' }}">
                        
                        <!-- Profile Image Section -->
                        <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8 text-center">
                            <div class="flex justify-center mb-4">
                                @if($contributor->photo_path)
                                    <img src="{{ asset('storage/' . $contributor->photo_path) }}" 
                                         alt="{{ $contributor->name }}" 
                                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-white bg-opacity-20 border-4 border-white shadow-lg flex items-center justify-center">
                                        <i class="fas fa-user text-3xl text-white"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Name and Roles -->
                            <h3 class="text-xl font-bold text-white mb-2">{{ $contributor->name }}</h3>
                            <div class="flex justify-center space-x-2">
                                @if($contributor->is_designer)
                                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-palette mr-1"></i>ডিজাইনার
                                    </span>
                                @endif
                                @if($contributor->is_developer)
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-code mr-1"></i>ডেভেলপার
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6">
                            <!-- Stats -->
                            <div class="text-center mb-6">
                                <div class="text-3xl font-bold text-blue-600 mb-1">{{ $contributor->fonts_count }}</div>
                                <div class="text-gray-600 bengali-text">মোট ফন্ট</div>
                            </div>
                            
                            <!-- Social Links -->
                            @if($contributor->website || $contributor->facebook || $contributor->instagram || $contributor->twitter || $contributor->behance || $contributor->whatsapp)
                                <div class="flex justify-center space-x-4 mb-6">
                                    @if($contributor->website)
                                        <a href="{{ $contributor->website }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                            <i class="fas fa-globe"></i>
                                        </a>
                                    @endif
                                    @if($contributor->facebook)
                                        <a href="{{ $contributor->facebook }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if($contributor->instagram)
                                        <a href="{{ $contributor->instagram }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-pink-100 hover:text-pink-600 transition-colors">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if($contributor->twitter)
                                        <a href="{{ $contributor->twitter }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-100 hover:text-blue-400 transition-colors">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if($contributor->behance)
                                        <a href="{{ $contributor->behance }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    @endif
                                    @if($contributor->whatsapp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contributor->whatsapp) }}" target="_blank" 
                                           class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-green-100 hover:text-green-600 transition-colors">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                </div>
                            @endif
                            

                            
                            <!-- View Profile Button -->
                            <div class="mt-6">
                                <a href="{{ route('font-artist.show', $contributor->id) }}" 
                                   class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors bengali-text font-medium text-center block">
                                    প্রোফাইল দেখুন
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($contributors->count() === 0)
                <div class="text-center py-12">
                    <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2 bengali-text">কোন ডেভেলপার বা ডিজাইনার পাওয়া যায়নি</h3>
                    <p class="text-gray-500 bengali-text">শীঘ্রই নতুন ডেভেলপার এবং ডিজাইনার যোগ হবে</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    .filter-tab {
        background-color: #f3f4f6;
        color: #6b7280;
    }
    .filter-tab.active {
        background-color: #3b82f6;
        color: white;
    }
    .filter-tab:hover:not(.active) {
        background-color: #e5e7eb;
        color: #374151;
    }
    .contributor-card {
        transition: all 0.3s ease;
    }
    .contributor-card:hover {
        transform: translateY(-4px);
    }
</style>
@endpush

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active tab
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            const cards = document.querySelectorAll('.contributor-card');
            
            cards.forEach(card => {
                if (filter === 'all' || card.dataset.type === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
