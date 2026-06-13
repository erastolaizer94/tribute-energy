@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome back, {{ $user->name }}!</h1>
    <p class="text-gray-600 text-lg">Manage your orders and explore special offers.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="stat-card rounded-2xl p-6 shadow-lg card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-900">{{ $user->orders()->count() }}</div>
        <div class="text-gray-600 font-medium">Total Orders</div>
    </div>

    <div class="stat-card rounded-2xl p-6 shadow-lg card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg bg-green-500">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-900">{{ $user->orders()->where('status', 'completed')->count() }}</div>
        <div class="text-gray-600 font-medium">Completed Orders</div>
    </div>

    <div class="stat-card rounded-2xl p-6 shadow-lg card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg bg-blue-500">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7"/></svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-900">{{ \App\Models\Product::where('is_sale', true)->where('is_active', true)->count() }}</div>
        <div class="text-gray-600 font-medium">Active Offers</div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-orange-100 mb-8 card-hover">
    <div class="p-6 border-b border-orange-100">
        <h2 class="text-2xl font-bold text-gray-900">Recent Orders</h2>
    </div>
    <div class="p-6">
        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                <div class="flex items-center justify-between p-5 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100 hover:shadow-md transition-all duration-200">
                    <div>
                        <div class="font-bold text-gray-900 text-lg">Order #{{ $order->order_number }}</div>
                        <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-xl" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</div>
                        <span class="px-3 py-1 text-xs font-bold rounded-full 
                            @if($order->status == 'completed') bg-green-500 text-white
                            @elseif($order->status == 'pending') bg-yellow-500 text-white
                            @elseif($order->status == 'cancelled') bg-red-500 text-white
                            @else bg-gray-500 text-white @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('user.orders.index') }}" class="mt-6 inline-block px-6 py-3 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                View All Orders →
            </a>
        @else
            <div class="text-center py-12 text-gray-500">
                <svg class="w-20 h-20 mx-auto mb-4 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p class="text-lg font-medium">No orders yet</p>
                <a href="{{ route('products') }}" class="mt-4 inline-block px-6 py-3 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Start Shopping →
                </a>
            </div>
        @endif
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-orange-100 card-hover">
    <div class="p-6 border-b border-orange-100">
        <h2 class="text-2xl font-bold text-gray-900">Quick Actions</h2>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('products') }}" class="flex items-center gap-4 p-5 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100 hover:shadow-md transition-all duration-200">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">Browse Products</div>
                <div class="text-sm text-gray-500">Explore our solar products</div>
            </div>
        </a>
        <a href="{{ route('user.offers') }}" class="flex items-center gap-4 p-5 bg-gradient-to-r from-green-50 to-white rounded-xl border border-green-100 hover:shadow-md transition-all duration-200">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg bg-green-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7m0-7a2 2 0 110-4 2 2 0 010 4zm0 0v7"/></svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">Special Offers</div>
                <div class="text-sm text-gray-500">View current discounts</div>
            </div>
        </a>
        <a href="{{ route('user.profile') }}" class="flex items-center gap-4 p-5 bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-100 hover:shadow-md transition-all duration-200">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg bg-blue-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">Update Profile</div>
                <div class="text-sm text-gray-500">Manage your account details</div>
            </div>
        </a>
        <a href="{{ route('user.orders.index') }}" class="flex items-center gap-4 p-5 bg-gradient-to-r from-purple-50 to-white rounded-xl border border-purple-100 hover:shadow-md transition-all duration-200">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg bg-purple-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">Order History</div>
                <div class="text-sm text-gray-500">View past orders</div>
            </div>
        </a>
    </div>
</div>
@endsection
