<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->take(5)->get();
        return view('user.dashboard', compact('user', 'orders'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->paginate(10);
        return view('user.orders.index', compact('orders'));
    }

    public function showOrder($id)
    {
        $user = Auth::user();
        $order = $user->orders()->with('items.product')->findOrFail($id);
        return view('user.orders.show', compact('order'));
    }

    public function offers()
    {
        $featuredProducts = \App\Models\Product::where('is_sale', true)->where('is_active', true)->get();
        return view('user.offers', compact('featuredProducts'));
    }
}
