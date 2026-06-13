<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gallery - {{ config('app.name', 'Tribute Energy') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
        html {
            scroll-behavior: smooth;
        }
        .gallery-item {
            cursor: pointer;
            overflow: hidden;
        }
        .gallery-item img {
            transition: transform 0.5s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .lightbox.active {
            display: flex;
        }
        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.landing-header')

    <main class="pt-20">
        {{-- Hero Section --}}
        <section class="relative py-20 overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255, 140, 0, 0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
            </div>
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Our Gallery</h1>
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto">Explore our projects, installations, and achievements through our photo gallery.</p>
                </div>
            </div>
        </section>

        {{-- Gallery Grid --}}
        <section class="py-16">
            <div class="max-w-screen-2xl mx-auto px-4 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($gallery as $item)
                    <div class="gallery-item rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 aspect-square relative">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                            <p class="text-white font-semibold">{{ $item->title }}</p>
                            @if($item->category)
                                <p class="text-white/80 text-sm">{{ $item->category }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-16" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
                <h2 class="text-3xl font-extrabold text-white mb-4">Want to See More?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Contact us to schedule a visit to our completed projects or request a custom solution for your needs.</p>
                <a href="#contact" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white rounded-xl transition-all duration-200 hover:shadow-xl hover:-translate-y-0.5" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Contact Us
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </section>
    </main>

    @include('partials.landing-footer')

    {{-- Lightbox --}}
    <div id="lightbox" class="lightbox">
        <button id="closeLightbox" class="absolute top-4 right-4 text-white text-4xl hover:text-orange-400 transition-colors">&times;</button>
        <button id="prevImage" class="absolute left-4 text-white text-4xl hover:text-orange-400 transition-colors">&larr;</button>
        <button id="nextImage" class="absolute right-4 text-white text-4xl hover:text-orange-400 transition-colors">&rarr;</button>
        <img id="lightboxImage" src="" alt="Gallery Image">
    </div>

    <script>
        // Gallery item animations
        const galleryItems = document.querySelectorAll('.gallery-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const item = entry.target;
                    const idx = Array.from(galleryItems).indexOf(item);
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, idx * 100);
                    observer.unobserve(item);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        galleryItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(item);
        });

        // Lightbox functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const closeLightbox = document.getElementById('closeLightbox');
        const prevImage = document.getElementById('prevImage');
        const nextImage = document.getElementById('nextImage');
        let currentIndex = 0;

        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                lightbox.classList.add('active');
            });
        });

        closeLightbox.addEventListener('click', () => {
            lightbox.classList.remove('active');
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });

        prevImage.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        });

        nextImage.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % galleryItems.length;
        });

        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('active')) {
                if (e.key === 'Escape') {
                    lightbox.classList.remove('active');
                } else if (e.key === 'ArrowLeft') {
                    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
                } else if (e.key === 'ArrowRight') {
                    currentIndex = (currentIndex + 1) % galleryItems.length;
                }
            }
        });
    </script>
</body>
</html>
