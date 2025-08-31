<!-- Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 hover:opacity-80 transition">
                @if(\App\Helpers\SettingsHelper::siteLogo())
                    <img src="{{ \App\Helpers\SettingsHelper::siteLogo() }}" alt="{{ \App\Helpers\SettingsHelper::siteTitle() }}" class="h-12 w-auto">
                @else
                    <i class="fas fa-font text-blue-600 text-2xl"></i>
                    <span class="text-2xl font-bold text-blue-600">{{ \App\Helpers\SettingsHelper::siteTitle() }}</span>
                @endif
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('fonts.index') }}" class="text-gray-700 hover:text-blue-600 transition">ফন্টসমূহ</a>
                <a href="{{ route('developers') }}" class="text-gray-700 hover:text-blue-600 transition">ডেভেলপার</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">আমাদের সম্পর্কে</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition">যোগাযোগ</a>
            </div>
            
            <!-- Search Bar and Mobile Menu Toggle -->
            <div class="flex items-center space-x-4">
                <!-- Desktop Search Bar -->
                <form action="{{ route('fonts.index') }}" method="GET" class="hidden md:flex">
                    <input type="text" name="q" placeholder="ফন্ট খুঁজুন..." 
                           class="w-64 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                
                <!-- Mobile Menu Toggle -->
                <button class="md:hidden text-gray-700 hover:text-blue-600 transition" id="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden mt-4 hidden" id="mobile-menu">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">হোম</a>
                <a href="{{ route('fonts.index') }}" class="text-gray-700 hover:text-blue-600 transition">ফন্টসমূহ</a>
                <a href="{{ route('developers') }}" class="text-gray-700 hover:text-blue-600 transition">ডেভেলপার</a>
                <a href="{{ route('pricing') }}" class="text-gray-700 hover:text-blue-600 transition">মূল্য নির্ধারণ</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">আমাদের সম্পর্কে</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition">যোগাযোগ</a>
                
                <!-- Mobile Search Bar -->
                <form action="{{ route('fonts.index') }}" method="GET" class="flex mt-4">
                    <input type="text" name="q" placeholder="ফন্ট খুঁজুন..." 
                           class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

