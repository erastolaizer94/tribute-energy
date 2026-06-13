<footer class="bg-[#080808] border-t border-[#181818] mt-auto">

    {{-- Newsletter Banner --}}
    <div class="border-b border-[#181818]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-14">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div>
                    <div class="section-label mb-3">Stay in the game</div>
                    <h3 class="font-bebas text-4xl lg:text-5xl">
                        JOIN THE <span class="text-gradient">TRIBUTE</span> MOVEMENT
                    </h3>
                    <p class="text-gray-500 mt-2 text-sm max-w-md">
                        Get exclusive deals, new flavor drops, and performance tips straight to your inbox.
                    </p>
                </div>
                <form class="flex w-full max-w-md gap-0" x-data="{ email: '', sent: false }"
                      x-on:submit.prevent="sent = true">
                    <input type="email" x-model="email" placeholder="Your email address"
                           class="flex-1 bg-[#111] border border-[#252525] border-r-0 px-5 py-4 text-sm font-inter text-white placeholder-gray-600 focus:outline-none focus:border-[#FF6B00] transition-colors"
                           required>
                    <button type="submit"
                            class="btn-primary !clip-path-none !rounded-none flex-shrink-0 !py-4"
                            style="clip-path: none;">
                        <span x-show="!sent">Subscribe</span>
                        <span x-show="sent"><i class="fas fa-check"></i> Done!</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-5">
                    <img src="{{ asset('logo.png') }}" alt="Tribute Energy" class="h-10 w-auto">
                    <div>
                        <span class="font-bebas text-2xl tracking-widest block leading-none">TRIBUTE</span>
                        <span class="font-rajdhani text-[10px] font-700 tracking-[4px] uppercase text-[#FF6B00] leading-none">ENERGY</span>
                    </div>
                </a>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs mb-6">
                    Premium energy supplements engineered for those who demand peak performance.
                    Clean energy. Real results. No compromises.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 text-sm">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 text-sm">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 text-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 text-sm">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 text-sm">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-rajdhani font-700 text-sm tracking-[3px] uppercase text-white mb-5">Company</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}"    class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">About Us</a></li>
                    <li><a href="{{ route('features') }}" class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Our Science</a></li>
                    <li><a href="#"                       class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Careers</a></li>
                    <li><a href="#"                       class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Press &amp; Media</a></li>
                    <li><a href="#"                       class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Partnerships</a></li>
                </ul>
            </div>

            {{-- Products --}}
            <div>
                <h4 class="font-rajdhani font-700 text-sm tracking-[3px] uppercase text-white mb-5">Products</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('products') }}" class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Energy Drinks</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Powders &amp; Mixes</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Bundle Deals</a></li>
                    <li><a href="{{ route('pricing') }}"  class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Subscriptions</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">New Arrivals</a></li>
                </ul>
            </div>

            {{-- Support & Legal --}}
            <div>
                <h4 class="font-rajdhani font-700 text-sm tracking-[3px] uppercase text-white mb-5">Support</h4>
                <ul class="space-y-3">
                    <li><a href="#"                     class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">FAQ</a></li>
                    <li><a href="#"                     class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Contact Us</a></li>
                    <li><a href="#"                     class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Shipping Info</a></li>
                    <li><a href="#"                     class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Returns</a></li>
                    <li><a href="{{ route('terms') }}"  class="text-gray-500 hover:text-[#FF6B00] text-sm transition-colors font-inter">Terms &amp; Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-[#141414]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-gray-600 text-xs font-inter">
                &copy; {{ date('Y') }} Tribute Energy. All rights reserved.
            </p>

            {{-- Payment icons --}}
            <div class="flex items-center gap-2">
                <div class="bg-[#1A1A1A] rounded px-2 py-1 text-[10px] font-rajdhani font-700 text-gray-500 tracking-wider uppercase">VISA</div>
                <div class="bg-[#1A1A1A] rounded px-2 py-1 text-[10px] font-rajdhani font-700 text-gray-500 tracking-wider uppercase">MC</div>
                <div class="bg-[#1A1A1A] rounded px-2 py-1 text-[10px] font-rajdhani font-700 text-gray-500 tracking-wider uppercase">AMEX</div>
                <div class="bg-[#1A1A1A] rounded px-2 py-1 text-[10px] font-rajdhani font-700 text-gray-500 tracking-wider uppercase">PayPal</div>
            </div>

            <div class="flex gap-5">
                <a href="{{ route('terms') }}" class="text-gray-600 hover:text-[#FF6B00] text-xs transition-colors">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="text-gray-600 hover:text-[#FF6B00] text-xs transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
