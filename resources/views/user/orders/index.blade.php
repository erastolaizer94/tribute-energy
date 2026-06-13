@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">My Orders</h1>
    <p class="text-gray-600">View and track your order history.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Order History</h2>
    </div>
    <div class="p-6">
        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <div class="font-semibold text-gray-900">Order #{{ $order->order_number }}</div>
                            <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y - H:i') }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-semibold" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                @if($order->status == 'completed') bg-green-100 text-green-700
                                @elseif($order->status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                                @elseif($order->status == 'processing') bg-blue-100 text-blue-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            {{ $order->items->count() }} item(s)
                        </div>
                        <a href="{{ route('user.orders.show', $order->id) }}" class="text-orange-600 font-semibold hover:text-orange-700 text-sm">View Details →</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $orders->links() }}
        @else
            <div class="text-center py-12 text-gray-500">
                <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p class="text-lg mb-2">No orders yet</p>
                <p class="text-sm mb-4">Start shopping to see your orders here</p>
                <a href="{{ route('products') }}" class="inline-block px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Browse Products
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
