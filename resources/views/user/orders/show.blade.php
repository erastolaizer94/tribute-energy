@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <a href="{{ route('user.orders.index') }}" class="text-orange-600 hover:text-orange-700 font-bold mb-4 inline-block text-lg">← Back to Orders</a>
    <h1 class="text-4xl font-bold text-gray-900 mb-2">Order #{{ $order->order_number }}</h1>
    <p class="text-gray-600 text-lg">Placed on {{ $order->created_at->format('M d, Y - H:i') }}</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 mb-6 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Order Items</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center gap-4 p-5 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100 hover:shadow-md transition-all duration-200">
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);">
                            <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 text-lg">{{ $item->product->name }}</div>
                            <div class="text-sm text-gray-500 font-medium">Qty: {{ $item->quantity }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-xl" style="color: #FF8C00;">TZS {{ number_format($item->subtotal) }}</div>
                            <div class="text-sm text-gray-500">TZS {{ number_format($item->price) }} each</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Shipping Information</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-gray-500 font-medium">Shipping Address</div>
                        <div class="font-bold text-gray-900 text-lg">{{ $order->shipping_address }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500 font-medium">Phone</div>
                        <div class="font-bold text-gray-900 text-lg">{{ $order->phone }}</div>
                    </div>
                    @if($order->notes)
                    <div>
                        <div class="text-sm text-gray-500 font-medium">Notes</div>
                        <div class="font-bold text-gray-900 text-lg">{{ $order->notes }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Order Summary</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-medium">Subtotal</span>
                        <span class="font-bold text-gray-900">TZS {{ number_format($order->total_amount) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-medium">Shipping</span>
                        <span class="font-bold text-gray-900">TZS 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-medium">Tax</span>
                        <span class="font-bold text-gray-900">TZS 0</span>
                    </div>
                    <div class="border-t border-orange-200 pt-4 flex justify-between">
                        <span class="font-bold text-gray-900 text-lg">Total</span>
                        <span class="font-bold text-2xl" style="color: #FF8C00;">TZS {{ number_format($order->total_amount) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 mt-6 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Order Status</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Status</span>
                        <span class="px-4 py-2 text-sm font-bold rounded-full 
                            @if($order->status == 'completed') bg-green-500 text-white
                            @elseif($order->status == 'pending') bg-yellow-500 text-white
                            @elseif($order->status == 'cancelled') bg-red-500 text-white
                            @elseif($order->status == 'processing') bg-blue-500 text-white
                            @else bg-gray-500 text-white @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Payment Status</span>
                        <span class="px-4 py-2 text-sm font-bold rounded-full 
                            @if($order->payment_status == 'paid') bg-green-500 text-white
                            @elseif($order->payment_status == 'pending') bg-yellow-500 text-white
                            @elseif($order->payment_status == 'failed') bg-red-500 text-white
                            @else bg-gray-500 text-white @endif">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 mt-6 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Order Tracking</h2>
            </div>
            <div class="p-6">
                @if($order->tracking_number)
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100">
                            <div>
                                <div class="text-sm text-gray-500 font-medium">Tracking Number</div>
                                <div class="font-bold text-gray-900 text-lg">{{ $order->tracking_number }}</div>
                            </div>
                            @if($order->carrier)
                                <div class="text-right">
                                    <div class="text-sm text-gray-500 font-medium">Carrier</div>
                                    <div class="font-bold text-gray-900 text-lg">{{ $order->carrier }}</div>
                                </div>
                            @endif
                        </div>
                        @if($order->estimated_delivery)
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-100">
                                <div>
                                    <div class="text-sm text-gray-500 font-medium">Estimated Delivery</div>
                                    <div class="font-bold text-gray-900 text-lg">{{ $order->estimated_delivery->format('M d, Y') }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-lg font-medium mb-2">Tracking not available yet</p>
                        <p class="text-sm">Your order is being processed</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 mt-6 card-hover">
            <div class="p-6 border-b border-orange-100">
                <h2 class="text-2xl font-bold text-gray-900">Order Timeline</h2>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    {{-- Order Placed --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shadow-lg bg-green-500">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900">Order Placed</div>
                            <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y - H:i') }}</div>
                        </div>
                    </div>

                    {{-- Processing --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shadow-lg @if(in_array($order->status, ['processing', 'shipped', 'delivered', 'completed'])) bg-green-500 @else bg-gray-300 @endif">
                            @if(in_array($order->status, ['processing', 'shipped', 'delivered', 'completed']))
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 @if(!in_array($order->status, ['processing', 'shipped', 'delivered', 'completed'])) text-gray-400 @endif">Processing</div>
                            <div class="text-sm text-gray-500">Your order is being prepared</div>
                        </div>
                    </div>

                    {{-- Shipped --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shadow-lg @if(in_array($order->status, ['shipped', 'delivered', 'completed'])) bg-green-500 @else bg-gray-300 @endif">
                            @if(in_array($order->status, ['shipped', 'delivered', 'completed']))
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 @if(!in_array($order->status, ['shipped', 'delivered', 'completed'])) text-gray-400 @endif">Shipped</div>
                            <div class="text-sm text-gray-500">
                                @if($order->shipped_at)
                                    {{ $order->shipped_at->format('M d, Y - H:i') }}
                                @else
                                    Not shipped yet
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Delivered --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shadow-lg @if(in_array($order->status, ['delivered', 'completed'])) bg-green-500 @else bg-gray-300 @endif">
                            @if(in_array($order->status, ['delivered', 'completed']))
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 @if(!in_array($order->status, ['delivered', 'completed'])) text-gray-400 @endif">Delivered</div>
                            <div class="text-sm text-gray-500">
                                @if($order->delivered_at)
                                    {{ $order->delivered_at->format('M d, Y - H:i') }}
                                @else
                                    Not delivered yet
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
