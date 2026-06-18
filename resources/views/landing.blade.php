<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tribute Energy') }} - Energy Management Solution</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50":"#fff7ed",
                            "100":"#ffedd5",
                            "200":"#fed7aa",
                            "300":"#fdba74",
                            "400":"#fb923c",
                            "500":"#f97316",
                            "600":"#ea580c",
                            "700":"#c2410c",
                            "800":"#9a3412",
                            "900":"#7c2d12",
                            "950":"#431407"
                        }
                    },
                    fontFamily: {
                        'body': [
                            'Inter',
                            'ui-sans-serif',
                            'system-ui',
                            '-apple-system',
                            'system-ui',
                            'Segoe UI',
                            'Roboto',
                            'Helvetica Neue',
                            'Arial',
                            'Noto Sans',
                            'sans-serif',
                            'Apple Color Emoji',
                            'Segoe UI Emoji',
                            'Segoe UI Symbol',
                            'Noto Color Emoji'
                        ],
                        'sans': [
                            'Inter',
                            'ui-sans-serif',
                            'system-ui',
                            '-apple-system',
                            'system-ui',
                            'Segoe UI',
                            'Roboto',
                            'Helvetica Neue',
                            'Arial',
                            'Noto Sans',
                            'sans-serif',
                            'Apple Color Emoji',
                            'Segoe UI Emoji',
                            'Segoe UI Symbol',
                            'Noto Color Emoji'
                        ]
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .font-bebas { font-family: 'Bebas Neue', cursive; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }
        .text-gradient {
            background: linear-gradient(135deg, #FF6B00 0%, #FFB800 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body x-data="cartApp()" x-cloak>
    @include('partials.landing-header')
    @include('partials.landing-hero')
    @include('partials.landing-features')
    @include('partials.landing-products')
    @include('partials.landing-projects')
    @include('partials.landing-partnerships')
    @include('partials.landing-target-market')
    @include('partials.landing-advantage')
    @include('partials.landing-csr')
    @include('partials.landing-future')
    @include('partials.landing-contact')
    @include('partials.landing-footer')

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe feature cards
        document.querySelectorAll('.feat-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>

    {{-- Cart Sidebar --}}
    <div x-show="open" class="fixed inset-0 z-[60]" x-cloak>
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" x-on:click="open = false" x-transition></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-[420px] bg-white border-l border-gray-200 flex flex-col shadow-2xl"
             x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h2 class="font-bebas text-2xl tracking-widest text-gray-900">CART <span class="text-[#FF6B00]" x-text="'(' + count + ')'"></span></h2>
                <button x-on:click="open = false" class="w-9 h-9 rounded-full bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors flex items-center justify-center text-sm">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <template x-if="items.length === 0">
                    <div class="text-center py-16">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-5">
                            <i class="fas fa-shopping-bag text-2xl text-gray-300"></i>
                        </div>
                        <p class="text-gray-400 font-rajdhani font-600 text-lg mb-6">Your cart is empty</p>
                        <a href="{{ route('products') }}" x-on:click="open = false" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#FF6B00] to-[#FF8C00] text-white font-rajdhani font-700 text-sm tracking-widest uppercase rounded-full hover:shadow-lg transition-all">
                            <span>Shop Now</span> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </template>
                <template x-for="(item, i) in items" :key="i">
                    <div class="flex gap-4 p-4 bg-gray-50 border border-gray-100 group rounded-xl">
                        <div class="w-[72px] h-[72px] flex-shrink-0 flex items-center justify-center text-white font-bebas text-xl rounded-lg" :style="'background: linear-gradient(135deg,' + (item.cs || '#FF6B00') + ',' + (item.ce || '#FFB800') + ')'">TE</div>
                        <div class="flex-1 min-w-0">
                            <p class="font-rajdhani font-700 text-sm text-gray-900 truncate" x-text="item.name"></p>
                            <p class="text-gray-500 text-xs" x-text="item.flavor || ''"></p>
                            <p class="text-[#FF6B00] font-rajdhani font-bold mt-1" x-text="'TZS ' + Number(item.price).toLocaleString()"></p>
                            <div class="flex items-center gap-2 mt-2">
                                <button x-on:click="dec(i)" class="w-6 h-6 bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors text-xs flex items-center justify-center rounded">-</button>
                                <span class="font-bold text-sm w-5 text-center text-gray-900" x-text="item.qty"></span>
                                <button x-on:click="inc(i)" class="w-6 h-6 bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors text-xs flex items-center justify-center rounded">+</button>
                                <button x-on:click="remove(i)" class="ml-auto text-gray-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100"><i class="fas fa-trash text-xs"></i></button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div x-show="items.length > 0" class="p-6 border-t border-gray-100 space-y-4">
                <div class="flex justify-between items-center">
                    <span class="font-rajdhani font-700 text-base text-gray-500 tracking-wider uppercase">Total</span>
                    <span class="font-bebas text-4xl text-[#FF6B00]" x-text="'TZS ' + total.toLocaleString()"></span>
                </div>
                <a href="{{ route('checkout') }}" class="inline-flex items-center justify-center gap-3 w-full py-3.5 bg-gradient-to-r from-[#FF6B00] to-[#FF8C00] text-white font-rajdhani font-700 text-base tracking-wider rounded-xl transition-all shadow-lg hover:shadow-xl active:scale-[0.98]">
                    <span>Checkout</span> <i class="fas fa-arrow-right"></i>
                </a>
                <button x-on:click="open = false" class="inline-flex items-center justify-center gap-3 w-full py-3.5 border border-gray-200 text-gray-700 font-rajdhani font-700 text-base tracking-wider rounded-xl hover:border-[#FF6B00] hover:text-[#FF6B00] transition-all">Continue Shopping</button>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div id="te-toast" style="position:fixed; bottom:28px; right:28px; z-index:9999; background:#fff; border-left:3px solid #FF6B00; padding:14px 22px; min-width:280px; border-radius:12px; box-shadow:0 10px 40px rgba(0,0,0,0.12); transform:translateY(80px); opacity:0; transition:all 0.4s cubic-bezier(0.4,0,0.2,1); pointer-events:none;">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-[#FF6B00]"></i>
            <span id="te-toast-msg" class="font-rajdhani font-600 text-sm text-gray-800"></span>
        </div>
    </div>

    <script>
        function cartApp() {
            return {
                open: false,
                items: JSON.parse(localStorage.getItem('te_cart') || '[]'),
                get count() { return this.items.reduce((s, i) => s + i.qty, 0); },
                get total() { return this.items.reduce((s, i) => s + i.price * i.qty, 0); },
                add(product) {
                    const found = this.items.find(i => i.id === product.id);
                    if (found) { found.qty++; }
                    else { this.items.push({ ...product, qty: 1, flavor: '', cs: product.color_start || '#FF6B00', ce: product.color_end || '#FFB800' }); }
                    this.save();
                    this.toast(product.name + ' added to cart!');
                },
                inc(i)    { this.items[i].qty++; this.save(); },
                dec(i)    { if (this.items[i].qty > 1) { this.items[i].qty--; } else { this.items.splice(i, 1); } this.save(); },
                remove(i) { this.items.splice(i, 1); this.save(); },
                save()    { localStorage.setItem('te_cart', JSON.stringify(this.items)); },
                toast(msg) {
                    const el = document.getElementById('te-toast');
                    document.getElementById('te-toast-msg').textContent = msg;
                    el.style.transform = 'translateY(0)'; el.style.opacity = '1';
                    setTimeout(() => { el.style.transform = 'translateY(80px)'; el.style.opacity = '0'; }, 3200);
                }
            }
        }
    </script>
</body>
</html>
