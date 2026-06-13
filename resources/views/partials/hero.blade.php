<section class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Video Background --}}
    <video autoplay muted loop playsinline
           class="absolute inset-0 w-full h-full object-cover opacity-25 z-0">
        <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4">
    </video>

    {{-- Hero background image fallback --}}
    <div class="absolute inset-0 z-0"
         style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat; opacity: 0.2;"></div>

    {{-- Animated gradient overlay --}}
    <div class="absolute inset-0 z-[1]"
         style="background: linear-gradient(135deg, #0A0A0A 0%, rgba(20,8,0,0.97) 40%, rgba(255,107,0,0.06) 100%);"></div>

    {{-- Particle canvas --}}
    <canvas id="hero-canvas" class="absolute inset-0 z-[2] pointer-events-none"></canvas>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 inset-x-0 h-40 z-[3]"
         style="background: linear-gradient(to top, #0A0A0A, transparent);"></div>

    {{-- Content --}}
    <div class="relative z-[4] max-w-7xl mx-auto px-5 lg:px-8 pt-32 pb-20">
        <div class="max-w-3xl">

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

    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-[4] flex flex-col items-center gap-2 animate-bounce">
        <div class="w-px h-12 bg-gradient-to-b from-[#FF6B00] to-transparent"></div>
        <i class="fas fa-chevron-down text-[#FF6B00] text-xs"></i>
    </div>

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
})();
</script>
