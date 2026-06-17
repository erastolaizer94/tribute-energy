@extends('layouts.site')

@section('title', 'Cookie Policy')
@section('meta_description', 'Tribute Energy cookie policy — how we use cookies and tracking technologies.')

@section('content')

    <section class="relative pt-32 pb-16 border-b border-gray-200 bg-white">
        <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-4">Legal</div>
            <h1 class="font-bebas text-6xl lg:text-8xl leading-none">
                COOKIE<br>
                <span class="text-gradient">POLICY</span>
            </h1>
            <div class="divider mt-4 mb-5"></div>
            <p class="text-gray-600 text-sm">Last updated: <strong class="text-gray-900">January 1, {{ date('Y') }}</strong></p>
        </div>
    </section>

    <section class="py-16 max-w-4xl mx-auto px-5 lg:px-8">
        <div class="space-y-8 text-gray-400 text-sm leading-relaxed" data-aos="fade-up">
            <p>We use cookies and similar tracking technologies to enhance your browsing experience, analyze site traffic, and personalize content.</p>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">WHAT ARE COOKIES?</h2>
                <p>Cookies are small text files stored on your device by your web browser. They help websites remember your preferences, understand how you use the site, and deliver relevant content. Most websites you visit use cookies to function properly.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">TYPES OF COOKIES WE USE</h2>
                <div class="space-y-4">
                    <div class="bg-[#111] border border-[#252525] p-5">
                        <h3 class="font-rajdhani font-700 text-sm text-white mb-2"><i class="fas fa-lock text-[#FF6B00] mr-2"></i>Essential Cookies</h3>
                        <p class="text-xs">Required for basic site functionality including shopping cart, account login, and security. These cannot be disabled. Without them, the site simply won't work as intended.</p>
                    </div>
                    <div class="bg-[#111] border border-[#252525] p-5">
                        <h3 class="font-rajdhani font-700 text-sm text-white mb-2"><i class="fas fa-chart-bar text-[#FF6B00] mr-2"></i>Analytics Cookies</h3>
                        <p class="text-xs">Help us understand how visitors interact with our site — which pages are popular, where users drop off, and how we can improve. Data is collected anonymously via Google Analytics.</p>
                    </div>
                    <div class="bg-[#111] border border-[#252525] p-5">
                        <h3 class="font-rajdhani font-700 text-sm text-white mb-2"><i class="fas fa-ad text-[#FF6B00] mr-2"></i>Marketing Cookies</h3>
                        <p class="text-xs">Used to show you relevant advertisements on other platforms and measure the effectiveness of our campaigns. You can opt out through your browser settings.</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">HOW TO CONTROL COOKIES</h2>
                <p>You can manage or disable cookies through your browser settings. Note that disabling certain cookies may affect site functionality, particularly essential cookies required for the shopping cart experience.</p>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                    $browsers = [
                        ['name' => 'Chrome', 'url' => 'https://support.google.com/chrome/answer/95647'],
                        ['name' => 'Firefox', 'url' => 'https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences'],
                        ['name' => 'Safari', 'url' => 'https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac'],
                        ['name' => 'Edge', 'url' => 'https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09'],
                    ];
                    @endphp
                    @foreach($browsers as $b)
                    <a href="{{ $b['url'] }}" target="_blank" class="bg-[#111] border border-[#252525] hover:border-[#FF6B00]/40 px-4 py-3 text-sm text-gray-400 hover:text-white transition-all flex items-center gap-2">
                        <i class="fas fa-external-link-alt text-xs text-[#FF6B00]"></i>
                        {{ $b['name'] }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#111] border border-[#252525] p-6">
                <p class="font-rajdhani font-700 text-sm text-white mb-2"><i class="fas fa-cookie-bite text-[#FF6B00] mr-2"></i>Cookie Consent</p>
                <p class="text-xs">When you first visit our site, you'll see a cookie consent banner. By clicking "Accept", you consent to the use of all cookies. You can change your preferences at any time through your browser settings.</p>
            </div>
        </div>
    </section>

@endsection
