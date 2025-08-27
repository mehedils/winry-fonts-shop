<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <i class="fas fa-font text-blue-400 text-2xl"></i>
                    <span class="text-2xl font-bold">ফন্টবাজার</span>
                </div>
                <p class="text-gray-400 bengali-text">বাংলাদেশের প্রথম এবং সবচেয়ে বড় বাংলা ফন্ট মার্কেটপ্লেস</p>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4 bengali-text">দ্রুত লিঙ্ক</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">সব ফন্ট</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">ফ্রি ফন্ট</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">প্রিমিয়াম ফন্ট</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">লাইসেন্স</a></li>
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
                    <p class="text-gray-400"><i class="fas fa-envelope mr-2"></i> support@fontbazaar.com.bd</p>
                    <p class="text-gray-400"><i class="fas fa-phone mr-2"></i> +৮৮০ ১৭১১-২৩৪৫৬৭</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400 bengali-text">&copy; {{ date('Y') }} ফন্টবাজার. সর্বস্বত্ব সংরক্ষিত.</p>
        </div>
    </div>
</footer>
