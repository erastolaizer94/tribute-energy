@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-2">My Profile</h1>
    <p class="text-gray-600 text-lg">Manage your account information and preferences.</p>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-orange-100 mb-8 card-hover">
    <div class="p-6 border-b border-orange-100">
        <h2 class="text-2xl font-bold text-gray-900">Profile Information</h2>
    </div>
    <div class="p-6">
        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" name="phone" value="{{ $user->phone }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <button type="submit" class="px-8 py-3 text-white font-bold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-orange-100 card-hover">
    <div class="p-6 border-b border-orange-100">
        <h2 class="text-2xl font-bold text-gray-900">Account Security</h2>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <div class="flex items-center justify-between p-5 bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-100 hover:shadow-md transition-all duration-200">
                <div>
                    <div class="font-bold text-gray-900 text-lg">Change Password</div>
                    <div class="text-sm text-gray-500">Update your password to keep your account secure</div>
                </div>
                <a href="{{ route('password.request') }}" class="px-6 py-3 text-white font-bold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Change Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
