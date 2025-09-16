<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <a href="{{ route('home') }}" class="flex items-center space-x-2 mb-4 hover:opacity-80 transition">
                    @if (\App\Helpers\SettingsHelper::siteLogo())
                        <img src="{{ \App\Helpers\SettingsHelper::siteLogo() }}"
                            alt="{{ \App\Helpers\SettingsHelper::siteTitle() }}" class="h-16 w-auto">
                    @else
                        <i class="fas fa-font text-blue-400 text-2xl"></i>
                        <span class="text-2xl font-bold">{{ \App\Helpers\SettingsHelper::siteTitle() }}</span>
                    @endif
                </a>
                <p class="text-gray-400 bengali-text">{{ \App\Helpers\SettingsHelper::footerDescription() }}</p>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">দ্রুত লিঙ্ক</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('fonts.index') }}"
                            class="text-gray-400 hover:text-white transition">ফন্টসমূহ</a></li>
                    <li><a href="{{ route('font-artist') }}" class="text-gray-400 hover:text-white transition">বর্ণ
                            শিল্পি</a></li>
                    <li><a href="{{ route('fonts.index') }}?type=free"
                            class="text-gray-400 hover:text-white transition">ফ্রি ফন্ট</a></li>
                    <li><a href="{{ route('fonts.index') }}?type=premium"
                            class="text-gray-400 hover:text-white transition">প্রিমিয়াম ফন্ট</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">লাইসেন্স</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">সাপোর্ট</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('help') }}" class="text-gray-400 hover:text-white transition">সাহায্য
                            কেন্দ্র</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">যোগাযোগ</a>
                    </li>
                    <li><a href="{{ route('tutorials') }}"
                            class="text-gray-400 hover:text-white transition">টিউটোরিয়াল</a></li>
                    <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">যোগাযোগ করুন</h4>
                <div class="space-y-2">
                    @if (\App\Helpers\SettingsHelper::contactEmail())
                        <p class="text-gray-400"><i class="fas fa-envelope mr-2"></i>
                            {{ \App\Helpers\SettingsHelper::contactEmail() }}</p>
                    @endif
                    @if (\App\Helpers\SettingsHelper::contactPhone())
                        <p class="text-gray-400"><i class="fas fa-phone mr-2"></i>
                            {{ \App\Helpers\SettingsHelper::contactPhone() }}</p>
                    @endif
                    @if (\App\Helpers\SettingsHelper::contactAddress())
                        <p class="text-gray-400"><i class="fas fa-map-marker-alt mr-2"></i>
                            {{ \App\Helpers\SettingsHelper::contactAddress() }}</p>
                    @endif
                    <!-- Social Media Links -->
                    <div class="flex space-x-4">
                        @php
                            $socialLinks = \App\Helpers\SettingsHelper::socialLinks();
                        @endphp

                        @if (isset($socialLinks['facebook']) && $socialLinks['facebook'])
                            <a href="{{ $socialLinks['facebook'] }}" target="_blank"
                                class="text-gray-400 hover:text-blue-600 transition-colors">
                                <i class="fab fa-facebook-f w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['twitter']) && $socialLinks['twitter'])
                            <a href="{{ $socialLinks['twitter'] }}" target="_blank"
                                class="text-gray-400 hover:text-blue-400 transition-colors">
                                <i class="fab fa-twitter w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['instagram']) && $socialLinks['instagram'])
                            <a href="{{ $socialLinks['instagram'] }}" target="_blank"
                                class="text-gray-400 hover:text-pink-500 transition-colors">
                                <i class="fab fa-instagram w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['linkedin']) && $socialLinks['linkedin'])
                            <a href="{{ $socialLinks['linkedin'] }}" target="_blank"
                                class="text-gray-400 hover:text-blue-700 transition-colors">
                                <i class="fab fa-linkedin-in w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['youtube']) && $socialLinks['youtube'])
                            <a href="{{ $socialLinks['youtube'] }}" target="_blank"
                                class="text-gray-400 hover:text-red-600 transition-colors">
                                <i class="fab fa-youtube w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['github']) && $socialLinks['github'])
                            <a href="{{ $socialLinks['github'] }}" target="_blank"
                                class="text-gray-400 hover:text-gray-600 transition-colors">
                                <i class="fab fa-github w-5 h-5"></i>
                            </a>
                        @endif

                        @if (isset($socialLinks['behance']) && $socialLinks['behance'])
                            <a href="{{ $socialLinks['behance'] }}" target="_blank"
                                class="text-gray-400 hover:text-blue-600 transition-colors">
                                <i class="fab fa-behance w-5 h-5"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400 bengali-text">{{ \App\Helpers\SettingsHelper::footerCopyright() }}</p>
            <p class="text-gray-500 text-sm mt-2">Powered by <a href="https://winrysoft.com" target="_blank" rel="noopener" class="underline hover:text-white">WinrySoft</a></p>
        </div>
    </div>
</footer>
