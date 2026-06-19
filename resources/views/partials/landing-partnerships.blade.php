<section id="partnerships" class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Partnerships</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Key Partnerships</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Collaborating with leading organizations to drive sustainable development.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $partners = [
                ['type' => 'worldvision', 'name' => 'World Vision', 'desc' => 'Partnered on multiple solar water pumping projects including Karatu (2017), Kigoma (2018), and Hedaru (2016).'],
                ['type' => 'ruwasa', 'name' => 'RUWASA', 'desc' => 'Rural Water and Sanitation Authority - Long-term partner for rural water supply projects across Tanzania.'],
                ['type' => 'tanzania', 'name' => 'Government of Tanzania', 'desc' => 'Strategic partner for national water infrastructure and renewable energy initiatives.'],
            ];
            @endphp
            @foreach($partners as $p)
            <div class="partnership-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center bg-white">
                <div class="w-20 h-20 rounded-2xl mx-auto mb-5 flex items-center justify-center bg-gray-50 border border-gray-100 overflow-hidden">
                    @if($p['type'] === 'worldvision')
                        <svg viewBox="0 0 100 100" class="w-full h-full p-2" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="48" fill="#1a365d"/>
                            <path d="M50 18 L50 52 M32 32 L50 52 L68 32 M38 72 L50 52 L62 72" stroke="#ed8a19" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <circle cx="50" cy="14" r="5" fill="#ed8a19"/>
                        </svg>
                    @elseif($p['type'] === 'tanzania')
                        <svg viewBox="0 0 100 100" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 12 L85 25 L85 48 Q85 72 50 92 Q15 72 15 48 L15 25 Z" fill="#1a5c1a" stroke="#d4af37" stroke-width="2"/>
                            <path d="M17 28 Q25 32 33 28 Q41 24 50 28 L50 50 L17 50 Z" fill="#1a5c1a" opacity="0.3"/>
                            <path d="M20 35 Q28 39 36 35" stroke="#4a90d9" stroke-width="2" fill="none"/>
                            <path d="M22 42 Q30 46 38 42" stroke="#4a90d9" stroke-width="2" fill="none"/>
                            <path d="M83 28 Q75 32 67 28 Q59 24 50 28 L50 50 L83 50 Z" fill="#1a5c1a" opacity="0.3"/>
                            <line x1="67" y1="48" x2="67" y2="32" stroke="#d4af37" stroke-width="2"/>
                            <ellipse cx="67" cy="28" rx="4" ry="6" fill="#ff6b00"/>
                            <ellipse cx="67" cy="24" rx="2.5" ry="4" fill="#ffcc00"/>
                            <path d="M17 52 L50 52 L50 88 Q33 82 17 70 Z" fill="#1a5c1a" opacity="0.3"/>
                            <line x1="28" y1="58" x2="42" y2="78" stroke="#d4af37" stroke-width="3" stroke-linecap="round"/>
                            <line x1="42" y1="58" x2="28" y2="78" stroke="#d4af37" stroke-width="3" stroke-linecap="round"/>
                            <path d="M50 52 L83 52 L83 70 Q67 82 50 88 Z" fill="#1a5c1a" opacity="0.3"/>
                            <path d="M55 60 Q63 64 71 60" stroke="#4a90d9" stroke-width="2" fill="none"/>
                            <path d="M57 68 Q65 72 73 68" stroke="#4a90d9" stroke-width="2" fill="none"/>
                            <line x1="50" y1="12" x2="50" y2="92" stroke="#d4af37" stroke-width="1.5"/>
                            <line x1="15" y1="50" x2="85" y2="50" stroke="#d4af37" stroke-width="1.5"/>
                            <path d="M25 86 Q50 96 75 86" stroke="#d4af37" stroke-width="3" fill="none" stroke-linecap="round"/>
                            <text x="50" y="93" font-size="5" fill="#d4af37" text-anchor="middle" font-family="Arial,sans-serif" font-weight="bold">UHURU NA UMOJA</text>
                        </svg>
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#0f4c81] to-[#0a3a63] text-white">
                            <span class="text-[9px] font-bold tracking-wider uppercase leading-tight text-center">Rural Water<br>& Sanitation</span>
                            <span class="text-[7px] font-bold tracking-[0.15em] mt-0.5 opacity-80">AUTHORITY</span>
                        </div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $p['name'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .partnership-card {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .partnership-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.partnership-card');
    if (!cards.length) return;
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const card = entry.target;
                const idx = Array.from(cards).indexOf(card);
                setTimeout(() => card.classList.add('visible'), idx * 150);
                io.unobserve(card);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    cards.forEach(card => io.observe(card));
})();
</script>
