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
                <a href="{{ route('font-artist') }}" class="text-gray-700 hover:text-blue-600 transition">বর্ণ শিল্পি</a>
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
                <button class="md:hidden text-gray-700 hover:text-blue-600 transition p-2 rounded-lg hover:bg-gray-100" id="mobile-menu-toggle">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden mt-4 hidden" id="mobile-menu">
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 rounded-lg px-3 py-2">
                        <i class="fas fa-home w-5"></i>
                        <span>হোম</span>
                    </a>
                    <a href="{{ route('fonts.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 rounded-lg px-3 py-2">
                        <i class="fas fa-font w-5"></i>
                        <span>ফন্টসমূহ</span>
                    </a>
                    <a href="{{ route('font-artist') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 rounded-lg px-3 py-2">
                        <i class="fas fa-palette w-5"></i>
                        <span>বর্ণ শিল্পি</span>
                    </a>
                    <a href="{{ route('about') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 rounded-lg px-3 py-2">
                        <i class="fas fa-info-circle w-5"></i>
                        <span>আমাদের সম্পর্কে</span>
                    </a>
                    <a href="{{ route('contact') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 rounded-lg px-3 py-2">
                        <i class="fas fa-envelope w-5"></i>
                        <span>যোগাযোগ</span>
                    </a>
                </div>
                
                <!-- Mobile Search Bar -->
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <form action="{{ route('fonts.index') }}" method="GET" class="flex">
                        <input type="text" name="q" placeholder="ফন্ট খুঁজুন..." 
                               class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleButton = this;
        const icon = toggleButton.querySelector('i');
        
        mobileMenu.classList.toggle('hidden');
        
        // Toggle icon between bars and times
        if (mobileMenu.classList.contains('hidden')) {
            icon.className = 'fas fa-bars text-xl';
        } else {
            icon.className = 'fas fa-times text-xl';
        }
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleButton = document.getElementById('mobile-menu-toggle');
        
        if (!mobileMenu.classList.contains('hidden') && 
            !mobileMenu.contains(event.target) && 
            !toggleButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            toggleButton.querySelector('i').className = 'fas fa-bars text-xl';
        }
    });
</script>

