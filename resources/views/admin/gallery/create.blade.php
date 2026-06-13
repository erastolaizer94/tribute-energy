@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add Gallery Image</h1>
        <p class="page-description">Add a new image to the gallery</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.gallery.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter image title">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter image description"></textarea>
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                <input type="text" name="image" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="https://example.com/image.jpg">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <select name="category" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <option value="installations">Installations</option>
                    <option value="commercial">Commercial</option>
                    <option value="residential">Residential</option>
                    <option value="agricultural">Agricultural</option>
                    <option value="industrial">Industrial</option>
                    <option value="community">Community</option>
                    <option value="general">General</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Order</label>
                <input type="number" name="order" value="0" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="flex items-center gap-4 pt-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Featured</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" checked class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.gallery.index') }}" class="px-6 py-3 text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                Add Image
            </button>
        </div>
    </form>
</div>
@endsection
