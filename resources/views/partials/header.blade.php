<header id="main-header"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-500"
        x-data="{ scrolled: false, mobileOpen: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 60 })"
        :class="scrolled ? 'bg-[#0A0A0A]/95 backdrop-blur-md border-b border-[#1E1E1E] shadow-2xl' : 'bg-transparent'">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                <img src="{{ asset('logo.png') }}" alt="Tribute Energy" class="h-10 w-auto object-contain">
                <div class="hidden sm:block">
                    <span class="font-bebas text-2xl tracking-widest leading-none text-white">TRIBUTE</span>
                    <span class="block font-rajdhani text-[10px] font-700 tracking-[4px] uppercase text-[#FF6B00] leading-none -mt-0.5">ENERGY</span>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active text-white' : '' }}">Home</a>
                <a href="{{ route('features') }}"
                   class="nav-link {{ request()->routeIs('features') ? 'active text-white' : '' }}">Features</a>
                <a href="{{ route('pricing') }}"
                   class="nav-link {{ request()->routeIs('pricing') ? 'active text-white' : '' }}">Pricing</a>
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active text-white' : '' }}">About</a>
            </nav>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">

                {{-- Search --}}
                <button class="hidden md:flex w-9 h-9 items-center justify-center rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] text-gray-400 hover:text-white transition-all duration-300 text-sm">
                    <i class="fas fa-search"></i>
                </button>



                {{-- Talk to Sales --}}
                @guest
                    <a href="tel:+255000000000"
                       class="hidden md:inline-flex btn-primary !py-2.5 !px-5 !text-sm">
                        <i class="fas fa-phone mr-2"></i>Talk to Sales
                    </a>
                @else
                    <div class="relative" x-data="{ userOpen: false }">
                        <button x-on:click="userOpen = !userOpen"
                                class="flex items-center gap-2 text-sm font-rajdhani font-600 text-gray-300 hover:text-white transition-colors">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#FF6B00] to-[#FFB800] flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </button>
                        <div x-show="userOpen" x-on:click.away="userOpen = false"
                             class="absolute right-0 top-12 w-48 bg-[#1A1A1A] border border-[#252525] py-2 shadow-2xl z-50"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100">
                            <a href="{{ route('home') }}" class="block px-4 py-2.5 text-sm font-rajdhani font-600 text-gray-300 hover:text-white hover:bg-[#252525] transition-colors">Dashboard</a>
                            <div class="h-px bg-[#252525] my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-rajdhani font-600 text-red-400 hover:text-red-300 hover:bg-[#252525] transition-colors">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                {{-- Hamburger --}}
                <button x-on:click="mobileOpen = !mobileOpen"
                        class="lg:hidden w-9 h-9 flex flex-col items-center justify-center gap-1.5 rounded-full bg-[#1A1A1A]">
                    <span class="block w-4.5 h-0.5 bg-white transition-all duration-300"
                          :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"></span>
                    <span class="block w-3.5 h-0.5 bg-white transition-all duration-300"
                          :class="mobileOpen ? 'opacity-0' : ''"></span>
                    <span class="block w-4.5 h-0.5 bg-white transition-all duration-300"
                          :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden bg-[#0D0D0D] border-t border-[#1E1E1E] px-5 pb-6 pt-2">
        <nav class="flex flex-col space-y-1">
            <a href="{{ route('home') }}"     class="nav-link block py-3 !text-base border-b border-[#1A1A1A] {{ request()->routeIs('home') ? 'text-white' : '' }}">Home</a>
            <a href="{{ route('features') }}" class="nav-link block py-3 !text-base border-b border-[#1A1A1A] {{ request()->routeIs('features') ? 'text-white' : '' }}">Features</a>
            <a href="{{ route('pricing') }}"  class="nav-link block py-3 !text-base border-b border-[#1A1A1A] {{ request()->routeIs('pricing') ? 'text-white' : '' }}">Pricing</a>
            <a href="{{ route('about') }}"    class="nav-link block py-3 !text-base {{ request()->routeIs('about') ? 'text-white' : '' }}">About</a>
        </nav>
        @guest
            <div class="flex gap-3 mt-5">
                <a href="tel:+255000000000" class="btn-primary flex-1 !py-3"><i class="fas fa-phone mr-2"></i>Talk to Sales</a>
            </div>
        @endguest
    </div>
</header>

{{-- Spacer to push content below fixed header --}}
<div class="h-20"></div>
<div class="-mt-20"></div>
