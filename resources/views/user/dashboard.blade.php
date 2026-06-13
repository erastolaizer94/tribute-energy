@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ $user->name }}!</h1>
    <p class="text-gray-600">Manage your orders and explore special offers.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-900">{{ $user->orders()->count() }}</div>
        <div class="text-gray-500 text-sm">Total Orders</div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-green-100">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-900">{{ $user->orders()->where('status', 'completed')->count() }}</div>
        <div class="text-gray-500 text-sm">Completed Orders</div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-blue-100">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7"/></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-900">{{ \App\Models\Product::where('is_sale', true)->where('is_active', true)->count() }}</div>
        <div class="text-gray-500 text-sm">Active Offers</div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-8">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Recent Orders</h2>
    </div>
    <div class="p-6">
        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <div class="font-semibold text-gray-900">Order #{{ $order->order_number }}</div>
                        <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="text-right">
                        <div class="font-semibold" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            @if($order->status == 'completed') bg-green-100 text-green-700
                            @elseif($order->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('user.orders.index') }}" class="mt-4 inline-block text-orange-600 font-semibold hover:text-orange-700">View All Orders →</a>
        @else
            <div class="text-center py-8 text-gray-500">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p>No orders yet</p>
                <a href="{{ route('products') }}" class="mt-2 inline-block text-orange-600 font-semibold hover:text-orange-700">Start Shopping →</a>
            </div>
        @endif
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Quick Actions</h2>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('products') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <div>
                <div class="font-semibold text-gray-900">Browse Products</div>
                <div class="text-sm text-gray-500">Explore our solar products</div>
            </div>
        </a>
        <a href="{{ route('user.offers') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-green-100">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7"/></svg>
            </div>
            <div>
                <div class="font-semibold text-gray-900">Special Offers</div>
                <div class="text-sm text-gray-500">View current discounts</div>
            </div>
        </a>
        <a href="{{ route('user.profile') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-blue-100">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <div class="font-semibold text-gray-900">Update Profile</div>
                <div class="text-sm text-gray-500">Manage your account details</div>
            </div>
        </a>
        <a href="{{ route('user.orders.index') }}" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-purple-100">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <div>
                <div class="font-semibold text-gray-900">Order History</div>
                <div class="text-sm text-gray-500">View past orders</div>
            </div>
        </a>
    </div>
</div>
@endsection
