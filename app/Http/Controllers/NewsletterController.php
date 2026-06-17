<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);

        NewsletterSubscription::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Welcome to the Tribute Movement! Check your inbox for exclusive deals.',
        ]);
    }
}
