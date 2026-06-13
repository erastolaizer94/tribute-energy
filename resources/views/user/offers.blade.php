@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Special Offers</h1>
    <p class="text-gray-600">Exclusive discounts and deals for you.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($featuredProducts as $product)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
        <div class="relative h-48 flex items-center justify-center" style="background: {{ $product->color ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: {{ $product->color ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
                <svg class="w-12 h-12" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            @if($product->is_sale)
                <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-red-500">SALE</span>
            @endif
        </div>
        <div class="p-5">
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($product->description, 80) }}</p>
            <div class="flex items-center justify-between">
                <div>
                    @if($product->is_sale && $product->original_price)
                        <span class="text-sm text-gray-400 line-through mr-2">TZS {{ number_format($product->original_price) }}</span>
                    @endif
                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS {{ number_format($product->price) }}</span>
                </div>
                <a href="{{ route('product.detail', $product->id) }}" class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-500">
        <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7"/></svg>
        <p class="text-lg mb-2">No special offers available</p>
        <p class="text-sm">Check back later for new deals</p>
    </div>
    @endforelse
</div>
@endsection
