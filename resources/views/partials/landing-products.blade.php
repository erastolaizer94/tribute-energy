<section id="products" class="py-20 bg-gray-50" data-aos="fade-up">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-14">
            <span class="font-rajdhani font-700 text-[12px] tracking-[5px] uppercase text-[#FF6B00]">Shop Now</span>
            <h2 class="mt-3 text-4xl md:text-5xl font-bold text-gray-900 font-bebas tracking-wide">Featured Products</h2>
            <div class="w-16 h-1 bg-gradient-to-r from-[#FF6B00] to-[#FFB800] mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Browse our latest solar energy solutions and order directly from our store.</p>
        </div>

        @php
            $featuredProducts = \App\Models\Product::where('is_active', true)->where('is_featured', true)->latest()->take(8)->get();
        @endphp

        @if($featuredProducts->count() > 0)
        <!-- Products Carousel -->
        <div class="relative group" x-data="{ scroll: 0, maxScroll: 0 }" x-init="maxScroll = $refs.track.scrollWidth - $refs.track.clientWidth">
            <!-- Navigation Buttons -->
            <button @click="$refs.track.scrollBy({ left: -320, behavior: 'smooth' }); scroll = $refs.track.scrollLeft - 320"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center text-gray-600 hover:text-[#FF6B00] hover:shadow-xl transition-all opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0 duration-300">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button @click="$refs.track.scrollBy({ left: 320, behavior: 'smooth' }); scroll = $refs.track.scrollLeft + 320"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center text-gray-600 hover:text-[#FF6B00] hover:shadow-xl transition-all opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 duration-300">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Track -->
            <div x-ref="track" class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth pb-4 snap-x snap-mandatory"
                 style="scrollbar-width: none; -ms-overflow-style: none;">
                @foreach($featuredProducts as $product)
                <div class="flex-shrink-0 w-[280px] snap-start">
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-500 overflow-hidden group/card h-full flex flex-col">
                        <!-- Image -->
                        <div class="relative h-52 bg-gradient-to-br from-orange-50 to-amber-50 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if($product->image)
                                <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain p-4 group-hover/card:scale-110 transition-transform duration-700 ease-out">
                            @else
                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            @endif
                            <!-- Badges -->
                            @if($product->is_sale && $product->original_price)
                                <span class="absolute top-3 left-3 px-3 py-1 text-[10px] font-rajdhani font-700 text-white tracking-widest rounded-full bg-gradient-to-r from-red-500 to-rose-600 shadow-lg">-{{ round((1 - $product->price / $product->original_price) * 100) }}%</span>
                            @endif
                            @if($product->is_new)
                                <span class="absolute top-3 right-3 px-3 py-1 text-[10px] font-rajdhani font-700 text-white tracking-widest rounded-full bg-gradient-to-r from-emerald-400 to-green-500 shadow-lg">NEW</span>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="p-5 flex-1 flex flex-col text-center">
                            <span class="text-[11px] font-rajdhani font-700 text-[#FF6B00] tracking-[3px] uppercase">{{ $product->category ?? 'Solar' }}</span>
                            <h3 class="mt-1 text-base font-semibold text-gray-900 line-clamp-2 leading-snug">{{ $product->name }}</h3>

                            <!-- Rating -->
                            <div class="mt-2 flex items-center justify-center gap-1">
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < (int)($product->rating ?? 4))
                                        <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @else
                                        <svg class="w-3.5 h-3.5 text-gray-200" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endif
                                @endfor
                                <span class="text-[11px] text-gray-400 font-medium ml-1">({{ $product->reviews ?? 0 }})</span>
                            </div>

                            <div class="my-3 border-t border-gray-100"></div>

                            <!-- Price & Buy -->
                            <div class="flex items-center justify-between mt-auto">
                                <div>
                                    @if($product->original_price && $product->is_sale)
                                        <span class="text-[11px] text-gray-400 line-through mr-1">TZS {{ number_format($product->original_price) }}</span>
                                    @endif
                                    <p class="text-lg font-bold text-gradient">{{ number_format($product->price) }}<span class="text-sm font-normal text-gray-500 ml-0.5">TZS</span></p>
                                </div>
                                <button onclick="addToCartLanding({ id: {{ $product->id }}, name: '{{ addslashes($product->name) }}', price: {{ $product->price }}, image: '{{ $product->image ? (Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image)) : '' }}', color_start: '#FF6B00', color_end: '#FFB800' })"
                                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FF6B00] to-[#FF8C00] hover:from-[#e06000] hover:to-[#e67e00] text-white flex items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg active:scale-90">
                                    <i class="fas fa-shopping-cart text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <p class="text-gray-500 text-lg">No featured products yet.</p>
        </div>
        @endif

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="{{ route('products') }}" class="inline-flex items-center gap-3 px-8 py-3.5 bg-gradient-to-r from-[#FF6B00] to-[#FF8C00] text-white font-rajdhani font-700 text-sm tracking-widest uppercase rounded-full hover:from-[#e06000] hover:to-[#e67e00] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                <span>View All Products</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
function addToCartLanding(product) {
    const cart = JSON.parse(localStorage.getItem('te_cart') || '[]');
    const found = cart.find(i => i.id === product.id);
    if (found) { found.qty++; }
    else { cart.push({ ...product, qty: 1, flavor: '', cs: product.color_start, ce: product.color_end }); }
    localStorage.setItem('te_cart', JSON.stringify(cart));

    // Toast
    const toast = document.getElementById('te-toast');
    const msg = document.getElementById('te-toast-msg');
    if (toast && msg) {
        msg.textContent = product.name + ' added to cart!';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3200);
    }

    // Also update Alpine cart if present
    const alpineBody = document.querySelector('[x-data="cartApp()"]');
    if (alpineBody && alpineBody.__x) {
        alpineBody.__x.$data.items = cart;
    }
}
</script>
