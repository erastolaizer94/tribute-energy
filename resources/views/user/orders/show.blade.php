@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <a href="{{ route('user.orders.index') }}" class="text-orange-600 hover:text-orange-700 font-semibold mb-4 inline-block">← Back to Orders</a>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Order #{{ $order->order_number }}</h1>
    <p class="text-gray-600">Placed on {{ $order->created_at->format('M d, Y - H:i') }}</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-900">Order Items</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);">
                            <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">{{ $item->product->name }}</div>
                            <div class="text-sm text-gray-500">Qty: {{ $item->quantity }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-semibold" style="color: #FF8C00;">TZS {{ number_format($item->subtotal) }}</div>
                            <div class="text-sm text-gray-500">TZS {{ number_format($item->price) }} each</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-900">Shipping Information</h2>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div>
                        <div class="text-sm text-gray-500">Shipping Address</div>
                        <div class="font-semibold text-gray-900">{{ $order->shipping_address }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Phone</div>
                        <div class="font-semibold text-gray-900">{{ $order->phone }}</div>
                    </div>
                    @if($order->notes)
                    <div>
                        <div class="text-sm text-gray-500">Notes</div>
                        <div class="font-semibold text-gray-900">{{ $order->notes }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-900">Order Summary</h2>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold text-gray-900">TZS {{ number_format($order->total_amount) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-semibold text-gray-900">TZS 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-semibold text-gray-900">TZS 0</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3 flex justify-between">
                        <span class="font-bold text-gray-900">Total</span>
                        <span class="font-bold text-xl" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mt-6">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-900">Order Status</h2>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Status</span>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full 
                            @if($order->status == 'completed') bg-green-100 text-green-700
                            @elseif($order->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                            @elseif($order->status == 'processing') bg-blue-100 text-blue-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Payment Status</span>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full 
                            @if($order->payment_status == 'paid') bg-green-100 text-green-700
                            @elseif($order->payment_status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->payment_status == 'failed') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
