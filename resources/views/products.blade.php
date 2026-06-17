@extends('layouts.site')

@section('title', 'Products')

@section('content')
<section class="bg-gray-50 py-8 antialiased md:py-12">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    {{-- Heading & Filters --}}
    <div class="mb-6 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-10">
      <div>
        <span class="section-label">Our Range</span>
        <h2 class="mt-2 text-4xl font-bold text-gray-900 font-bebas tracking-wide">Products</h2>
        <p class="text-sm text-gray-500 mt-1">High-quality solar energy solutions for every need</p>
      </div>
      <div class="flex items-center space-x-4">
        <button id="filterToggleBtn" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-[#FF6B00] focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto transition-colors">
          <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
          </svg>
          Filters
          <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
          </svg>
        </button>
        <button id="sortDropdownBtn" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-[#FF6B00] focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto transition-colors">
          <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
          </svg>
          Sort
          <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
          </svg>
        </button>
        {{-- Sort dropdown --}}
        <div id="sortDropdown" class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow absolute top-full right-0 mt-1">
          <ul class="p-2 text-left text-sm font-medium text-gray-500">
            <li><a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 hover:bg-gray-100 hover:text-gray-900">The most popular</a></li>
            <li><a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 hover:bg-gray-100 hover:text-gray-900">Newest</a></li>
            <li><a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 hover:bg-gray-100 hover:text-gray-900">Price: Low to High</a></li>
            <li><a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 hover:bg-gray-100 hover:text-gray-900">Price: High to Low</a></li>
          </ul>
        </div>
      </div>
    </div>

    {{-- Products Grid --}}
    <div class="mb-4 grid gap-5 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
      @forelse($products as $product)
      <div class="product-card group rounded-xl border border-gray-200 bg-white shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden"
           x-data="{ open: false }">
        {{-- Image area --}}
        <div class="relative h-56 bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center overflow-hidden cursor-pointer"
             @@click="open = true; $dispatch('open-product', { id: {{ $product->id }} })">
          @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500">
          @else
            <svg class="w-20 h-20 text-gray-300 group-hover:text-gray-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
          @endif
          {{-- Badges --}}
          <div class="absolute top-3 left-3 flex flex-col gap-1">
            @if($product->is_featured)
              <span class="px-2.5 py-0.5 text-[10px] font-bold text-white rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 shadow-sm">FEATURED</span>
            @endif
            @if($product->is_sale && $product->original_price)
              <span class="px-2.5 py-0.5 text-[10px] font-bold text-white rounded-full bg-red-500 shadow-sm">-{{ round((1 - $product->price / $product->original_price) * 100) }}%</span>
            @endif
          </div>
          @if($product->is_new)
            <span class="absolute top-3 right-3 px-2.5 py-0.5 text-[10px] font-bold text-white rounded-full bg-green-500 shadow-sm">NEW</span>
          @endif
          {{-- Quick actions overlay --}}
          <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100">
            <button @@click="open = true; $dispatch('open-product', { id: {{ $product->id }} })"
                    class="w-10 h-10 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-700 hover:text-[#FF6B00] transition-colors transform -translate-y-2 group-hover:translate-y-0 duration-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
            <button @@click="add({ id: {{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->price }} })"
                    class="w-10 h-10 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-700 hover:text-[#FF6B00] transition-colors transform translate-y-2 group-hover:translate-y-0 duration-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </button>
          </div>
        </div>
        {{-- Product Info --}}
        <div class="p-4">
          <p class="text-xs font-medium text-[#FF6B00] uppercase tracking-wider mb-1">{{ $product->category ?? 'General' }}</p>
          <a href="#" @@click.prevent="open = true; $dispatch('open-product', { id: {{ $product->id }} })"
             class="text-sm font-semibold text-gray-900 hover:text-[#FF6B00] transition-colors line-clamp-2 leading-snug">
            {{ $product->name }}
          </a>
          {{-- Rating --}}
          <div class="mt-1.5 flex items-center gap-1.5">
            <div class="flex items-center">
              @for($i = 0; $i < 5; $i++)
                @if($i < (int)($product->rating ?? 4))
                  <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                  </svg>
                @else
                  <svg class="w-3.5 h-3.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                  </svg>
                @endif
              @endfor
            </div>
            <span class="text-[11px] text-gray-400">({{ $product->reviews ?? 0 }})</span>
          </div>
          {{-- Price & Add to Cart --}}
          <div class="mt-3 flex items-center justify-between">
            <div>
              @if($product->original_price && $product->is_sale)
                <span class="text-xs text-gray-400 line-through mr-1">TZS {{ number_format($product->original_price) }}</span>
              @endif
              <p class="text-lg font-bold text-gray-900">TZS {{ number_format($product->price) }}</p>
            </div>
            <button @@click="add({ id: {{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->price }} })"
                    class="w-9 h-9 rounded-lg bg-[#FF6B00] hover:bg-[#e06000] text-white flex items-center justify-center transition-colors shadow-sm hover:shadow-md active:scale-95">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
      @empty
      <div class="col-span-full text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <p class="text-gray-500 text-lg">No products found.</p>
        <a href="{{ route('products') }}" class="mt-2 inline-block text-sm text-[#FF6B00] hover:underline">Clear filters</a>
      </div>
      @endforelse
    </div>

    @if(count($products) > 0)
    <div class="w-full text-center">
      <button type="button" class="rounded-lg border border-gray-200 bg-white px-6 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-[#FF6B00] focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 transition-colors">Show more products</button>
    </div>
    @endif
  </div>
</section>

{{-- Product Details Modal --}}
<div id="productModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
  <div class="absolute inset-0 bg-black/60" id="productModalOverlay"></div>
  <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="productModalContent">
    <button id="closeProductModal" class="absolute top-4 right-4 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-500 hover:text-gray-700 transition-colors">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
    <div class="grid md:grid-cols-2">
      <div class="relative h-72 md:h-auto bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center p-8">
        <img id="modalProductImage" class="w-full h-full object-contain hidden">
        <svg id="modalProductImagePlaceholder" class="w-32 h-32 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
      </div>
      <div class="p-6 md:p-8">
        <p id="modalProductCategory" class="text-xs font-medium text-[#FF6B00] uppercase tracking-wider mb-1"></p>
        <h2 id="modalProductName" class="text-2xl font-bold text-gray-900 mb-2"></h2>
        <div class="flex items-center gap-2 mb-4">
          <div id="modalProductStars" class="flex items-center"></div>
          <span id="modalProductReviews" class="text-sm text-gray-500"></span>
        </div>
        <div class="mb-4">
          <span id="modalProductPrice" class="text-2xl font-bold text-[#FF6B00]"></span>
          <span id="modalProductOriginalPrice" class="text-sm text-gray-400 line-through ml-2 hidden"></span>
        </div>
        <p id="modalProductDescription" class="text-gray-600 text-sm leading-relaxed mb-6"></p>
        <div id="modalProductSpecs" class="mb-6 hidden">
          <h3 class="text-sm font-semibold text-gray-900 mb-2">Specifications</h3>
          <ul id="modalProductSpecsList" class="space-y-1.5 text-sm text-gray-600"></ul>
        </div>
        <div class="flex items-center gap-3 mb-6">
          <span class="text-sm font-medium text-gray-900">Qty:</span>
          <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
            <button id="modalQtyDec" class="w-9 h-9 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 transition-colors">-</button>
            <span id="modalQtyValue" class="w-10 text-center font-semibold text-sm">1</span>
            <button id="modalQtyInc" class="w-9 h-9 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 transition-colors">+</button>
          </div>
        </div>
        <div class="flex gap-3">
          <button id="modalAddToCartBtn" class="flex-1 py-3 bg-[#FF6B00] hover:bg-[#e06000] text-white font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-md active:scale-[0.98] flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
// --- Product Modal ---
let productsCache = null;
let currentModalProduct = null;
let modalQty = 1;
const modal = document.getElementById('productModal');
const modalContent = document.getElementById('productModalContent');

function showModal() {
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  requestAnimationFrame(() => {
    modalContent.classList.remove('scale-95', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
  });
}

function hideModal() {
  modalContent.classList.remove('scale-100', 'opacity-100');
  modalContent.classList.add('scale-95', 'opacity-0');
  setTimeout(() => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }, 300);
}

document.getElementById('closeProductModal')?.addEventListener('click', hideModal);
document.getElementById('productModalOverlay')?.addEventListener('click', hideModal);

document.addEventListener('open-product', async function(e) {
  try {
    if (!productsCache) {
      const resp = await fetch('/api/products');
      productsCache = await resp.json();
    }
    const product = productsCache.find(p => p.id === e.detail.id);
    if (!product) return;
    currentModalProduct = product;
    modalQty = 1;

    // Image
    const img = document.getElementById('modalProductImage');
    const placeholder = document.getElementById('modalProductImagePlaceholder');
    if (product.image) {
      img.src = product.image.startsWith('http') ? product.image : '/' + product.image;
      img.classList.remove('hidden');
      placeholder.classList.add('hidden');
    } else {
      img.classList.add('hidden');
      placeholder.classList.remove('hidden');
    }

    document.getElementById('modalProductCategory').textContent = product.category || 'General';
    document.getElementById('modalProductName').textContent = product.name;
    document.getElementById('modalProductPrice').textContent = 'TZS ' + Number(product.price).toLocaleString();
    document.getElementById('modalProductDescription').textContent = product.description || 'No description available.';
    document.getElementById('modalQtyValue').textContent = '1';

    // Original price
    const origPrice = document.getElementById('modalProductOriginalPrice');
    if (product.original_price && product.is_sale) {
      origPrice.textContent = 'TZS ' + Number(product.original_price).toLocaleString();
      origPrice.classList.remove('hidden');
    } else {
      origPrice.classList.add('hidden');
    }

    // Stars
    const rating = Math.round(product.rating || 4);
    let starsHtml = '';
    for (let i = 0; i < 5; i++) {
      starsHtml += i < rating
        ? '<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>'
        : '<svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
    }
    document.getElementById('modalProductStars').innerHTML = starsHtml;
    document.getElementById('modalProductReviews').textContent = '(' + (product.reviews || 0) + ')';

    // Specs
    const specsContainer = document.getElementById('modalProductSpecs');
    const specsList = document.getElementById('modalProductSpecsList');
    if (product.specs && product.specs.length) {
      specsList.innerHTML = product.specs.map(s =>
        '<li class="flex items-center gap-2">' +
        '<svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">' +
        '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>' +
        '<span>' + s + '</span></li>'
      ).join('');
      specsContainer.classList.remove('hidden');
    } else {
      specsContainer.classList.add('hidden');
    }

    showModal();
  } catch (err) {
    console.error('Failed to fetch product details:', err);
  }
});

// Modal quantity
document.getElementById('modalQtyDec')?.addEventListener('click', function() {
  if (modalQty > 1) {
    modalQty--;
    document.getElementById('modalQtyValue').textContent = modalQty;
  }
});
document.getElementById('modalQtyInc')?.addEventListener('click', function() {
  if (modalQty < 99) {
    modalQty++;
    document.getElementById('modalQtyValue').textContent = modalQty;
  }
});

// Add to cart from modal
document.getElementById('modalAddToCartBtn')?.addEventListener('click', function() {
  if (!currentModalProduct) return;
  const alpineBody = document.querySelector('[x-data="cartApp()"]');
  if (alpineBody && alpineBody.__x) {
    for (let i = 0; i < modalQty; i++) {
      alpineBody.__x.$data.add({
        id: currentModalProduct.id,
        name: currentModalProduct.name,
        price: currentModalProduct.price,
        image: currentModalProduct.image
      });
    }
    hideModal();
  }
});

// --- Sort dropdown ---
document.getElementById('sortDropdownBtn')?.addEventListener('click', function(e) {
  e.stopPropagation();
  document.getElementById('sortDropdown')?.classList.toggle('hidden');
});
document.addEventListener('click', function() {
  document.getElementById('sortDropdown')?.classList.add('hidden');
});

// --- Filter modal toggle ---
document.getElementById('filterToggleBtn')?.addEventListener('click', function() {
  const m = document.getElementById('filterModal');
  if (m) {
    m.classList.toggle('hidden');
    m.classList.toggle('flex');
  }
});
</script>
@endpush
