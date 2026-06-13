<section id="why-choose-us" class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Why Choose Us</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Built for Modern Energy Businesses</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">We understand the challenges you face. Our platform is designed to solve real problems and help you grow.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="why-choose-item p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Lightning Fast</h3>
                <p class="text-gray-600">Optimized for speed. Process transactions in milliseconds, not seconds.</p>
            </div>

            <div class="why-choose-item p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Bank-Grade Security</h3>
                <p class="text-gray-600">Your data is protected with enterprise-level encryption and security protocols.</p>
            </div>

            <div class="why-choose-item p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Scalable Solution</h3>
                <p class="text-gray-600">From small shops to enterprise chains — we grow with your business.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .why-choose-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .why-choose-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const items = document.querySelectorAll('.why-choose-item');
    if (!items.length) return;
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const item = entry.target;
                const idx = Array.from(items).indexOf(item);
                setTimeout(() => item.classList.add('visible'), idx * 100);
                io.unobserve(item);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    items.forEach(item => io.observe(item));
})();
</script>
