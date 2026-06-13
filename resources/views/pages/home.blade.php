@extends('layouts.landing')

@section('title', 'Home')
@section('meta_description', 'Tribute Energy — Premium energy supplements for peak performance. Shop drinks, powders & bundles.')

@section('content')

    @include('partials.hero')

    {{-- ═══════════════════════════════════════════
         TRUST BAR
    ═══════════════════════════════════════════ --}}
    <section class="border-y border-[#1A1A1A] bg-[#0D0D0D]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-6">
            <div class="flex flex-wrap items-center justify-center lg:justify-between gap-6 text-gray-600 text-xs font-rajdhani font-700 tracking-widest uppercase">
                <div class="flex items-center gap-2">
                    <i class="fas fa-shield-alt text-[#FF6B00]"></i>
                    <span>Lab Tested &amp; Certified</span>
                </div>
                <div class="w-px h-4 bg-[#252525] hidden lg:block"></div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-leaf text-[#FF6B00]"></i>
                    <span>No Artificial Colors</span>
                </div>
                <div class="w-px h-4 bg-[#252525] hidden lg:block"></div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-bolt text-[#FF6B00]"></i>
                    <span>200mg Natural Caffeine</span>
                </div>
                <div class="w-px h-4 bg-[#252525] hidden lg:block"></div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-truck text-[#FF6B00]"></i>
                    <span>Free Shipping Over $50</span>
                </div>
                <div class="w-px h-4 bg-[#252525] hidden lg:block"></div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-undo text-[#FF6B00]"></i>
                    <span>30-Day Money Back</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FEATURED PRODUCTS
    ═══════════════════════════════════════════ --}}
    <section class="py-24 px-5 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-14" data-aos="fade-up">
            <div class="section-label mb-3">Top Picks</div>
            <h2 class="font-bebas text-6xl lg:text-7xl">FEATURED <span class="text-gradient">PRODUCTS</span></h2>
            <div class="divider mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @if($featuredProducts->count() > 0)
                @foreach($featuredProducts as $p)
                <div class="card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    {{-- Product Visual --}}
                    <div class="relative overflow-hidden" style="height: 260px; background: {{ $p->color }};">
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                            <div class="font-bebas text-8xl opacity-10 absolute top-1/2 -translate-y-1/2">TE</div>
                            <i class="fas fa-bolt text-6xl opacity-60 drop-shadow-2xl relative z-10"></i>
                            <span class="font-bebas text-xl mt-3 tracking-wider relative z-10">{{ $p->name }}</span>
                            <span class="text-xs opacity-60 relative z-10 font-rajdhani">{{ $p->flavor }}</span>
                        </div>

                        {{-- Tags --}}
                        <div class="absolute top-3 left-3 flex flex-col gap-2">
                            @if($p->is_new)
                            <div class="product-tag text-white bg-green-600/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                New
                            </div>
                            @endif
                            @if($p->is_sale)
                            <div class="product-tag text-white bg-red-600/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                Sale
                            </div>
                            @endif
                            @if($p->is_featured)
                            <div class="product-tag text-white bg-[#FF6B00]/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                Featured
                            </div>
                            @endif
                        </div>

                        {{-- Wishlist --}}
                        <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 flex items-center justify-center text-white/60 hover:text-[#FF6B00] hover:bg-black/70 transition-all text-sm backdrop-blur-sm">
                            <i class="fas fa-heart"></i>
                        </button>

                        {{-- Quick Add --}}
                        <div class="absolute bottom-0 inset-x-0 bg-[#FF6B00] py-3.5 translate-y-full group-hover:translate-y-0 transition-transform duration-300 text-center">
                            <button class="font-rajdhani font-700 text-sm tracking-wider uppercase text-white w-full">
                                <i class="fas fa-shopping-bag mr-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="flex items-start justify-between mb-1">
                            <div>
                                <h3 class="font-rajdhani font-700 text-base leading-tight">{{ $p->name }}</h3>
                                <p class="text-gray-500 text-xs mt-0.5">{{ $p->flavor }}</p>
                            </div>
                            <div class="text-right">
                                @if($p->original_price)
                                <span class="font-bebas text-sm text-gray-500 line-through block">${{ number_format($p->original_price, 2) }}</span>
                                @endif
                                <span class="font-bebas text-2xl text-[#FF6B00]">${{ number_format($p->price, 2) }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs font-rajdhani font-600 tracking-wider uppercase mt-1">{{ $p->size }}</p>
                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#1A1A1A]">
                            <div class="flex items-center gap-1.5">
                                <div class="stars text-[11px]">
                                    @for($s = 0; $s < 5; $s++)
                                    <i class="fas fa-star" style="{{ $p->rating >= $s + 1 ? '' : 'opacity:0.2' }}"></i>
                                    @endfor
                                </div>
                                <span class="text-gray-500 text-[11px]">{{ $p->reviews }}</span>
                            </div>
                            <button class="w-8 h-8 flex items-center justify-center bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors text-gray-400 hover:text-white text-sm rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                {{-- Fallback featured products --}}
                @php
                $fallbackProducts = [
                    ['name' => 'Tribute Pro', 'flavor' => 'Orange', 'size' => '12oz', 'price' => 4.99, 'original_price' => null, 'rating' => 5, 'reviews' => 24, 'color' => 'linear-gradient(135deg, #FF6B00, #FFB800)', 'is_new' => false, 'is_sale' => false, 'is_featured' => true],
                    ['name' => 'Tribute Zero', 'flavor' => 'Citrus', 'size' => '12oz', 'price' => 4.99, 'original_price' => null, 'rating' => 5, 'reviews' => 18, 'color' => 'linear-gradient(135deg, #00D4FF, #0099CC)', 'is_new' => true, 'is_sale' => false, 'is_featured' => true],
                    ['name' => 'Tribute Powder', 'flavor' => 'Orange', 'size' => '30 Servings', 'price' => 29.99, 'original_price' => 39.99, 'rating' => 5, 'reviews' => 32, 'color' => 'linear-gradient(135deg, #FF6B00, #FF4500)', 'is_new' => false, 'is_sale' => true, 'is_featured' => true],
                    ['name' => 'Performance Bundle', 'flavor' => 'Variety', 'size' => 'Bundle', 'price' => 79.99, 'original_price' => 99.99, 'rating' => 5, 'reviews' => 45, 'color' => 'linear-gradient(135deg, #1A1A2E, #16213E)', 'is_new' => false, 'is_sale' => true, 'is_featured' => true],
                ];
                @endphp
                @foreach($fallbackProducts as $i => $p)
                <div class="card group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="relative overflow-hidden" style="height: 260px; background: {{ $p['color'] }};">
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                            <div class="font-bebas text-8xl opacity-10 absolute top-1/2 -translate-y-1/2">TE</div>
                            <i class="fas fa-bolt text-6xl opacity-60 drop-shadow-2xl relative z-10"></i>
                            <span class="font-bebas text-xl mt-3 tracking-wider relative z-10">{{ $p['name'] }}</span>
                            <span class="text-xs opacity-60 relative z-10 font-rajdhani">{{ $p['flavor'] }}</span>
                        </div>

                        <div class="absolute top-3 left-3 flex flex-col gap-2">
                            @if($p['is_new'])
                            <div class="product-tag text-white bg-green-600/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">New</div>
                            @endif
                            @if($p['is_sale'])
                            <div class="product-tag text-white bg-red-600/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">Sale</div>
                            @endif
                            @if($p['is_featured'])
                            <div class="product-tag text-white bg-[#FF6B00]/80 backdrop-blur-sm px-3 py-1 text-xs font-rajdhani font-700 tracking-wider uppercase rounded">Featured</div>
                            @endif
                        </div>

                        <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 flex items-center justify-center text-white/60 hover:text-[#FF6B00] hover:bg-black/70 transition-all text-sm backdrop-blur-sm">
                            <i class="fas fa-heart"></i>
                        </button>

                        <div class="absolute bottom-0 inset-x-0 bg-[#FF6B00] py-3.5 translate-y-full group-hover:translate-y-0 transition-transform duration-300 text-center">
                            <button class="font-rajdhani font-700 text-sm tracking-wider uppercase text-white w-full">
                                <i class="fas fa-shopping-bag mr-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="flex items-start justify-between mb-1">
                            <div>
                                <h3 class="font-rajdhani font-700 text-base leading-tight">{{ $p['name'] }}</h3>
                                <p class="text-gray-500 text-xs mt-0.5">{{ $p['flavor'] }}</p>
                            </div>
                            <div class="text-right">
                                @if($p['original_price'])
                                <span class="font-bebas text-sm text-gray-500 line-through block">${{ number_format($p['original_price'], 2) }}</span>
                                @endif
                                <span class="font-bebas text-2xl text-[#FF6B00]">${{ number_format($p['price'], 2) }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs font-rajdhani font-600 tracking-wider uppercase mt-1">{{ $p['size'] }}</p>
                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#1A1A1A]">
                            <div class="flex items-center gap-1.5">
                                <div class="stars text-[11px]">
                                    @for($s = 0; $s < 5; $s++)
                                    <i class="fas fa-star" style="{{ $p['rating'] >= $s + 1 ? '' : 'opacity:0.2' }}"></i>
                                    @endfor
                                </div>
                                <span class="text-gray-500 text-[11px]">{{ $p['reviews'] }}</span>
                            </div>
                            <button class="w-8 h-8 flex items-center justify-center bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors text-gray-400 hover:text-white text-sm rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('products') }}" class="btn-outline">
                View All Products <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         WHY TRIBUTE ENERGY
    ═══════════════════════════════════════════ --}}
    <section class="py-24 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <div class="section-label mb-4">Why Choose Us</div>
                    <h2 class="font-bebas text-6xl lg:text-7xl leading-none mb-6">
                        THE TRIBUTE<br>
                        <span class="text-gradient">DIFFERENCE</span>
                    </h2>
                    <p class="text-gray-400 leading-relaxed mb-10">
                        We didn't just create another energy drink. We engineered a performance system
                        backed by sports science, premium ingredients, and a relentless pursuit of quality.
                        Every can, every scoop — crafted for those who refuse to quit.
                    </p>
                    <a href="{{ route('features') }}" class="btn-primary">
                        <span>Explore Features</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5" data-aos="fade-left" data-aos-delay="100">
                    @if($features->count() > 0)
                        @foreach($features as $i => $f)
                        <div class="card p-6" data-aos="fade-up" data-aos-delay="{{ 100 + $i * 80 }}">
                            @if($f->image)
                            <div class="w-12 h-12 rounded-xl overflow-hidden mb-4">
                                <img src="{{ asset($f->image) }}" alt="{{ $f->title }}" class="w-full h-full object-cover">
                            </div>
                            @elseif($f->icon)
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center mb-4">
                                <span class="text-2xl">{{ $f->icon }}</span>
                            </div>
                            @else
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center mb-4">
                                <i class="fas fa-bolt text-white text-lg"></i>
                            </div>
                            @endif
                            <h4 class="font-rajdhani font-700 text-base mb-2">{{ $f->title }}</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $f->description }}</p>
                        </div>
                        @endforeach
                    @else
                        {{-- Fallback features --}}
                        @php
                        $fallbackFeatures = [
                            ['icon' => '⚡', 'title' => 'Clinical Formula',   'desc' => 'Every ingredient dosed at clinical levels — not proprietary blends hiding under-dosed actives.'],
                            ['icon' => '🌿', 'title' => 'Clean Ingredients',  'desc' => 'Zero artificial dyes, no synthetic sweeteners. Just clean energy from nature-identical compounds.'],
                            ['icon' => '🔬', 'title' => 'Third-Party Tested', 'desc' => 'Every batch independently tested for purity, potency, and banned substances. No shortcuts.'],
                            ['icon' => '⚙️', 'title' => 'Sustained Energy',  'desc' => 'Engineered release formula keeps you sharp for 6+ hours without jitters or the dreaded crash.'],
                        ];
                        @endphp
                        @foreach($fallbackFeatures as $i => $f)
                        <div class="card p-6" data-aos="fade-up" data-aos-delay="{{ 100 + $i * 80 }}">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center mb-4">
                                <span class="text-2xl">{{ $f['icon'] }}</span>
                            </div>
                            <h4 class="font-rajdhani font-700 text-base mb-2">{{ $f['title'] }}</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $f['desc'] }}</p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         ENERGY SCIENCE BANNER
    ═══════════════════════════════════════════ --}}
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 z-0"
             style="background: linear-gradient(135deg, #FF6B00 0%, #FFB800 50%, #FF4500 100%); opacity: 0.08;"></div>
        <div class="absolute inset-0 z-0 border-y border-[#FF6B00]/10"></div>

        <div class="max-w-7xl mx-auto px-5 lg:px-8 relative z-10 text-center" data-aos="fade-up">
            <div class="section-label mb-4">Powered By Science</div>
            <h2 class="font-bebas text-6xl lg:text-8xl leading-none mb-6">
                NOT JUST ENERGY.<br>
                <span class="text-gradient">PRECISION FUEL.</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Our proprietary TriFuel™ Complex combines three synergistic pathways — caffeine + L-theanine
                for focused energy, B-vitamins for cellular conversion, and adaptogens for stress resilience.
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                @php
                $stats = [
                    ['val' => '200mg', 'label' => 'Natural Caffeine'],
                    ['val' => '400mg', 'label' => 'L-Theanine'],
                    ['val' => '3.2g',  'label' => 'Beta-Alanine'],
                    ['val' => '6hrs',  'label' => 'Sustained Focus'],
                ];
                @endphp
                @foreach($stats as $s)
                <div class="bg-[#111] border border-[#252525] px-8 py-5 text-center min-w-[140px]">
                    <div class="font-bebas text-4xl text-[#FF6B00]">{{ $s['val'] }}</div>
                    <div class="section-label !text-gray-500 mt-1">{{ $s['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         TESTIMONIALS
    ═══════════════════════════════════════════ --}}
    <section class="py-24 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div class="section-label mb-3">Real Results</div>
                <h2 class="font-bebas text-6xl lg:text-7xl">WHAT PEOPLE <span class="text-gradient">SAY</span></h2>
                <div class="divider mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if($testimonials->count() > 0)
                    @foreach($testimonials as $i => $t)
                    <div class="card p-7" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="stars mb-4">
                            @for($s = 0; $s < $t->rating; $s++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed mb-6 italic">"{{ $t->content }}"</p>
                        <div class="flex items-center gap-3 pt-5 border-t border-[#1E1E1E]">
                            @if($t->avatar)
                            <img src="{{ asset($t->avatar) }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($t->name, 0, 1)) }}
                            </div>
                            @endif
                            <div>
                                <div class="font-rajdhani font-700 text-sm">{{ $t->name }}</div>
                                <div class="text-gray-500 text-xs">
                                    @if($t->role){{ $t->role }}@endif
                                    @if($t->role && $t->company) · @endif
                                    @if($t->company){{ $t->company }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    {{-- Fallback testimonials --}}
                    @php
                    $fallbackReviews = [
                        ['name' => 'Jordan M.', 'role' => 'Marathon Runner', 'text' => "I've tried every energy supplement out there. Tribute Pro is the only one that gets me through 20-mile training runs without a single crash. Game changer.", 'stars' => 5],
                        ['name' => 'Aisha K.', 'role' => 'Competitive Gamer', 'text' => "My reaction times improved noticeably in the first week. The focus from Tribute Zero is unreal — no jitters, just clean, locked-in energy for hours.", 'stars' => 5],
                        ['name' => 'Marcus T.', 'role' => 'CrossFit Coach', 'text' => "I recommend Tribute Energy to all my athletes. The ingredient transparency is what sold me — you know exactly what you're putting in your body.", 'stars' => 5],
                    ];
                    @endphp
                    @foreach($fallbackReviews as $i => $r)
                    <div class="card p-7" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="stars mb-4">
                            @for($s = 0; $s < $r['stars']; $s++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed mb-6 italic">"{{ $r['text'] }}"</p>
                        <div class="flex items-center gap-3 pt-5 border-t border-[#1E1E1E]">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($r['name'], 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-rajdhani font-700 text-sm">{{ $r['name'] }}</div>
                                <div class="text-gray-500 text-xs">{{ $r['role'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         PRODUCT REQUEST
    ═══════════════════════════════════════════ --}}
    <section class="py-24 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <div class="section-label mb-4">Product Request</div>
                    <h2 class="font-bebas text-6xl lg:text-7xl leading-none mb-6">
                        CAN'T FIND<br>
                        <span class="text-gradient">WHAT YOU NEED?</span>
                    </h2>
                    <p class="text-gray-400 leading-relaxed mb-10">
                        Looking for a specific product or flavor? Let us know what you're interested in and we'll do our best to make it available. Your feedback helps us improve our product lineup.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#FF6B00]/20 flex items-center justify-center">
                                <i class="fas fa-check text-[#FF6B00]"></i>
                            </div>
                            <span class="text-gray-300">We'll notify you when your requested product is available</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#FF6B00]/20 flex items-center justify-center">
                                <i class="fas fa-check text-[#FF6B00]"></i>
                            </div>
                            <span class="text-gray-300">Get exclusive early access to new products</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#FF6B00]/20 flex items-center justify-center">
                                <i class="fas fa-check text-[#FF6B00]"></i>
                            </div>
                            <span class="text-gray-300">Special discounts for requested products</span>
                        </div>
                    </div>
                </div>

                <div class="card p-8" data-aos="fade-left" data-aos-delay="100">
                    <form x-data="{ submitted: false }" @submit.prevent="submitted = true">
                        <div x-show="!submitted" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2">Product Name</label>
                                    <input type="text" placeholder="e.g., Tribute Watermelon" 
                                           class="w-full bg-[#111] border border-[#252525] text-white px-4 py-3 focus:outline-none focus:border-[#FF6B00] transition-colors rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2">Product Type</label>
                                    <select class="w-full bg-[#111] border border-[#252525] text-gray-300 px-4 py-3 focus:outline-none focus:border-[#FF6B00] transition-colors rounded-lg cursor-pointer">
                                        <option value="">Select type...</option>
                                        <option value="drink">Energy Drink</option>
                                        <option value="powder">Energy Powder</option>
                                        <option value="bundle">Bundle Pack</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2">Preferred Flavor</label>
                                    <input type="text" placeholder="e.g., Watermelon, Grape, etc." 
                                           class="w-full bg-[#111] border border-[#252525] text-white px-4 py-3 focus:outline-none focus:border-[#FF6B00] transition-colors rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2">Your Email</label>
                                    <input type="email" placeholder="your@email.com" 
                                           class="w-full bg-[#111] border border-[#252525] text-white px-4 py-3 focus:outline-none focus:border-[#FF6B00] transition-colors rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2">Additional Notes</label>
                                    <textarea rows="3" placeholder="Any specific requirements or suggestions..." 
                                              class="w-full bg-[#111] border border-[#252525] text-white px-4 py-3 focus:outline-none focus:border-[#FF6B00] transition-colors rounded-lg resize-none"></textarea>
                                </div>
                                <button type="submit" class="w-full btn-primary">
                                    <span>Submit Request</span>
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                        <div x-show="submitted" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="text-center py-12">
                            <div class="w-16 h-16 rounded-full bg-green-600/20 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-check text-green-500 text-2xl"></i>
                            </div>
                            <h3 class="font-rajdhani font-700 text-xl text-white mb-2">Request Submitted!</h3>
                            <p class="text-gray-400">We'll notify you when this product becomes available.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         CTA BANNER
    ═══════════════════════════════════════════ --}}
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 z-0"
             style="background: linear-gradient(135deg, rgba(255,107,0,0.15) 0%, rgba(255,184,0,0.05) 100%);"></div>
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-64 h-64 rounded-full pointer-events-none z-0"
             style="background: radial-gradient(circle, rgba(255,107,0,0.2), transparent 70%); filter: blur(50px);"></div>

        <div class="max-w-4xl mx-auto px-5 lg:px-8 text-center relative z-10" data-aos="fade-up">
            <div class="section-label mb-4">Limited Time</div>
            <h2 class="font-bebas text-6xl lg:text-8xl leading-none mb-4">
                GET YOUR FIRST BOX<br>
                <span class="text-gradient">30% OFF</span>
            </h2>
            <p class="text-gray-400 mb-10 text-lg">
                Use code <span class="font-rajdhani font-700 text-[#FF6B00] bg-[#FF6B00]/10 px-3 py-0.5 rounded">TRIBUTE30</span> at checkout.
                Limited to new subscribers only.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('products') }}" class="btn-primary">
                    <span>Claim Your Discount</span>
                    <i class="fas fa-bolt"></i>
                </a>
                <a href="{{ route('pricing') }}" class="btn-outline">
                    View Subscription Plans
                </a>
            </div>
        </div>
    </section>

@endsection
