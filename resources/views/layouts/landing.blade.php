<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Tribute Energy — Premium energy supplements engineered for peak performance. Fuel your potential.')">
    <title>@yield('title', 'Home') | Tribute Energy</title>

    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;800&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        bebas: ['"Bebas Neue"', 'cursive'],
                        rajdhani: ['Rajdhani', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --orange: #FF6B00;
            --gold:   #FFB800;
            --dark:   #0A0A0A;
            --card:   #111111;
            --surf:   #1A1A1A;
            --bdr:    #252525;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: #fff;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar { width: 3px; }
        ::-webkit-scrollbar-track { background: var(--dark); }
        ::-webkit-scrollbar-thumb { background: var(--orange); border-radius: 4px; }

        /* Typography helpers */
        .font-bebas   { font-family: 'Bebas Neue', cursive; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }

        /* Gradient text */
        .text-gradient {
            background: linear-gradient(135deg, #FF6B00 0%, #FFB800 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Section label */
        .section-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--orange);
        }

        /* Buttons */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 34px;
            background: linear-gradient(135deg, #FF6B00, #FF9000);
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            cursor: pointer;
            clip-path: polygon(10px 0%, 100% 0%, calc(100% - 10px) 100%, 0% 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #FF9000, #FFB800);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 40px rgba(255,107,0,0.45); }
        .btn-primary span, .btn-primary i { position: relative; z-index: 1; }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 34px;
            background: transparent;
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border: 1.5px solid rgba(255,107,0,0.5);
            cursor: pointer;
            clip-path: polygon(10px 0%, 100% 0%, calc(100% - 10px) 100%, 0% 100%);
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            border-color: var(--orange);
            background: rgba(255,107,0,0.1);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255,107,0,0.2);
        }

        /* Cards */
        .card {
            background: var(--card);
            border: 1px solid var(--bdr);
            transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .card:hover {
            border-color: rgba(255,107,0,0.45);
            transform: translateY(-6px);
            box-shadow: 0 24px 60px rgba(255,107,0,0.12);
        }

        /* Nav link underline animation */
        .nav-link {
            position: relative;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            transition: color 0.25s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px; left: 0;
            width: 0; height: 2px;
            background: var(--orange);
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: #fff; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .nav-link.active { color: #fff; }

        /* Cart sidebar */
        .cart-panel {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .cart-panel.open { transform: translateX(0); }

        /* Toast */
        #te-toast {
            position: fixed;
            bottom: 28px; right: 28px;
            z-index: 9999;
            background: var(--surf);
            border-left: 3px solid var(--orange);
            padding: 14px 22px;
            min-width: 280px;
            transform: translateY(80px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            pointer-events: none;
        }
        #te-toast.show { transform: translateY(0); opacity: 1; }

        /* Glow effects */
        .glow-orange { box-shadow: 0 0 40px rgba(255,107,0,0.25); }
        .text-glow   { text-shadow: 0 0 40px rgba(255,107,0,0.5); }

        /* Stars */
        .stars { color: #FFB800; font-size: 12px; letter-spacing: 1px; }

        /* Tag badges */
        .product-tag {
            font-family: 'Rajdhani', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 3px 10px;
        }

        [x-cloak] { display: none !important; }

        /* Animated gradient background for hero fallback */
        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Divider line */
        .divider {
            width: 60px; height: 3px;
            background: linear-gradient(90deg, var(--orange), var(--gold));
            margin: 16px 0;
        }
    </style>

    @yield('head')
</head>
<body x-data="cartApp()" x-cloak class="bg-[#0A0A0A] text-white font-inter antialiased">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Cart Sidebar --}}
    <div x-show="open" class="fixed inset-0 z-[60]" x-cloak>
        <div class="absolute inset-0 bg-black/75 backdrop-blur-sm"
             x-on:click="open = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"></div>

        <div class="absolute right-0 top-0 h-full w-full max-w-[420px] bg-[#0F0F0F] border-l border-[#252525] flex flex-col cart-panel"
             :class="{'open': open}">

            <div class="flex items-center justify-between p-6 border-b border-[#252525]">
                <h2 class="font-bebas text-2xl tracking-widest">
                    CART <span class="text-[#FF6B00]" x-text="'(' + count + ')'"></span>
                </h2>
                <button x-on:click="open = false"
                        class="w-9 h-9 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors flex items-center justify-center text-sm">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <template x-if="items.length === 0">
                    <div class="text-center py-16">
                        <div class="w-16 h-16 rounded-full bg-[#1A1A1A] flex items-center justify-center mx-auto mb-5">
                            <i class="fas fa-shopping-bag text-2xl text-[#333]"></i>
                        </div>
                        <p class="text-gray-500 font-rajdhani font-600 text-lg mb-6">Your cart is empty</p>
                        <a href="{{ route('products') }}" x-on:click="open = false" class="btn-primary">
                            <span>Shop Now</span> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </template>

                <template x-for="(item, i) in items" :key="i">
                    <div class="flex gap-4 p-4 bg-[#1A1A1A] border border-[#252525] group">
                        <div class="w-18 h-18 flex-shrink-0 w-[72px] h-[72px] flex items-center justify-center text-white font-bebas text-xl"
                             :style="'background: linear-gradient(135deg,' + item.cs + ',' + item.ce + ')'">
                            TE
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-rajdhani font-700 text-sm truncate" x-text="item.name"></p>
                            <p class="text-gray-400 text-xs" x-text="item.flavor"></p>
                            <p class="text-[#FF6B00] font-rajdhani font-bold mt-1" x-text="'$' + item.price.toFixed(2)"></p>
                            <div class="flex items-center gap-2 mt-2">
                                <button x-on:click="dec(i)"
                                        class="w-6 h-6 bg-[#252525] hover:bg-[#FF6B00] transition-colors text-xs flex items-center justify-center">−</button>
                                <span class="font-bold text-sm w-5 text-center" x-text="item.qty"></span>
                                <button x-on:click="inc(i)"
                                        class="w-6 h-6 bg-[#252525] hover:bg-[#FF6B00] transition-colors text-xs flex items-center justify-center">+</button>
                                <button x-on:click="remove(i)"
                                        class="ml-auto text-gray-600 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="items.length > 0" class="p-6 border-t border-[#252525] space-y-4">
                <div class="flex justify-between items-center">
                    <span class="font-rajdhani font-700 text-base text-gray-400 tracking-wider uppercase">Total</span>
                    <span class="font-bebas text-4xl text-[#FF6B00]" x-text="'$' + total.toFixed(2)"></span>
                </div>
                <a href="{{ route('login') }}" class="btn-primary w-full">
                    <span>Checkout</span> <i class="fas fa-arrow-right"></i>
                </a>
                <button x-on:click="open = false" class="btn-outline w-full">Continue Shopping</button>
            </div>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div id="te-toast">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-[#FF6B00]"></i>
            <span id="te-toast-msg" class="font-rajdhani font-600 text-sm"></span>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 750, once: true, easing: 'ease-out-cubic', offset: 60 });

        function cartApp() {
            return {
                open: false,
                items: JSON.parse(localStorage.getItem('te_cart') || '[]'),

                get count() { return this.items.reduce((s, i) => s + i.qty, 0); },
                get total() { return this.items.reduce((s, i) => s + i.price * i.qty, 0); },

                add(product) {
                    const found = this.items.find(i => i.id === product.id);
                    if (found) { found.qty++; }
                    else { this.items.push({ ...product, qty: 1 }); }
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
                    el.classList.add('show');
                    setTimeout(() => el.classList.remove('show'), 3200);
                }
            }
        }
    </script>

    @yield('scripts')
</body>
</html>
