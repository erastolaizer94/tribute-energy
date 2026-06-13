@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Gallery Image</h1>
        <p class="page-description">Update gallery image information</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" required value="{{ $gallery->title }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ $gallery->description ?? '' }}</textarea>
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                <input type="text" name="image" required value="{{ $gallery->image }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <select name="category" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <option value="installations" {{ $gallery->category == 'installations' ? 'selected' : '' }}>Installations</option>
                    <option value="commercial" {{ $gallery->category == 'commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="residential" {{ $gallery->category == 'residential' ? 'selected' : '' }}>Residential</option>
                    <option value="agricultural" {{ $gallery->category == 'agricultural' ? 'selected' : '' }}>Agricultural</option>
                    <option value="industrial" {{ $gallery->category == 'industrial' ? 'selected' : '' }}>Industrial</option>
                    <option value="community" {{ $gallery->category == 'community' ? 'selected' : '' }}>Community</option>
                    <option value="general" {{ $gallery->category == 'general' ? 'selected' : '' }}>General</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Order</label>
                <input type="number" name="order" value="{{ $gallery->order }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            </div>
            
            <div class="flex items-center gap-4 pt-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" {{ $gallery->is_featured ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Featured</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" {{ $gallery->is_active ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.gallery.index') }}" class="px-6 py-3 text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                Update Image
            </button>
        </div>
    </form>
</div>
@endsection
