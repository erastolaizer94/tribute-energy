@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Payment Details</h1>
            <p class="text-gray-500 mt-1">Payment #{{ $payment->transaction_id ?? 'N/A' }}</p>
        </div>
        <a href="{{ route('admin.payments.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Payments
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <!-- Payment Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Transaction ID</label>
                        <p class="mt-1 text-gray-900">{{ $payment->transaction_id ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Payment Method</label>
                        <p class="mt-1 text-gray-900">{{ ucfirst($payment->payment_method) }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Amount</label>
                        <p class="mt-1 text-2xl font-bold text-gray-900">TZS {{ number_format($payment->amount, 2) }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Status</label>
                        <p class="mt-1">
                            @switch($payment->status)
                            @case('pending')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            @break
                            @case('paid')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Paid</span>
                            @break
                            @case('failed')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Failed</span>
                            @break
                            @case('refunded')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Refunded</span>
                            @break
                            @default
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">{{ $payment->status }}</span>
                            @endswitch
                        </p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Date</label>
                        <p class="mt-1 text-gray-900">{{ $payment->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    @if($payment->confirmed_at)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Confirmed At</label>
                        <p class="mt-1 text-gray-900">{{ $payment->confirmed_at->format('M d, Y H:i') }}</p>
                    </div>
                    @endif
                </div>
                @if($payment->notes)
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-500">Notes</label>
                    <p class="mt-1 text-gray-900">{{ $payment->notes }}</p>
                </div>
                @endif
            </div>

            <!-- Order Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Order Number</label>
                        <p class="mt-1 text-gray-900">{{ $payment->order->order_number }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Order Total</label>
                        <p class="mt-1 text-gray-900">TZS {{ number_format($payment->order->total_amount, 2) }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Order Status</label>
                        <p class="mt-1 text-gray-900">{{ ucfirst($payment->order->status) }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Payment Status</label>
                        <p class="mt-1 text-gray-900">{{ ucfirst($payment->order->payment_status) }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.orders.show', $payment->order) }}" class="inline-flex items-center text-blue-600 hover:text-blue-900">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        View Order Details
                    </a>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h2>
                <div class="space-y-3">
                    @foreach($payment->order->items as $item)
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center">
                            @if($item->product && $item->product->image)
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 rounded-lg object-cover mr-3">
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
            </div>
        </div>

        <div class="space-y-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Name</label>
                        <p class="mt-1 text-gray-900">{{ $payment->user->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-gray-900">{{ $payment->user->email ?? $payment->order->email }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1 text-gray-900">{{ $payment->order->phone }}</p>
                    </div>
                </div>
            </div>

            <!-- Payment Proof -->
            @if($payment->payment_proof)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Proof</h2>
                <div class="mt-2">
                    <img src="{{ asset($payment->payment_proof) }}" alt="Payment Proof" class="w-full rounded-lg">
                </div>
            </div>
            @endif

            <!-- Confirm Payment -->
            @if($payment->status === 'pending')
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Confirm Payment</h2>
                <form action="{{ route('admin.payments.confirm', $payment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="paid">Confirm as Paid</option>
                            <option value="failed">Mark as Failed</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                        <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Add any notes about this payment...">{{ $payment->notes }}</textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">Update Payment Status</button>
                </form>
            </div>
            @endif

            <!-- Confirmation Details -->
            @if($payment->confirmed_by)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Confirmation Details</h2>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Confirmed By</label>
                        <p class="mt-1 text-gray-900">{{ $payment->confirmedBy->name }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Confirmed At</label>
                        <p class="mt-1 text-gray-900">{{ $payment->confirmed_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
