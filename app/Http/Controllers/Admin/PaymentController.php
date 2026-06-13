<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order', 'user')->latest()->paginate(20);
        return view('admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $payment->load('order', 'order.items.product', 'user');
        return view('admin.payments.show', compact('payment'));
    }

    public function confirm(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'status' => 'required|in:paid,failed',
            'notes' => 'nullable|string',
        ]);

        $payment->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $payment->notes,
            'confirmed_at' => now(),
            'confirmed_by' => auth()->id(),
        ]);

        // Update order payment status if payment is confirmed
        if ($validated['status'] === 'paid') {
            $payment->order->update(['payment_status' => 'paid']);
        } elseif ($validated['status'] === 'failed') {
            $payment->order->update(['payment_status' => 'failed']);
        }

        return redirect()->route('admin.payments.show', $payment)->with('success', 'Payment status updated successfully.');
    }
}
