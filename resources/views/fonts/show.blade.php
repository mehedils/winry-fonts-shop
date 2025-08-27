@extends('layouts.app')

@section('title', $fontData->display_name . ' - ফন্টবাজার')

@section('content')
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-gray-900 bengali-text">{{ $fontData->display_name }}</h1>
                    <p class="text-gray-600 mt-2 bengali-text">{{ $fontData->description }}</p>

                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Designer Section -->
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text">ডিজাইনার</h3>
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
                                <h3 class="font-semibold text-gray-800 mb-3 bengali-text">টাইপ ডেভেলপার</h3>
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

                        <!-- Font Details -->
                        <div class="grid md:grid-cols-2 gap-4 mt-6 pt-6 border-t">
                            <div>
                                <div class="font-semibold bengali-text">Font Styles</div>
                                <div class="text-gray-700">{{ implode(', ', $fontData->styles) }}</div>
                            </div>
                            <div>
                                <div class="font-semibold bengali-text">Weights</div>
                                <div class="text-gray-700">{{ implode(', ', $fontData->weights) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4 bengali-text">Type Tester</h2>
                        <div class="grid md:grid-cols-4 gap-4 mb-4">
                            <div class="md:col-span-3">
                                <input id="tester-input" type="text" value="ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে" class="w-full border rounded px-3 py-2" />
                            </div>
                            <div class="flex items-center gap-2">
                                <input id="size-range" type="range" min="16" max="128" value="48" class="w-full" />
                                <span id="size-value" class="w-14 text-right">48px</span>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 mb-4">
                            <div class="flex items-center gap-4">
                                <label class="flex items-center gap-2 text-sm"><input id="toggle-bold" type="checkbox"> <span>Bold</span></label>
                                <label class="flex items-center gap-2 text-sm"><input id="toggle-italic" type="checkbox"> <span>Italic</span></label>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm">Weight</span>
                                <input id="weight-range" type="range" min="100" max="900" step="50" value="400" class="w-full" />
                                <span id="weight-value" class="w-12 text-right text-sm">400</span>
                            </div>
                            <div class="flex items-center md:justify-end gap-2">
                                <span class="text-sm">Align</span>
                                <button type="button" data-align="left" class="align-btn px-2 py-1 border rounded text-sm bg-gray-100">Left</button>
                                <button type="button" data-align="center" class="align-btn px-2 py-1 border rounded text-sm">Center</button>
                                <button type="button" data-align="right" class="align-btn px-2 py-1 border rounded text-sm">Right</button>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($testerSamples as $sample)
                                <button class="px-3 py-1 rounded bg-gray-100 hover:bg-gray-200 text-sm bengali-text" onclick="setTesterText('{{ $sample }}')">{{ $sample }}</button>
                            @endforeach
                        </div>
                        <div class="border rounded-lg p-6 bg-gray-50">
                            <div id="tester-output" class="bengali-text" style="font-size: 48px; line-height: 1.4; font-weight: 400; font-style: normal; text-align: left; font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">
                                ঢাকা স্মৃতিময় শহর আমার সোনার বাংলা বর্ষামুখর দিন শেষে
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-white border rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4 bengali-text">Glyph Preview</h2>
                        <div class="space-y-6">
                            <div>
                                <h3 class="font-semibold mb-2 bengali-text">Basic Letters & Punctuation</h3>
                                <div class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-12 gap-2 text-center">
                                    @foreach($basicGlyphs as $g)
                                        <div class="border rounded bg-gray-50 aspect-square flex items-center justify-center p-2">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $g }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2 bengali-text">Matras/Marks</h3>
                                <div class="grid grid-cols-8 sm:grid-cols-10 md:grid-cols-12 gap-2 text-center">
                                    @foreach($marks as $m)
                                        <div class="border rounded bg-gray-50 aspect-square flex items-center justify-center p-2">
                                            <div class="text-xl sm:text-2xl md:text-3xl bengali-text" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $m }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2 bengali-text">Complex Conjuncts (যুক্তাক্ষর)</h3>
                                <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-8 gap-2 text-center">
                                    @foreach($complexGlyphs as $cg)
                                        <div class="border rounded bg-gray-50 aspect-square flex items-center justify-center p-2">
                                            <div class="text-xl sm:text-2xl md:text-3xl leading-tight bengali-text" style="font-family: '{{ $fontData->name }}', 'Hind Siliguri', sans-serif;">{{ $cg }}</div>
                                        </div>
                                    @endforeach
                                </div>
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
                            <form action="{{ route('fonts.download', $fontData->id) }}" method="POST">
                                @csrf
                                <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    ডাউনলোড
                                </button>
                            </form>
                        @else
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="font_id" value="{{ $fontData->id }}">
                                <button class="w-full btn-primary text-white px-4 py-2 rounded-lg">
                                    কার্টে যোগ করুন
                                </button>
                            </form>
                        @endif

                        <div class="mt-6 text-sm text-gray-600 space-y-2">
                            <div class="bengali-text">প্রকাশিত: {{ 
                                \Illuminate\Support\Carbon::parse($fontData->published_at)->translatedFormat('d F, Y') 
                            }}</div>
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
    document.getElementById('tester-input').addEventListener('input', updateTester);
    document.getElementById('size-range').addEventListener('input', updateTester);
    document.getElementById('weight-range').addEventListener('input', updateTester);
    document.getElementById('toggle-bold').addEventListener('change', updateTester);
    document.getElementById('toggle-italic').addEventListener('change', updateTester);

    document.querySelectorAll('.align-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.align-btn').forEach(b => b.classList.remove('bg-gray-100'));
            btn.classList.add('bg-gray-100');
            document.getElementById('tester-output').style.textAlign = btn.dataset.align;
        });
    });
</script>
@endpush
