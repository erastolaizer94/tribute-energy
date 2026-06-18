@extends('layouts.site')

@section('title', $product->name ?? 'Product Detail')

@section('content')
<div class="product-detail-wrapper bg-[#f8faff] min-h-screen relative overflow-hidden pt-28 pb-20">
    
    {{-- Background Decoration exactly matching landing-features --}}
    <div class="feat-bg-deco" aria-hidden="true">
        <div class="feat-bg-circle feat-bg-circle--1"></div>
        <div class="feat-bg-circle feat-bg-circle--2"></div>
        <div class="feat-bg-grid"></div>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10">
        
        {{-- Breadcrumb --}}
        <nav class="flex items-center text-sm mb-10 text-gray-500 font-semibold tracking-wider uppercase" data-aos="fade-down">
            <a href="{{ route('home') }}" class="hover:text-[#FF6B00] transition-colors">Home</a>
            <span class="mx-2 text-gray-300">/</span>
            <a href="{{ route('products') }}" class="hover:text-[#FF6B00] transition-colors">Products</a>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-gray-900 font-bold">{{ $product->name }}</span>
        </nav>

        {{-- Main Detail Layout split screen --}}
        <div class="grid lg:grid-cols-12 gap-12 items-start">
            
            {{-- Left Side: Beautiful Product Image Container --}}
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="aspect-square bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl flex items-center justify-center p-8 relative group overflow-hidden">
                        @if($product->image)
                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-105">
                        @else
                            <svg class="w-24 h-24 text-[#FF8C00] opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right Side: Technical Specs & Information --}}
            <div class="lg:col-span-7 flex flex-col" data-aos="fade-left">
                
                {{-- Category Badge --}}
                <span class="feat-eyebrow mb-4 self-start">{{ $product->category ?? 'Solar Technology' }}</span>
                
                {{-- Product Title --}}
                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-3 leading-tight">
                    {{ $product->name }}
                </h1>
                
                {{-- Technical Description --}}
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 font-normal">
                    {{ $product->description ?? 'No description available for this premium solar component.' }}
                </p>

                {{-- Specs List styled as beautiful micro-feature list --}}
                @php
                    $specs = is_array($product->specs) ? $product->specs : (json_decode($product->specs, true) ?? []);
                @endphp
                @if(!empty($specs))
                    <div class="mb-8">
                        <h3 class="text-sm font-bold text-gray-900 tracking-wider uppercase mb-3 border-b border-gray-100 pb-2">Technical Specifications</h3>
                        <div class="grid sm:grid-cols-2 gap-3.5">
                            @foreach($specs as $spec)
                                <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-gray-100 shadow-xs">
                                    <span class="w-6 h-6 rounded-full bg-orange-50 flex items-center justify-center text-[#FF8C00] shrink-0 text-xs">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text-gray-700 text-xs md:text-sm font-medium">{{ $spec }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Action Panel (WhatsApp Quote Trigger + Quantity selectors inside global Alpine Cart App) --}}
                <div class="bg-white p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col sm:flex-row items-center gap-4 mt-auto">
                    
                    {{-- Quantity Selector inside Alpine.js Cart app --}}
                    <div x-data="{ qty: 1 }" class="flex items-center gap-4 shrink-0">
                        <span class="text-xs font-bold text-gray-500 tracking-wider uppercase">Qty:</span>
                        <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden bg-gray-50">
                            <button @click="if(qty > 1) qty--" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-[#FF6B00] hover:bg-gray-100 transition-colors font-bold text-sm">-</button>
                            <span x-text="qty" class="w-10 text-center font-bold text-gray-900 text-sm">1</span>
                            <button @click="qty++" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-[#FF6B00] hover:bg-gray-100 transition-colors font-bold text-sm">+</button>
                        </div>
                        
                        {{-- Add to Cart Action utilizing global layouts.site cartApp context --}}
                        <button @click="$dispatch('add-to-cart', { id: {{ $product->id }}, name: '{{ addslashes($product->name) }}', price: {{ $product->price }}, image: '{{ $product->image }}', qty: qty })" 
                                class="px-6 py-3 bg-gradient-to-r from-[#FF8C00] to-[#FF6B00] text-white font-bold text-xs tracking-wider uppercase rounded-xl hover:from-[#e06000] hover:to-[#e67e00] transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                    </div>

                    {{-- Primary Action: Direct WhatsApp Quotation Quote Request --}}
                    <a href="https://wa.me/255787822735?text=Hello+Tribute+Energy,+I+would+like+to+request+a+quote+for:+{{ urlencode($product->name) }}" 
                       target="_blank" 
                       class="w-full sm:w-auto sm:ml-auto flex items-center justify-center gap-2 px-6 py-3 border-2 border-[#25D366]/30 text-[#25D366] hover:bg-[#25D366] hover:text-white transition-all duration-300 font-bold text-xs tracking-wider uppercase rounded-xl hover:shadow-md hover:-translate-y-0.5">
                        <i class="fab fa-whatsapp text-sm"></i> Request Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Background and Decos matching landing-features */
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

/* Feature style eyebrow tag */
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
}
</style>
@endsection

