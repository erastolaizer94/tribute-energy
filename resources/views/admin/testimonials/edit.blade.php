@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Testimonial</h1>
            <p class="text-gray-500 mt-1">Update testimonial information</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Testimonials
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name *</label>
                    <input type="text" name="name" value="{{ $testimonial->name }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="e.g., John Doe">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                    <input type="text" name="role" value="{{ $testimonial->role ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="e.g., CEO">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                    <input type="text" name="company" value="{{ $testimonial->company ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="e.g., ABC Company">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating *</label>
                    <select name="rating" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 stars)</option>
                        <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 stars)</option>
                        <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 stars)</option>
                        <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>⭐⭐ (2 stars)</option>
                        <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>⭐ (1 star)</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Content *</label>
                    <textarea name="content" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Customer testimonial text...">{{ $testimonial->content }}</textarea>
                </div>

                @if($testimonial->avatar)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Avatar</label>
                    <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded-full object-cover">
                </div>
                @endif

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Replace Avatar</label>
                    <input type="file" name="avatar" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" accept="image/*">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current avatar. PNG, JPG, GIF up to 2MB</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $testimonial->sort_order }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="0" min="0">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">Update Testimonial</button>
            </div>
        </form>
    </div>
</div>
@endsection
