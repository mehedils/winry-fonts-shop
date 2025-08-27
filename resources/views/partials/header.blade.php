<!-- Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                @if(\App\Helpers\SettingsHelper::siteLogo())
                    <img src="{{ \App\Helpers\SettingsHelper::siteLogo() }}" alt="{{ \App\Helpers\SettingsHelper::siteTitle() }}" class="h-12 w-auto">
                @else
                    <i class="fas fa-font text-blue-600 text-2xl"></i>
                    <span class="text-2xl font-bold text-blue-600">{{ \App\Helpers\SettingsHelper::siteTitle() }}</span>
                @endif
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">হোম</a>
                <a href="{{ route('fonts.index') }}" class="text-gray-700 hover:text-blue-600 transition">ফন্টসমূহ</a>
                <a href="{{ route('pricing') }}" class="text-gray-700 hover:text-blue-600 transition">মূল্য নির্ধারণ</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">আমাদের সম্পর্কে</a>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="text-gray-700 hover:text-blue-600 transition" id="search-toggle">
                    <i class="fas fa-search"></i>
                </button>
                @php($cartCount = session('cart.count', 0))
                <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600 transition relative">
                    <i class="fas fa-shopping-cart"></i>
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                
                @auth
                    <div class="relative">
                        <button class="text-gray-700 hover:text-blue-600 transition" id="user-menu-toggle">
                            <i class="fas fa-user"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden" id="user-menu">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">প্রোফাইল</a>
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">আমার অর্ডার</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    লগআউট
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">লগইন</a>
                @endauth
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden mt-4 hidden" id="mobile-menu">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">হোম</a>
                <a href="{{ route('fonts.index') }}" class="text-gray-700 hover:text-blue-600 transition">ফন্টসমূহ</a>
                <a href="{{ route('pricing') }}" class="text-gray-700 hover:text-blue-600 transition">মূল্য নির্ধারণ</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">আমাদের সম্পর্কে</a>
            </div>
        </div>
    </nav>
</header>

<!-- Search Modal -->
<div id="search-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">ফন্ট খুঁজুন</h3>
                <button id="search-close" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('fonts.search') }}" method="GET">
                <div class="flex">
                    <input type="text" name="q" placeholder="ফন্টের নাম লিখুন..." 
                           class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-r-lg hover:bg-blue-700">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Mobile menu toggle
    document.getElementById('user-menu-toggle')?.addEventListener('click', function() {
        document.getElementById('user-menu').classList.toggle('hidden');
    });

    // Search modal toggle
    document.getElementById('search-toggle')?.addEventListener('click', function() {
        document.getElementById('search-modal').classList.remove('hidden');
    });

    document.getElementById('search-close')?.addEventListener('click', function() {
        document.getElementById('search-modal').classList.add('hidden');
    });

    // Close search modal when clicking outside
    document.getElementById('search-modal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
