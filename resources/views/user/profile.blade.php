@extends('layouts.user-dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">My Profile</h1>
    <p class="text-gray-600">Manage your account information and preferences.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Profile Information</h2>
    </div>
    <div class="p-6">
        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" name="phone" value="{{ $user->phone }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <button type="submit" class="px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>

<div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Account Security</h2>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div>
                    <div class="font-semibold text-gray-900">Change Password</div>
                    <div class="text-sm text-gray-500">Update your password to keep your account secure</div>
                </div>
                <a href="{{ route('password.request') }}" class="px-4 py-2 text-orange-600 font-semibold hover:text-orange-700 border border-orange-600 rounded-lg hover:bg-orange-50 transition-colors">
                    Change Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
