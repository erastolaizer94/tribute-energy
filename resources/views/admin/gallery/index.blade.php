@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Gallery</h1>
        <p class="page-description">Manage your gallery images</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="px-4 py-2 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
        Add Image
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Image</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Title</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Category</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Order</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gallery as $item)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-3 px-4">
                        <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-medium text-gray-900">{{ $item->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($item->description, 40) }}</div>
                    </td>
                    <td class="py-3 px-4 text-gray-600">{{ $item->category ?? 'General' }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $item->order }}</td>
                    <td class="py-3 px-4">
                        @if($item->is_active)
                            <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Inactive</span>
                        @endif
                        @if($item->is_featured)
                            <span class="ml-2 px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Featured</span>
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $item) }}" class="px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm font-medium text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">No gallery items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
