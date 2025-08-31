@extends('layouts.app')

@section('title', $fontData->display_name . ' - ' . siteTitle())

@section('content')
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-gray-900 bengali-text">{{ $fontData->display_name }}</h1>
                    <p class="text-gray-600 mt-2 bengali-text">{{ $fontData->description }}</p>

                    <!-- Font Details -->
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-language text-blue-600"></i>
                                <div>
                                    <div class="font-semibold bengali-text">Supported Encodings</div>
                                    <div class="text-gray-700">{{ $fontData->supported_encodings }}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-font text-green-600"></i>
                                <div>
                                    <div class="font-semibold bengali-text">Number of Glyphs</div>
                                    <div class="text-gray-700">{{ $fontData->glyphs }} characters</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                            <i class="fas fa-edit text-blue-600"></i>
                            Type Tester
                        </h2>
                        
                        <!-- Text Input Section -->
                        <div class="grid md:grid-cols-4 gap-4 mb-6">
                            <div class="md:col-span-3">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class="fas fa-font text-gray-500"></i>
                                    <input id="tester-input" type="text" value="ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type your text here..." />
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-arrows-alt-v text-gray-500"></i>
                                <input id="size-range" type="range" min="16" max="128" value="48" class="w-full" />
                                <span id="size-value" class="w-16 text-right font-medium text-gray-700">48px</span>
                            </div>
                        </div>

                        <!-- Style Controls -->
                        <div class="grid md:grid-cols-3 gap-6 mb-6">
                            <!-- Font Style Controls -->
                            <div class="flex items-center gap-4">
                                <i class="fas fa-palette text-gray-500"></i>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-blue-600 transition">
                                    <input id="toggle-bold" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <i class="fas fa-bold text-lg"></i>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-blue-600 transition">
                                    <input id="toggle-italic" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <i class="fas fa-italic text-lg"></i>
                                </label>
                            </div>
                            
                            <!-- Font Weight Control -->
                            <div class="flex items-center gap-3">
                                <i class="fas fa-weight-hanging text-gray-500"></i>
                                <input id="weight-range" type="range" min="100" max="900" step="50" value="400" class="w-full" />
                                <span id="weight-value" class="w-12 text-right text-sm font-medium text-gray-700">400</span>
                            </div>
                            
                            <!-- Text Alignment -->
                            <div class="flex items-center gap-2">
                                <i class="fas fa-align-left text-gray-500"></i>
                                <button type="button" data-align="left" class="align-btn p-2 border rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button type="button" data-align="center" class="align-btn p-2 border rounded-lg hover:bg-gray-100 transition">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button type="button" data-align="right" class="align-btn p-2 border rounded-lg hover:bg-gray-100 transition">
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sample Text Buttons -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-lightbulb text-gray-500"></i>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($testerSamples as $sample)
                                        <button class="px-3 py-2 rounded-lg bg-gray-100 hover:bg-blue-100 hover:text-blue-700 transition text-sm bengali-text" onclick="setTesterText('{{ $sample }}')">
                                            {{ $sample }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Output Preview -->
                        <div class=" rounded-lg p-6 bg-gray-50">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-eye text-gray-500"></i>
                                </div>
                                <button onclick="copyToClipboard()" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Copy CSS">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div id="tester-output" class="bengali-text min-h-[120px] flex items-center" style="font-size: 48px; line-height: 1.4; font-weight: 400; font-style: normal; text-align: left; font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">
                                ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                            <i class="fas fa-font text-blue-600"></i>
                            Glyph Preview
                        </h2>
                        <div class="space-y-8">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-letters text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-12 gap-3 text-center">
                                    @foreach($basicGlyphs as $g)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-blue-50 hover:border-blue-200 transition cursor-pointer group" title="{{ $g }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $g }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-music text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-8 sm:grid-cols-10 md:grid-cols-12 gap-3 text-center">
                                    @foreach($marks as $m)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-green-50 hover:border-green-200 transition cursor-pointer group" title="{{ $m }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $m }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <i class="fas fa-link text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-8 gap-3 text-center">
                                    @foreach($complexGlyphs as $cg)
                                        <div class="border rounded-lg bg-gray-50 aspect-square flex items-center justify-center p-2 hover:bg-purple-50 hover:border-purple-200 transition cursor-pointer group" title="{{ $cg }}">
                                            <div class="text-xl sm:text-2xl md:text-3xl leading-tight bengali-text group-hover:scale-110 transition" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $cg }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Designer and Developer Section -->
                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-6 bengali-text flex items-center gap-2">
                            <i class="fas fa-users text-blue-600"></i>
                            Contributors
                        </h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Designer Section -->
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text flex items-center gap-2">
                                    <i class="fas fa-palette text-gray-600"></i>
                                    ডিজাইনার
                                </h3>
                                @if(isset($fontData->designers) && count($fontData->designers) > 0)
                                    @foreach($fontData->designers as $designer)
                                        <div class="flex items-center space-x-3 mb-3">
                                            @if($designer->photo_path)
                                                <img src="{{ asset('storage/' . $designer->photo_path) }}" 
                                                     alt="{{ $designer->name }}" 
                                                     class="w-10 h-10 rounded-full object-cover">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="font-medium text-gray-800">
                                                    <a href="{{ route('developers.show', $designer->id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        {{ $designer->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-gray-500 bengali-text">ডিজাইনার তথ্য নেই</div>
                                @endif
                            </div>

                            <!-- Developer Section -->
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text flex items-center gap-2">
                                    <i class="fas fa-code text-gray-600"></i>
                                    টাইপ ডেভেলপার
                                </h3>
                                @if(isset($fontData->developers) && count($fontData->developers) > 0)
                                    @foreach($fontData->developers as $developer)
                                        <div class="flex items-center space-x-3 mb-3">
                                            @if($developer->photo_path)
                                                <img src="{{ asset('storage/' . $developer->photo_path) }}" 
                                                     alt="{{ $developer->name }}" 
                                                     class="w-10 h-10 rounded-full object-cover">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="font-medium text-gray-800">
                                                    <a href="{{ route('developers.show', $developer->id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        {{ $developer->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-gray-500 bengali-text">ডেভেলপার তথ্য নেই</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="md:col-span-1">
                    <div class="border rounded-lg p-6 sticky top-24">
                        <div class="text-3xl font-bold text-blue-600 mb-4">
                            {{ $fontData->price > 0 ? '৳'.number_format($fontData->price) : 'ফ্রি' }}
                        </div>
                        @if($fontData->type === 'free')
                            <a href="{{ route('fonts.download', $fontData->id) }}" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 block text-center bengali-text">
                                ডাউনলোড
                            </a>
                        @else
                            <a href="{{ route('orders.create', $fontData->id) }}" class="w-full btn-primary text-white px-4 py-2 rounded-lg block text-center bengali-text">
                                কিনুন
                            </a>
                        @endif

                        <div class="mt-6 text-sm text-gray-600 space-y-2">
                            <div class="bengali-text">প্রকাশিত: {{ 
                                \Illuminate\Support\Carbon::parse($fontData->published_at)->translatedFormat('d F, Y') 
                            }}</div>
                            <div class="bengali-text">ডাউনলোড: {{ number_format($fontData->downloads_count ?? 0) }} বার</div>
                            <div class="bengali-text">লাইসেন্স: ব্যক্তিগত/বাণিজ্যিক</div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection

@push('styles')
@if($fontData->font_file_path)
<style>
    @font-face {
        font-family: '{{ $fontData->name }}';
        src: url('{{ asset('storage/' . $fontData->font_file_path) }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
</style>
@endif
@endpush

@push('scripts')
<script>
    function setTesterText(text) {
        const input = document.getElementById('tester-input');
        input.value = text;
        updateTester();
    }
    
    function updateTester() {
        const text = document.getElementById('tester-input').value;
        const size = document.getElementById('size-range').value;
        const weight = document.getElementById('weight-range').value;
        const bold = document.getElementById('toggle-bold').checked;
        const italic = document.getElementById('toggle-italic').checked;
        const out = document.getElementById('tester-output');
        
        document.getElementById('size-value').innerText = size + 'px';
        document.getElementById('weight-value').innerText = weight;
        out.style.fontSize = size + 'px';
        out.style.fontWeight = bold ? '700' : weight;
        out.style.fontStyle = italic ? 'italic' : 'normal';
        out.textContent = text;
    }
    
    function copyToClipboard() {
        const text = document.getElementById('tester-input').value;
        const size = document.getElementById('size-range').value;
        const weight = document.getElementById('weight-range').value;
        const bold = document.getElementById('toggle-bold').checked;
        const italic = document.getElementById('toggle-italic').checked;
        
        const css = `font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;
font-size: ${size}px;
font-weight: ${bold ? '700' : weight};
font-style: ${italic ? 'italic' : 'normal'};`;
        
        const copyText = `Text: ${text}\n\nCSS:\n${css}`;
        
        navigator.clipboard.writeText(copyText).then(() => {
            // Show success message
            const copyBtn = document.querySelector('[onclick="copyToClipboard()"]');
            const originalText = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            copyBtn.classList.add('text-green-600');
            
            setTimeout(() => {
                copyBtn.innerHTML = originalText;
                copyBtn.classList.remove('text-green-600');
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = copyText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        });
    }
    
    // Event listeners
    document.getElementById('tester-input').addEventListener('input', updateTester);
    document.getElementById('size-range').addEventListener('input', updateTester);
    document.getElementById('weight-range').addEventListener('input', updateTester);
    document.getElementById('toggle-bold').addEventListener('change', updateTester);
    document.getElementById('toggle-italic').addEventListener('change', updateTester);

    document.querySelectorAll('.align-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active state from all buttons
            document.querySelectorAll('.align-btn').forEach(b => {
                b.classList.remove('bg-blue-100', 'text-blue-700');
                b.classList.add('hover:bg-gray-100');
            });
            
            // Add active state to clicked button
            btn.classList.add('bg-blue-100', 'text-blue-700');
            btn.classList.remove('hover:bg-gray-100');
            
            document.getElementById('tester-output').style.textAlign = btn.dataset.align;
        });
    });
    
    // Initialize the tester
    document.addEventListener('DOMContentLoaded', function() {
        updateTester();
    });
</script>
@endpush
