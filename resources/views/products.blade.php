@extends('layouts.site')

@section('title', 'Products')

@section('content')
<div class="products-page-wrapper bg-[#f8faff] min-h-screen relative overflow-hidden pb-24">
    
    {{-- Top Premium Slider Header (Dark footer-like style) --}}
    <div class="relative bg-[#0f172a] pt-32 pb-16 overflow-hidden border-b border-[#FF6B00]/10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,107,0,0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <span class="inline-block text-xs font-bold tracking-[0.2em] text-[#FF8C00] bg-[#FF8C00]/10 border border-[#FF8C00]/20 px-4 py-1.5 rounded-full uppercase mb-4">Tribute Energy Showcase</span>
                <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">
                    Real-World <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF8C00] to-[#FF6B00]">Solar Installations</span>
                </h1>
                <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto mt-3">Take a look at our highly advanced solar pumping systems, robust panel arrays, and energy storage systems installed across Tanzania.</p>
            </div>

            {{-- Swiper-like custom slide banner with many real product images --}}
            <div x-data="{ 
                active: 0,
                slides: [
                    { img: 'https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=1200', title: 'Monocrystalline Solar Arrays', desc: 'Tier-1 high-performance PV technology delivering maximum conversion efficiency under extreme tropical conditions.' },
                    { img: 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=1200', title: 'Solar Water Pumping Systems', desc: 'Sustainably irrigating crops and supplying clean, reliable drinking water to villages and farms 24/7.' },
                    { img: 'https://images.unsplash.com/photo-1620038634433-2895fe8057be?q=80&w=1200', title: 'Smart Pump Controllers & Inverters', desc: 'Smart pure-sine wave intelligent controllers featuring dual power input switching (Solar / Grid / Generator).' },
                    { img: 'https://images.unsplash.com/photo-1595246140625-573b715d11dc?q=80&w=1200', title: 'Lithium Storage Banks', desc: 'High-density LiFePO4 safety battery banks with smart BMS for constant water pump and home power support.' },
                    { img: 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1200', title: 'Agricultural Irrigation Projects', desc: 'Empowering agriculture through advanced high-discharge solar boreholes and drip irrigation solutions.' }
                ],
                next() { this.active = (this.active + 1) % this.slides.length },
                prev() { this.active = (this.active - 1 + this.slides.length) % this.slides.length },
                init() { setInterval(() => this.next(), 5500) }
            }" class="relative h-[250px] md:h-[420px] rounded-3xl overflow-hidden shadow-2xl border border-white/5 group">
                
                {{-- Slide elements --}}
                <template x-for="(slide, idx) in slides" :key="idx">
                    <div x-show="active === idx"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 scale-105"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0 w-full h-full">
                        <img :src="slide.img" :alt="slide.title" class="w-full h-full object-cover opacity-75">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a]/95 via-transparent to-transparent flex flex-col justify-end p-6 md:p-10">
                            <span class="text-[#FF8C00] font-bold text-xs tracking-wider uppercase mb-1">Live Deployment</span>
                            <h3 x-text="slide.title" class="text-white text-xl md:text-3xl font-extrabold tracking-tight mb-1 md:mb-2"></h3>
                            <p x-text="slide.desc" class="text-gray-300 text-xs md:text-sm max-w-xl font-normal leading-relaxed"></p>
                        </div>
                    </div>
                </template>

                {{-- Navigation Buttons --}}
                <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-[#0f172a]/60 backdrop-blur-md hover:bg-[#FF8C00] text-white rounded-full flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 duration-300">
                    <i class="fas fa-chevron-left text-sm"></i>
                </button>
                <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-[#0f172a]/60 backdrop-blur-md hover:bg-[#FF8C00] text-white rounded-full flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 duration-300">
                    <i class="fas fa-chevron-right text-sm"></i>
                </button>

                {{-- Indicators --}}
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-1.5">
                    <template x-for="(slide, idx) in slides" :key="idx">
                        <button @click="active = idx" 
                                :class="active === idx ? 'bg-[#FF8C00] w-6' : 'bg-white/40 w-1.5'"
                                class="h-1.5 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- Rebuilt Products Section with landing-features UI style --}}
    <div class="py-16 md:py-24 relative z-10">
        
        {{-- Background Circles and Grid precisely styled like landing-features --}}
        <div class="feat-bg-deco" aria-hidden="true">
            <div class="feat-bg-circle feat-bg-circle--1"></div>
            <div class="feat-bg-circle feat-bg-circle--2"></div>
            <div class="feat-bg-grid"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10">
            
            {{-- Landing Features Style Header --}}
            <div class="feat-header">
                <span class="feat-eyebrow">High Quality Range</span>
                <h2 class="feat-title">Powering Tanzania with<br>Our <span class="feat-title-accent">Premium Products</span></h2>
                <p class="feat-subtitle">Clean, heavy-duty solar components built for unmatched endurance. Touch any item to inspect full details and technical specs.</p>
            </div>

            {{-- Rebuilt Products Grid matching landing-features 3-column layouts --}}
            <div class="feat-grid">
                @php
                    $colors = ['blue', 'violet', 'cyan', 'orange', 'green', 'rose'];
                @endphp
                @forelse($products as $idx => $product)
                    @php
                        $themeColor = $colors[$idx % count($colors)];
                    @endphp
                    
                    {{-- Clickable entire card directing to Product Details Page --}}
                    <a href="{{ route('product.detail', $product->id) }}" 
                       class="feat-card block group hover:no-underline" 
                       data-color="{{ $themeColor }}"
                       data-aos="fade-up"
                       data-aos-delay="{{ ($idx % 3) * 100 }}">
                        
                        {{-- Image area styled beautifully inside the card with gradient backing --}}
                        <div class="feat-icon-wrap w-full h-56 rounded-2xl flex items-center justify-center p-6 mb-6 bg-gradient-to-br from-orange-50 to-amber-50 border border-gray-100 overflow-hidden relative transition-transform duration-500 group-hover:scale-[1.02]">
                            @if($product->image)
                                <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110">
                            @else
                                <svg class="w-16 h-16 text-[#FF8C00] opacity-85" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            @endif

                            {{-- Smooth glow effect --}}
                            <div class="absolute inset-0 bg-[#FF6B00]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="px-5 py-2.5 bg-white/95 text-gray-800 font-bold text-xs tracking-wider uppercase rounded-full shadow-lg transform translate-y-3 group-hover:translate-y-0 transition-all duration-300">
                                    <i class="fas fa-arrow-right text-[#FF8C00] mr-1.5"></i> Inspect Details
                                </span>
                            </div>
                        </div>

                        {{-- Product category as fine eyebrow badge --}}
                        <span class="text-[10px] font-bold tracking-wider text-[#FF8C00] uppercase mb-2 block">{{ $product->category ?? 'Solar Component' }}</span>
                        
                        {{-- Title --}}
                        <h3 class="feat-card-title text-gray-900 group-hover:text-[#FF6B00] transition-colors leading-tight mb-2 line-clamp-1">
                            {{ $product->name }}
                        </h3>
                        
                        {{-- Short Description --}}
                        <p class="feat-card-desc text-gray-500 line-clamp-2 leading-relaxed">
                            {{ $product->description ?? 'Expertly engineered solar power unit built for ultimate high efficiency and durability.' }}
                        </p>
                    </a>
                @empty
                    <div class="col-span-full text-center py-20">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">No products found in our database.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- Styling to inject exact Landing Features section aesthetic --}}
<style>
/* Background and Decos */
.feat-bg-deco { position: absolute; inset: 0; pointer-events: none; }
.feat-bg-circle {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.45;
}
.feat-bg-circle--1 {
    width: 600px; height: 600px;
    top: 100px; right: -150px;
    background: radial-gradient(circle, #fff7ed, #ffedd5);
}
.feat-bg-circle--2 {
    width: 500px; height: 500px;
    bottom: 100px; left: -100px;
    background: radial-gradient(circle, #fef3c7, #fde68a);
}
.feat-bg-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255, 140, 0, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 140, 0, 0.04) 1px, transparent 1px);
    background-size: 40px 40px;
}

.bg-grid-pattern {
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    background-size: 30px 30px;
}

/* Header styling */
.feat-header {
    text-align: center;
    margin-bottom: 4rem;
}
.feat-eyebrow {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #FF8C00;
    background: #fff7ed;
    border: 1px solid #ffedd5;
    padding: 0.35rem 1rem;
    border-radius: 100px;
    margin-bottom: 1.2rem;
}
.feat-title {
    font-size: clamp(2rem, 4vw, 2.75rem);
    font-weight: 800;
    color: #0f172a;
    line-height: 1.2;
    letter-spacing: -0.025em;
    margin-bottom: 1.1rem;
}
.feat-title-accent {
    background: linear-gradient(90deg, #FF8C00 0%, #FF6B00 60%, #FFB347 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.feat-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 580px;
    margin: 0 auto;
    line-height: 1.7;
}

/* Grid Layout */
.feat-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}
@media (max-width: 1024px) { .feat-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px) { .feat-grid { grid-template-columns: 1fr; } }

/* Card Element */
.feat-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 2rem 1.85rem 1.8rem;
    border: 1.5px solid #e2e8f0;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
}
.feat-card[data-aos] {
    opacity: 1 !important;
    transform: none !important;
}
.feat-card:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
    border-color: #ffedd5;
}

/* Card Content typography */
.feat-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 0.5rem;
    letter-spacing: -0.01em;
}
.feat-card-desc {
    font-size: 0.93rem;
    color: #64748b;
    line-height: 1.7;
    margin: 0;
}

/* Icon / Image Wrap colors precisely matching features section style */
[data-color="blue"]   .feat-icon-wrap { background: linear-gradient(135deg,#fff7ed,#ffedd5); }
[data-color="violet"] .feat-icon-wrap { background: linear-gradient(135deg,#fef3c7,#fde68a); }
[data-color="cyan"]   .feat-icon-wrap { background: linear-gradient(135deg,#ecfeff,#cffafe); }
[data-color="orange"] .feat-icon-wrap { background: linear-gradient(135deg,#fff7ed,#ffedd5); }
[data-color="green"]  .feat-icon-wrap { background: linear-gradient(135deg,#f0fdf4,#dcfce7); }
[data-color="rose"]   .feat-icon-wrap { background: linear-gradient(135deg,#fff1f2,#ffe4e6); }
</style>
@endsection

