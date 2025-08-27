<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    @if(\App\Helpers\SettingsHelper::siteLogo())
                        <img src="{{ \App\Helpers\SettingsHelper::siteLogo() }}" alt="{{ \App\Helpers\SettingsHelper::siteTitle() }}" class="h-16 w-auto">
                    @else
                        <i class="fas fa-font text-blue-400 text-2xl"></i>
                        <span class="text-2xl font-bold">{{ \App\Helpers\SettingsHelper::siteTitle() }}</span>
                    @endif
                </div>
                <p class="text-gray-400 bengali-text">{{ \App\Helpers\SettingsHelper::footerDescription() }}</p>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">দ্রুত লিঙ্ক</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('fonts.index') }}" class="text-gray-400 hover:text-white transition">সব ফন্ট</a></li>
                    <li><a href="{{ route('fonts.index') }}?category=free" class="text-gray-400 hover:text-white transition">ফ্রি ফন্ট</a></li>
                    <li><a href="{{ route('fonts.index') }}?category=premium" class="text-gray-400 hover:text-white transition">প্রিমিয়াম ফন্ট</a></li>
                    <li><a href="{{ route('pricing') }}" class="text-gray-400 hover:text-white transition">লাইসেন্স</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">সাপোর্ট</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('help') }}" class="text-gray-400 hover:text-white transition">সাহায্য কেন্দ্র</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">যোগাযোগ</a></li>
                    <li><a href="{{ route('tutorials') }}" class="text-gray-400 hover:text-white transition">টিউটোরিয়াল</a></li>
                    <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">যোগাযোগ করুন</h4>
                <div class="space-y-2">
                    @if(\App\Helpers\SettingsHelper::contactEmail())
                        <p class="text-gray-400"><i class="fas fa-envelope mr-2"></i> {{ \App\Helpers\SettingsHelper::contactEmail() }}</p>
                    @endif
                    @if(\App\Helpers\SettingsHelper::contactPhone())
                        <p class="text-gray-400"><i class="fas fa-phone mr-2"></i> {{ \App\Helpers\SettingsHelper::contactPhone() }}</p>
                    @endif
                    @if(\App\Helpers\SettingsHelper::contactAddress())
                        <p class="text-gray-400"><i class="fas fa-map-marker-alt mr-2"></i> {{ \App\Helpers\SettingsHelper::contactAddress() }}</p>
                    @endif
                    <!-- Social Media Links -->
                    <div class="flex space-x-4">
                        @php
                            $socialLinks = \App\Helpers\SettingsHelper::socialLinks();
                        @endphp
                        
                        @if(isset($socialLinks['facebook']) && $socialLinks['facebook'])
                            <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['twitter']) && $socialLinks['twitter'])
                            <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['instagram']) && $socialLinks['instagram'])
                            <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="text-gray-400 hover:text-pink-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244c-.875.807-2.026 1.297-3.323 1.297zm7.718-1.297c-.875.807-2.026 1.297-3.323 1.297s-2.448-.49-3.323-1.297c-.928-.796-1.418-1.947-1.418-3.244s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['linkedin']) && $socialLinks['linkedin'])
                            <a href="{{ $socialLinks['linkedin'] }}" target="_blank" class="text-gray-400 hover:text-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['youtube']) && $socialLinks['youtube'])
                            <a href="{{ $socialLinks['youtube'] }}" target="_blank" class="text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['github']) && $socialLinks['github'])
                            <a href="{{ $socialLinks['github'] }}" target="_blank" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                        @endif
                        
                        @if(isset($socialLinks['behance']) && $socialLinks['behance'])
                            <a href="{{ $socialLinks['behance'] }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 7h-7V5h7v2zm1.726 10c-.442 1.297-2.891 1.725-4.588 1.725-3.664 0-7.138-2.652-7.138-7.275 0-4.622 3.473-7.275 7.138-7.275 1.697 0 4.146.428 4.588 1.725H24c-.612-2.95-3.078-4.725-6.862-4.725-4.58 0-8.862 3.475-8.862 8.275 0 4.8 4.282 8.275 8.862 8.275 3.784 0 6.25-1.775 6.862-4.725H23.726zM13.388 11h-2.5V9h2.5c1.103 0 2 .897 2 2s-.897 2-2 2zm0 2h-2.5v2h2.5c1.103 0 2-.897 2-2s-.897-2-2-2z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400 bengali-text">{{ \App\Helpers\SettingsHelper::footerCopyright() }}</p>
        </div>
    </div>
</footer>
