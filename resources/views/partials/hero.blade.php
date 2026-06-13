<section class="relative min-h-screen flex items-center overflow-hidden">
    {{-- Hero Carousel --}}
    @if($heroSections->count() > 0)
    <div id="hero-carousel" class="absolute inset-0 w-full h-full z-0">
        @foreach($heroSections as $index => $hero)
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-index="{{ $index }}">
            {{-- Video Background if available --}}
            @if($hero->video_url)
            <video autoplay muted loop playsinline
                   class="absolute inset-0 w-full h-full object-cover opacity-25">
                <source src="{{ $hero->video_url }}" type="video/mp4">
            </video>
            @endif

            {{-- Background Image --}}
            @if($hero->background_image)
            <div class="absolute inset-0 z-0"
                 style="background: url('{{ asset($hero->background_image) }}') center/cover no-repeat; opacity: 0.3;"></div>
            @endif

            {{-- Animated gradient overlay --}}
            <div class="absolute inset-0 z-[1]"
                 style="background: linear-gradient(135deg, #0A0A0A 0%, rgba(20,8,0,0.97) 40%, rgba(255,107,0,0.06) 100%);"></div>
        </div>
        @endforeach
    </div>
    @else
    {{-- Fallback background --}}
    <div class="absolute inset-0 z-0"
         style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat; opacity: 0.2;"></div>
    <div class="absolute inset-0 z-[1]"
         style="background: linear-gradient(135deg, #0A0A0A 0%, rgba(20,8,0,0.97) 40%, rgba(255,107,0,0.06) 100%);"></div>
    @endif

    {{-- Particle canvas --}}
    <canvas id="hero-canvas" class="absolute inset-0 z-[2] pointer-events-none"></canvas>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 inset-x-0 h-40 z-[3]"
         style="background: linear-gradient(to top, #0A0A0A, transparent);"></div>

    {{-- Content --}}
    <div class="relative z-[4] max-w-7xl mx-auto px-5 lg:px-8 pt-32 pb-20">
        <div class="max-w-3xl">
            @if($heroSections->count() > 0)
            <div id="hero-content" class="transition-all duration-500">
                @foreach($heroSections as $index => $hero)
                <div class="hero-content-item {{ $index === 0 ? 'block' : 'hidden' }}" data-index="{{ $index }}">
                    <div class="section-label mb-5 animate__animated animate__fadeInDown" style="animation-delay:0.1s">
                        {{ $hero->title }}
                    </div>

                    <h1 class="font-bebas leading-[0.9] mb-6 text-glow animate__animated animate__fadeInUp" style="animation-delay:0.2s; font-size: clamp(72px, 12vw, 150px);">
                        {!! nl2br($hero->subtitle) !!}
                    </h1>

                    <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp" style="animation-delay:0.5s">
                        @if($hero->button_link)
                        <a href="{{ $hero->button_link }}" class="btn-primary">
                            <span>{{ $hero->button_text }}</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        @endif
                        <a href="{{ route('products') }}" class="btn-outline">
                            Shop Products
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Fallback content --}}
            <div class="section-label mb-5 animate__animated animate__fadeInDown" style="animation-delay:0.1s">
                Premium Energy Supplements
            </div>

            <h1 class="font-bebas leading-[0.9] mb-6 text-glow animate__animated animate__fadeInUp" style="animation-delay:0.2s; font-size: clamp(72px, 12vw, 150px);">
                FUEL<br>
                <span class="text-gradient">YOUR</span><br>
                POTENTIAL
            </h1>

            <p class="text-gray-300 text-lg leading-relaxed max-w-xl mb-10 animate__animated animate__fadeInUp" style="animation-delay:0.35s">
                Engineered for peak performance. Tribute Energy delivers clean, sustained power
                without the crash — because settling for average was never an option.
            </p>

            <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp" style="animation-delay:0.5s">
                <a href="{{ route('products') }}" class="btn-primary">
                    <span>Shop Now</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('features') }}" class="btn-outline">
                    Our Science
                    <i class="fas fa-flask"></i>
                </a>
            </div>
            @endif

            {{-- Stats --}}
            <div class="flex flex-wrap gap-10 mt-16 pt-10 border-t border-white/10 animate__animated animate__fadeInUp" style="animation-delay:0.65s">
                <div>
                    <div class="font-bebas text-5xl text-[#FF6B00] text-glow">50K+</div>
                    <div class="section-label mt-1 !text-gray-500">Happy Customers</div>
                </div>
                <div>
                    <div class="font-bebas text-5xl text-[#FF6B00] text-glow">12+</div>
                    <div class="section-label mt-1 !text-gray-500">Unique Flavors</div>
                </div>
                <div>
                    <div class="font-bebas text-5xl text-[#FF6B00] text-glow">0g</div>
                    <div class="section-label mt-1 !text-gray-500">Added Sugar</div>
                </div>
                <div>
                    <div class="font-bebas text-5xl text-[#FF6B00] text-glow">#1</div>
                    <div class="section-label mt-1 !text-gray-500">Rated Brand</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Carousel Navigation --}}
    @if($heroSections->count() > 1)
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-[4] flex items-center gap-4">
        <button id="hero-prev" class="w-10 h-10 rounded-full border border-[#FF6B00]/30 flex items-center justify-center text-[#FF6B00] hover:bg-[#FF6B00]/20 transition-colors">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div id="hero-dots" class="flex gap-2">
            @foreach($heroSections as $index => $hero)
            <button class="hero-dot w-2 h-2 rounded-full {{ $index === 0 ? 'bg-[#FF6B00]' : 'bg-gray-600' }} transition-colors" data-index="{{ $index }}"></button>
            @endforeach
        </div>
        <button id="hero-next" class="w-10 h-10 rounded-full border border-[#FF6B00]/30 flex items-center justify-center text-[#FF6B00] hover:bg-[#FF6B00]/20 transition-colors">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    @else
    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-[4] flex flex-col items-center gap-2 animate-bounce">
        <div class="w-px h-12 bg-gradient-to-b from-[#FF6B00] to-transparent"></div>
        <i class="fas fa-chevron-down text-[#FF6B00] text-xs"></i>
    </div>
    @endif

    {{-- Right decorative element --}}
    <div class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 rounded-full opacity-10 z-[2] pointer-events-none"
         style="background: radial-gradient(circle, #FF6B00 0%, transparent 70%); filter: blur(40px);"></div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<script>
(function() {
    const canvas = document.getElementById('hero-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resize() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    function Particle() {
        this.reset = function() {
            this.x    = Math.random() * canvas.width;
            this.y    = canvas.height + 10;
            this.r    = Math.random() * 1.8 + 0.3;
            this.vx   = (Math.random() - 0.5) * 0.6;
            this.vy   = -(Math.random() * 1.2 + 0.4);
            this.life = 0;
            this.max  = Math.random() * 180 + 80;
        };
        this.reset();
        this.life = Math.random() * this.max;
    }

    for (let i = 0; i < 90; i++) particles.push(new Particle());

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(function(p) {
            p.x += p.vx;
            p.y += p.vy;
            p.life++;
            if (p.life >= p.max || p.y < -10) p.reset();

            var a = (1 - p.life / p.max) * 0.55;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255,107,0,' + a + ')';
            ctx.fill();
        });

        // draw soft connection lines between nearby particles
        for (var i = 0; i < particles.length; i++) {
            for (var j = i + 1; j < particles.length; j++) {
                var dx = particles[i].x - particles[j].x;
                var dy = particles[i].y - particles[j].y;
                var d  = Math.sqrt(dx*dx + dy*dy);
                if (d < 90) {
                    ctx.beginPath();
                    ctx.strokeStyle = 'rgba(255,107,0,' + (0.04 * (1 - d/90)) + ')';
                    ctx.lineWidth = 0.5;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(draw);
    }

    window.addEventListener('resize', resize);
    resize();
    draw();

    // Hero Carousel Functionality
    const heroCarousel = document.getElementById('hero-carousel');
    const heroContent = document.getElementById('hero-content');
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroContentItems = document.querySelectorAll('.hero-content-item');
    const heroDots = document.querySelectorAll('.hero-dot');
    const heroPrev = document.getElementById('hero-prev');
    const heroNext = document.getElementById('hero-next');

    if (heroCarousel && heroSlides.length > 1) {
        let currentIndex = 0;
        let autoSlideInterval;

        function showSlide(index) {
            // Update slides
            heroSlides.forEach((slide, i) => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
                if (i === index) {
                    slide.classList.remove('opacity-0');
                    slide.classList.add('opacity-100');
                }
            });

            // Update content
            heroContentItems.forEach((item, i) => {
                item.classList.add('hidden');
                item.classList.remove('block');
                if (i === index) {
                    item.classList.remove('hidden');
                    item.classList.add('block');
                    // Re-trigger animations
                    item.classList.remove('animate__fadeInDown', 'animate__fadeInUp');
                    void item.offsetWidth; // Trigger reflow
                    item.querySelectorAll('.animate__animated').forEach(el => {
                        el.classList.add('animate__fadeInDown', 'animate__fadeInUp');
                    });
                }
            });

            // Update dots
            heroDots.forEach((dot, i) => {
                dot.classList.remove('bg-[#FF6B00]');
                dot.classList.add('bg-gray-600');
                if (i === index) {
                    dot.classList.remove('bg-gray-600');
                    dot.classList.add('bg-[#FF6B00]');
                }
            });

            currentIndex = index;
        }

        function nextSlide() {
            const nextIndex = (currentIndex + 1) % heroSlides.length;
            showSlide(nextIndex);
        }

        function prevSlide() {
            const prevIndex = (currentIndex - 1 + heroSlides.length) % heroSlides.length;
            showSlide(prevIndex);
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners
        if (heroPrev) heroPrev.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        if (heroNext) heroNext.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        heroDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(index);
                startAutoSlide();
            });
        });

        // Start auto-slide
        startAutoSlide();
    }
})();
</script>
