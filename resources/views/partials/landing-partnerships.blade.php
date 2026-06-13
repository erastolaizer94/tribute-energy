<section id="partnerships" class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Partnerships</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Key Partnerships</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Collaborating with leading organizations to drive sustainable development.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="partnership-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">World Vision</h3>
                <p class="text-gray-600 text-sm">Partnered on multiple solar water pumping projects including Karatu (2017), Kigoma (2018), and Hedaru (2016).</p>
            </div>

            <div class="partnership-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">RUWASA</h3>
                <p class="text-gray-600 text-sm">Rural Water and Sanitation Authority - Long-term partner for rural water supply projects across Tanzania.</p>
            </div>

            <div class="partnership-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Government of Tanzania</h3>
                <p class="text-gray-600 text-sm">Strategic partner for national water infrastructure and renewable energy initiatives.</p>
            </div>
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
