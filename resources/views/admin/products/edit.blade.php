@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Product</h1>
        <p class="page-description">Update product information</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                <input type="text" name="name" required value="{{ $product->name }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" required rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ $product->description }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Price (TZS)</label>
                <input type="number" name="price" required step="0.01" value="{{ $product->price }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Original Price (TZS)</label>
                <input type="number" name="original_price" step="0.01" value="{{ $product->original_price ?? '' }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Color Gradient</label>
                <input type="text" name="color" value="{{ $product->color ?? '' }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <select name="category" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <option value="solar-panels" {{ $product->category == 'solar-panels' ? 'selected' : '' }}>Solar Panels</option>
                    <option value="inverters" {{ $product->category == 'inverters' ? 'selected' : '' }}>Inverters</option>
                    <option value="batteries" {{ $product->category == 'batteries' ? 'selected' : '' }}>Batteries</option>
                    <option value="controllers" {{ $product->category == 'controllers' ? 'selected' : '' }}>Controllers</option>
                    <option value="water-pumps" {{ $product->category == 'water-pumps' ? 'selected' : '' }}>Water Pumps</option>
                    <option value="kits" {{ $product->category == 'kits' ? 'selected' : '' }}>Solar Kits</option>
                    <option value="accessories" {{ $product->category == 'accessories' ? 'selected' : '' }}>Accessories</option>
                    <option value="general" {{ $product->category == 'general' ? 'selected' : '' }}>General</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                <input type="text" name="rating" value="{{ $product->rating ?? '' }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Reviews</label>
                <input type="text" name="reviews" value="{{ $product->reviews ?? '' }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Specifications (one per line)</label>
                <textarea name="specs" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ is_array($product->specs) ? implode("\n", $product->specs) : $product->specs }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                <input type="text" name="image" value="{{ $product->image ?? '' }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="flex items-center gap-4 pt-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" {{ $product->is_featured ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Featured</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_new" {{ $product->is_new ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">New</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_sale" {{ $product->is_sale ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">On Sale</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" {{ $product->is_active ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
