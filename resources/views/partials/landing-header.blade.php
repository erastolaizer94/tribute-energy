<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="bg-blue-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('info') }}</div>
    @endif
    <nav class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-[68px]">

            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
                <img src="{{ asset('logo.png') }}" alt="Tribute Energy Logo" class="h-12 w-auto object-contain">
            </a>

            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="nav-link px-4 py-2 {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('features') }}" class="nav-link px-4 py-2 {{ request()->routeIs('features') ? 'active' : '' }}">Features</a>
                <a href="{{ route('products') }}" class="nav-link px-4 py-2 {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                <a href="{{ route('projects') }}" class="nav-link px-4 py-2 {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('gallery') }}" class="nav-link px-4 py-2 {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('partners') }}" class="nav-link px-4 py-2 {{ request()->routeIs('partners') ? 'active' : '' }}">Partners</a>
                <a href="{{ route('contact') }}" class="nav-link px-4 py-2 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </div>

            <div class="flex items-center space-x-1">
                <a href="tel:+255713808848" class="hidden lg:flex items-center space-x-1.5 px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>+255 713 808 848</span>
                </a>

                <button x-on:click="open = !open" class="relative p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-shopping-bag text-lg"></i>
                    <span x-show="count > 0" class="absolute -top-0.5 -right-0.5 w-5 h-5 bg-[#FF6B00] text-white text-[10px] font-bold rounded-full flex items-center justify-center" x-text="count"></span>
                </button>

                <div class="hidden md:block w-px h-5 bg-gray-200 mx-1"></div>

                @auth
                    <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Sign In</a>
                    <a href="tel:+255713808848" class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ml-1 flex items-center gap-1.5" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Talk to Sales
                    </a>
                @endauth

                <button id="mobileMenuToggle" type="button" class="md:hidden p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors ml-1">
                    <svg class="w-5 h-5" id="menu-open-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-5 h-5 hidden" id="menu-close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="md:hidden hidden pb-4 border-t border-gray-100 mt-1" id="mobile-menu">
            <div class="pt-3 space-y-1">
                <a href="{{ route('home') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('features') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('features') ? 'active' : '' }}">Features</a>
                <a href="{{ route('products') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('products') ? 'active' : '' }}"><span class="flex items-center gap-2">Products <span class="text-[10px] font-rajdhani font-700 text-[#FF6B00] tracking-widest">LIVE</span></span></a>
                <a href="{{ route('projects') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('gallery') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('partners') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('partners') ? 'active' : '' }}">Partners</a>
                <a href="{{ route('contact') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                @auth
                    <div class="pt-2 border-t border-gray-100 space-y-1">
                        <a href="{{ route('user.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="pt-2 border-t border-gray-100">
                        <a href="tel:+255713808848" class="flex items-center justify-center gap-1.5 py-2.5 text-sm font-semibold text-white rounded-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Talk to Sales
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

<script>
(function(){
    var toggle = document.getElementById('mobileMenuToggle');
    var menu = document.getElementById('mobile-menu');
    var openIcon = document.getElementById('menu-open-icon');
    var closeIcon = document.getElementById('menu-close-icon');
    toggle && toggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
    menu && menu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            menu.classList.add('hidden');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });
    var header = document.getElementById('main-header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 10) {
            header.classList.add('shadow-md');
            header.classList.remove('shadow-sm');
        } else {
            header.classList.remove('shadow-md');
            header.classList.add('shadow-sm');
        }
    }, { passive: true });
})();
</script>
