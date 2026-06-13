@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
            <p class="text-gray-500 mt-1">Order details and management</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Orders
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Items -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h2>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div class="flex items-center">
                            @if($item->product && $item->product->image)
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 rounded-lg object-cover mr-4">
                            @endif
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $item->product->name ?? 'Product removed' }}</h4>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }} × TZS {{ number_format($item->price, 2) }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900">TZS {{ number_format($item->subtotal, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Subtotal</span>
                        <span>TZS {{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Shipping</span>
                        <span>TZS {{ number_format($order->shipping_cost, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Tax</span>
                        <span>TZS {{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold text-gray-900">
                        <span>Total</span>
                        <span>TZS {{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Name</label>
                        <p class="mt-1 text-gray-900">{{ $order->user->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-gray-900">{{ $order->email }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1 text-gray-900">{{ $order->phone }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Shipping Address</label>
                        <p class="mt-1 text-gray-900">{{ $order->shipping_address }}</p>
                    </div>
                </div>
                @if($order->notes)
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-500">Order Notes</label>
                    <p class="mt-1 text-gray-900">{{ $order->notes }}</p>
                </div>
                @endif
            </div>

            <!-- Payments -->
            @if($order->payments->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment History</h2>
                <div class="space-y-3">
                    @foreach($order->payments as $payment)
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">{{ $payment->payment_method }}</p>
                            <p class="text-sm text-gray-500">{{ $payment->created_at->format('M d, Y H:i') }}</p>
                            @if($payment->transaction_id)
                            <p class="text-xs text-gray-400">Transaction ID: {{ $payment->transaction_id }}</p>
                            @endif
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900">TZS {{ number_format($payment->amount, 2) }}</p>
                            @switch($payment->status)
                            @case('pending')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            @break
                            @case('paid')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Paid</span>
                            @break
                            @case('failed')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Failed</span>
                            @break
                            @default
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">{{ $payment->status }}</span>
                            @endswitch
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="space-y-6">
            <!-- Order Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Status</h2>
                <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">Update Status</button>
                </form>
            </div>

            <!-- Payment Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Status</h2>
                <form action="{{ route('admin.orders.update-payment-status', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Payment Status</label>
                        <select name="payment_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Update Payment Status</button>
                </form>
            </div>

            <!-- Order Timeline -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Timeline</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 mt-2 bg-orange-600 rounded-full"></div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Order Placed</p>
                            <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    @if($order->shipped_at)
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 mt-2 bg-blue-600 rounded-full"></div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Shipped</p>
                            <p class="text-xs text-gray-500">{{ $order->shipped_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    @if($order->delivered_at)
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 mt-2 bg-green-600 rounded-full"></div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Delivered</p>
                            <p class="text-xs text-gray-500">{{ $order->delivered_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
