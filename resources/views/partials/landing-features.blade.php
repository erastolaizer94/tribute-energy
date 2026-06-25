<section id="features" class="feat-section">

    <div class="feat-bg-deco" aria-hidden="true">
        <div class="feat-bg-circle feat-bg-circle--1"></div>
        <div class="feat-bg-circle feat-bg-circle--2"></div>
        <div class="feat-bg-grid"></div>
    </div>

    <div class="feat-container">

        <div class="feat-header">
            <span class="feat-eyebrow">Our Expertise</span>
            <h2 class="feat-title">Premier Electromechanical<br><span class="feat-title-accent">Engineering Services</span></h2>
            <p class="feat-subtitle">Turnkey engineering solutions for national-scale water infrastructure, industrial pumping stations, and intelligent renewable energy systems across Tanzania.</p>
        </div>

        <div class="feat-grid">

            <div class="feat-card" data-color="blue">
                <div class="feat-icon-wrap">
                    <svg class="feat-icon-img" style="width: 36px; height: 36px; color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <h3 class="feat-card-title">Industrial & Municipal Pumping Stations</h3>
                <p class="feat-card-desc">Turnkey engineering solutions for large-scale water distribution. We specialize in the supply, installation, and commissioning of heavy-duty vertical turbine and horizontal split-case pumps, coupled with advanced pipe network configurations.</p>
            </div>

            <div class="feat-card" data-color="violet">
                <div class="feat-icon-wrap">
                    <svg class="feat-icon-img" style="width: 36px; height: 36px; color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="feat-card-title">Smart Solar Water Pumping Systems</h3>
                <p class="feat-card-desc">Sustainable, high-efficiency solar-powered water solutions tailored for community water supply authorities, agricultural irrigation, and NGOs. We integrate permanent magnet brushless technology for maximum daily water output.</p>
            </div>

            <div class="feat-card" data-color="cyan">
                <div class="feat-icon-wrap">
                    <svg class="feat-icon-img" style="width: 36px; height: 36px; color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <h3 class="feat-card-title">Automation, VFDs, & Logic Configuration</h3>
                <p class="feat-card-desc">Intelligent control systems featuring high-performance Variable Frequency Drives (VFDs) and Programmable Logic Controllers (PLCs). We deliver precision logic configuration, Modbus TCP/IP communication protocols, and Power Factor Correction (PFC) systems.</p>
            </div>

        </div>
    </div>
</section>

<style>
.feat-section {
    position: relative;
    padding: 7rem 0 8rem;
    background: #f8faff;
    overflow: hidden;
}

.feat-bg-deco { position: absolute; inset: 0; pointer-events: none; }

.feat-bg-circle {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.45;
}
.feat-bg-circle--1 {
    width: 600px; height: 600px;
    top: -200px; right: -150px;
    background: radial-gradient(circle, #fff7ed, #ffedd5);
}
.feat-bg-circle--2 {
    width: 500px; height: 500px;
    bottom: -150px; left: -100px;
    background: radial-gradient(circle, #fef3c7, #fde68a);
}
.feat-bg-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255, 140, 0, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 140, 0, 0.04) 1px, transparent 1px);
    background-size: 40px 40px;
}

.feat-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.feat-header {
    text-align: center;
    margin-bottom: 4.5rem;
}
.feat-eyebrow {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #FF8C00;
    background: #fff7ed;
    border: 1px solid #ffedd5;
    padding: 0.35rem 1rem;
    border-radius: 100px;
    margin-bottom: 1.2rem;
}
.feat-title {
    font-size: clamp(2rem, 4vw, 2.75rem);
    font-weight: 800;
    color: #0f172a;
    line-height: 1.2;
    letter-spacing: -0.025em;
    margin-bottom: 1.1rem;
}
.feat-title-accent {
    background: linear-gradient(90deg, #FF8C00 0%, #FF6B00 60%, #FFB347 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.feat-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 580px;
    margin: 0 auto;
    line-height: 1.7;
}

.feat-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.75rem;
}
@media (max-width: 900px) { .feat-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .feat-grid { grid-template-columns: 1fr; } }

/* ─── Card ───────────────────────────────────────────────── */
.feat-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 2rem 1.85rem 1.8rem;
    border: 1.5px solid #e2e8f0;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    /* entrance */
    opacity: 0;
    transform: translateY(28px);
}
.feat-card.feat-visible {
    opacity: 1;
    transform: translateY(0);
}
.feat-card.feat-visible:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
}

/* ─── Icon wrapper ───────────────────────────────────────── */
.feat-icon-wrap {
    width: 68px;
    height: 68px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.4rem;
}

[data-color="blue"]   .feat-icon-wrap { background: linear-gradient(135deg,#fff7ed,#ffedd5); }
[data-color="violet"] .feat-icon-wrap { background: linear-gradient(135deg,#fef3c7,#fde68a); }
[data-color="cyan"]   .feat-icon-wrap { background: linear-gradient(135deg,#ecfeff,#cffafe); }
[data-color="orange"] .feat-icon-wrap { background: linear-gradient(135deg,#fff7ed,#ffedd5); }
[data-color="green"]  .feat-icon-wrap { background: linear-gradient(135deg,#f0fdf4,#dcfce7); }
[data-color="rose"]   .feat-icon-wrap { background: linear-gradient(135deg,#fff1f2,#ffe4e6); }

.feat-icon-img {
    width: 36px;
    height: 36px;
    object-fit: contain;
}

/* ─── Card text ─────────────────────────────────────────── */
.feat-card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 0.6rem;
    letter-spacing: -0.01em;
}
.feat-card-desc {
    font-size: 0.93rem;
    color: #64748b;
    line-height: 1.7;
    margin: 0;
}
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.feat-card');
    if (!cards.length) return;
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const card = entry.target;
                const idx = Array.from(cards).indexOf(card);
                setTimeout(() => card.classList.add('feat-visible'), idx * 90);
                io.unobserve(card);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    cards.forEach(card => io.observe(card));
})();
</script>
