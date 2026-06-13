@extends('layouts.landing')

@section('title', 'Shop')
@section('meta_description', 'Shop Tribute Energy drinks, powders, and bundle packs. Premium energy supplements for peak performance.')

@section('content')

    {{-- Page Hero --}}
    <section class="relative pt-32 pb-16 overflow-hidden">
        <div class="absolute inset-0 z-0"
             style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat; opacity: 0.08;"></div>
        <div class="absolute inset-0 z-0" style="background: linear-gradient(180deg, #0A0A0A 0%, rgba(10,10,10,0.8) 50%, #0A0A0A 100%);"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-3">Our Store</div>
            <h1 class="font-bebas text-7xl lg:text-8xl leading-none">
                SHOP <span class="text-gradient">ALL</span> PRODUCTS
            </h1>
            <div class="divider mt-4"></div>
            <p class="text-gray-400 mt-4 max-w-xl">
                Premium energy drinks, performance powders, and bundle packs — engineered to fuel every kind of athlete.
            </p>
        </div>
    </section>

    {{-- Shop Section --}}
    <section class="py-12 max-w-7xl mx-auto px-5 lg:px-8" x-data="shopFilters()">

        {{-- Filter + Sort Bar --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-10 pb-6 border-b border-[#1E1E1E]">
            <div class="flex flex-wrap gap-2">
                <button x-on:click="active = 'all'"
                        :class="active === 'all' ? 'bg-[#FF6B00] text-white border-[#FF6B00]' : 'bg-transparent text-gray-400 border-[#252525] hover:border-[#FF6B00] hover:text-white'"
                        class="product-tag border px-5 py-2.5 transition-all duration-250">
                    All
                </button>
                <button x-on:click="active = 'drink'"
                        :class="active === 'drink' ? 'bg-[#FF6B00] text-white border-[#FF6B00]' : 'bg-transparent text-gray-400 border-[#252525] hover:border-[#FF6B00] hover:text-white'"
                        class="product-tag border px-5 py-2.5 transition-all duration-250">
                    Energy Drinks
                </button>
                <button x-on:click="active = 'powder'"
                        :class="active === 'powder' ? 'bg-[#FF6B00] text-white border-[#FF6B00]' : 'bg-transparent text-gray-400 border-[#252525] hover:border-[#FF6B00] hover:text-white'"
                        class="product-tag border px-5 py-2.5 transition-all duration-250">
                    Powders
                </button>
                <button x-on:click="active = 'bundle'"
                        :class="active === 'bundle' ? 'bg-[#FF6B00] text-white border-[#FF6B00]' : 'bg-transparent text-gray-400 border-[#252525] hover:border-[#FF6B00] hover:text-white'"
                        class="product-tag border px-5 py-2.5 transition-all duration-250">
                    Bundles
                </button>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-gray-600 text-xs font-rajdhani font-700 tracking-wider uppercase">Sort:</span>
                <select x-model="sort"
                        class="bg-[#111] border border-[#252525] text-gray-300 text-sm px-4 py-2 focus:outline-none focus:border-[#FF6B00] transition-colors cursor-pointer">
                    <option value="featured">Featured</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="rating">Top Rated</option>
                </select>
            </div>
        </div>

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $p)
            <div class="card group"
                 x-show="active === 'all' || active === '{{ $p['category'] }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 data-price="{{ $p['price'] }}"
                 data-rating="{{ $p['rating'] }}">

                {{-- Product Visual --}}
                <div class="relative overflow-hidden" style="height:260px; background: linear-gradient(145deg, {{ $p['color_start'] }}, {{ $p['color_end'] }});">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white select-none">
                        <div class="font-bebas text-8xl opacity-10 absolute top-1/2 -translate-y-1/2">TE</div>
                        <i class="fas fa-bolt text-6xl opacity-60 drop-shadow-2xl relative z-10"></i>
                        <span class="font-bebas text-xl mt-3 tracking-wider relative z-10">{{ $p['name'] }}</span>
                        <span class="text-xs opacity-60 relative z-10 font-rajdhani mt-1">{{ $p['flavor'] }}</span>
                    </div>

                    {{-- Tag --}}
                    <div class="absolute top-3 left-3 product-tag text-white"
                         style="background: rgba(0,0,0,0.55); border-left: 2px solid #FF6B00; backdrop-filter: blur(4px);">
                        {{ $p['tag'] }}
                    </div>

                    {{-- Wishlist --}}
                    <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 flex items-center justify-center text-white/60 hover:text-[#FF6B00] hover:bg-black/70 transition-all text-sm backdrop-blur-sm">
                        <i class="fas fa-heart"></i>
                    </button>

                    {{-- Quick Add Slide-up --}}
                    <div class="absolute bottom-0 inset-x-0 bg-[#FF6B00] py-3.5 translate-y-full group-hover:translate-y-0 transition-transform duration-300 text-center">
                        <button class="font-rajdhani font-700 text-sm tracking-wider uppercase text-white w-full"
                                x-on:click="add({
                                    id: {{ $p['id'] }},
                                    name: '{{ $p['name'] }}',
                                    flavor: '{{ $p['flavor'] }}',
                                    price: {{ $p['price'] }},
                                    cs: '{{ $p['color_start'] }}',
                                    ce: '{{ $p['color_end'] }}'
                                })">
                            <i class="fas fa-shopping-bag mr-2"></i> Add to Cart
                        </button>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="p-5">
                    <div class="flex items-start justify-between mb-1">
                        <div>
                            <h3 class="font-rajdhani font-700 text-base leading-tight">{{ $p['name'] }}</h3>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $p['flavor'] }}</p>
                        </div>
                        <span class="font-bebas text-2xl text-[#FF6B00] ml-3 flex-shrink-0">${{ number_format($p['price'], 2) }}</span>
                    </div>
                    <p class="text-gray-600 text-xs font-rajdhani font-600 tracking-wider uppercase mt-1">{{ $p['size'] }}</p>
                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#1A1A1A]">
                        <div class="flex items-center gap-1.5">
                            <div class="stars text-[11px]">
                                @for($s = 0; $s < 5; $s++)
                                    <i class="fas fa-star" style="{{ $p['rating'] >= $s + 1 ? '' : 'opacity:0.2' }}"></i>
                                @endfor
                            </div>
                            <span class="text-gray-500 text-[11px]">{{ number_format($p['reviews']) }}</span>
                        </div>
                        <button class="w-8 h-8 flex items-center justify-center bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors text-gray-400 hover:text-white text-sm rounded"
                                x-on:click="add({
                                    id: {{ $p['id'] }},
                                    name: '{{ $p['name'] }}',
                                    flavor: '{{ $p['flavor'] }}',
                                    price: {{ $p['price'] }},
                                    cs: '{{ $p['color_start'] }}',
                                    ce: '{{ $p['color_end'] }}'
                                })">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty State --}}
        <div x-show="false" class="py-20 text-center">
            <i class="fas fa-search text-4xl text-[#252525] mb-4 block"></i>
            <p class="text-gray-500 font-rajdhani font-600 text-lg">No products found</p>
        </div>
    </section>

    {{-- Promo Banner --}}
    <section class="my-16 mx-5 lg:mx-auto max-w-7xl">
        <div class="relative overflow-hidden border border-[#252525] p-10 lg:p-14 flex flex-col lg:flex-row items-center gap-6 justify-between"
             style="background: linear-gradient(135deg, #111 0%, #1A0800 100%);">
            <div class="absolute right-0 top-0 bottom-0 w-64 pointer-events-none"
                 style="background: radial-gradient(ellipse at right, rgba(255,107,0,0.12), transparent 70%);"></div>
            <div class="z-10">
                <div class="section-label mb-2">Bundle &amp; Save</div>
                <h3 class="font-bebas text-4xl lg:text-5xl">BUY 3, GET 1 <span class="text-gradient">FREE</span></h3>
                <p class="text-gray-400 text-sm mt-2">Mix and match any flavors. Applied automatically at checkout.</p>
            </div>
            <a href="{{ route('products') }}" class="btn-primary flex-shrink-0 z-10">
                <span>Build My Bundle</span>
                <i class="fas fa-boxes"></i>
            </a>
        </div>
    </section>

@endsection

@section('scripts')
<script>
function shopFilters() {
    return {
        active: 'all',
        sort: 'featured'
    }
}
</script>
@endsection
