@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-2">My Orders</h1>
    <p class="text-gray-600 text-lg">View and track your order history.</p>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-orange-100 card-hover">
    <div class="p-6 border-b border-orange-100">
        <h2 class="text-2xl font-bold text-gray-900">Order History</h2>
    </div>
    <div class="p-6">
        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                <div class="p-5 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100 hover:shadow-md transition-all duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <div class="font-bold text-gray-900 text-lg">Order #{{ $order->order_number }}</div>
                            <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y - H:i') }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-xl" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</div>
                            <span class="px-3 py-1 text-xs font-bold rounded-full 
                                @if($order->status == 'completed') bg-green-500 text-white
                                @elseif($order->status == 'pending') bg-yellow-500 text-white
                                @elseif($order->status == 'cancelled') bg-red-500 text-white
                                @elseif($order->status == 'processing') bg-blue-500 text-white
                                @else bg-gray-500 text-white @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600 font-medium">
                            {{ $order->items->count() }} item(s)
                        </div>
                        <a href="{{ route('user.orders.show', $order->id) }}" class="px-6 py-2 text-white font-bold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                            View Details →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $orders->links() }}
        @else
            <div class="text-center py-12 text-gray-500">
                <svg class="w-20 h-20 mx-auto mb-4 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p class="text-lg font-medium mb-2">No orders yet</p>
                <p class="text-sm mb-4">Start shopping to see your orders here</p>
                <a href="{{ route('products') }}" class="inline-block px-8 py-3 text-white font-bold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Browse Products
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
