<footer class="te-footer">
    <div class="te-footer-container">

        {{-- Brand --}}
        <div class="te-footer-brand">
            <a href="{{ route('home') }}" class="te-footer-logo-link">
                <img src="{{ asset('logo.png') }}" alt="Tribute Energy" class="te-footer-logo">
                <span class="te-footer-logo-text">TRIBUTE <small>ENERGY</small></span>
            </a>
            <p class="te-footer-desc">
                Premium energy supplements engineered for those who demand peak performance.
                Clean energy. Real results. No compromises.
            </p>
            <div class="te-footer-socials">
                <a href="#" class="te-social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="te-social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="te-social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="te-social-link"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="te-social-link"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        {{-- Navigation Grid --}}
        <div class="te-footer-nav">
            <a href="{{ route('home') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-home"></i></span>
                <span class="te-nav-label">Home</span>
            </a>
            <a href="{{ route('features') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-flask"></i></span>
                <span class="te-nav-label">Features</span>
            </a>
            <a href="{{ route('products') }}" class="te-nav-item te-nav-item--hot">
                <span class="te-nav-icon"><i class="fas fa-fire"></i></span>
                <span class="te-nav-label">Products</span>
            </a>
            <a href="{{ route('projects') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-cubes"></i></span>
                <span class="te-nav-label">Projects</span>
            </a>
            <a href="{{ route('gallery') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-images"></i></span>
                <span class="te-nav-label">Gallery</span>
            </a>
            <a href="{{ route('partners') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-handshake"></i></span>
                <span class="te-nav-label">Partners</span>
            </a>
            <a href="{{ route('contact') }}" class="te-nav-item">
                <span class="te-nav-icon"><i class="fas fa-envelope"></i></span>
                <span class="te-nav-label">Contact</span>
            </a>
        </div>

        {{-- Bottom --}}
        <div class="te-footer-bottom">
            <p class="te-footer-copy">
                &copy; {{ date('Y') }} Tribute Energy. All rights reserved.
            </p>
            <div class="te-footer-legal">
                <a href="{{ route('privacy') }}">Privacy</a>
                <a href="{{ route('terms') }}">Terms</a>
            </div>
        </div>
    </div>
</footer>

<style>
.te-footer {
    background: #0a0a0a;
    border-top: 1px solid rgba(255,107,0,0.08);
    padding: 48px 0 20px;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.te-footer::before {
    content: '';
    position: absolute;
    top: -200px;
    right: -200px;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255,107,0,0.04) 0%, transparent 70%);
    pointer-events: none;
}
.te-footer-container {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}

/* Brand */
.te-footer-logo-link {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    margin-bottom: 16px;
}
.te-footer-logo {
    height: 36px;
    width: auto;
}
.te-footer-logo-text {
    font-family: 'Bebas Neue', cursive;
    font-size: 1.4rem;
    letter-spacing: 2px;
    color: #fff;
    line-height: 1;
}
.te-footer-logo-text small {
    display: block;
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.55rem;
    font-weight: 700;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: #FF6B00;
    line-height: 1;
}
.te-footer-desc {
    font-size: 0.85rem;
    line-height: 1.7;
    color: rgba(255,255,255,0.4);
    max-width: 36ch;
    margin-bottom: 0;
}

/* Socials */
.te-footer-socials {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}
.te-social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: rgba(255,255,255,0.04);
    color: rgba(255,255,255,0.4);
    border: 1px solid rgba(255,255,255,0.06);
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.25s;
}
.te-social-link:hover {
    background: #FF6B00;
    color: #fff;
    transform: translateY(-2px);
    border-color: #FF6B00;
}

/* Navigation Grid */
.te-footer-nav {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
    margin: 40px 0;
    padding: 32px 0;
    border-top: 1px solid rgba(255,255,255,0.04);
    border-bottom: 1px solid rgba(255,255,255,0.04);
}
.te-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 20px 12px;
    border-radius: 16px;
    text-decoration: none;
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.04);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}
.te-nav-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,107,0,0.1), rgba(255,180,0,0.05));
    opacity: 0;
    transition: opacity 0.35s;
    border-radius: 16px;
}
.te-nav-item:hover::before {
    opacity: 1;
}
.te-nav-item:hover {
    border-color: rgba(255,107,0,0.3);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(255,107,0,0.15);
}
.te-nav-item:active {
    transform: translateY(-1px);
}
.te-nav-item--hot .te-nav-icon {
    background: linear-gradient(135deg, rgba(255,107,0,0.2), rgba(255,180,0,0.15));
    border-color: rgba(255,107,0,0.3);
    color: #FF6B00;
    box-shadow: 0 0 20px rgba(255,107,0,0.15);
}
.te-nav-item--hot:hover .te-nav-icon {
    box-shadow: 0 8px 30px rgba(255,107,0,0.5), 0 0 60px rgba(255,107,0,0.2);
}
.te-nav-item--hot:hover {
    box-shadow: 0 12px 40px rgba(255,107,0,0.25), 0 0 80px rgba(255,107,0,0.08);
}
.te-nav-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    background: rgba(255,107,0,0.1);
    color: rgba(255,255,255,0.5);
    border: 1px solid rgba(255,255,255,0.06);
    transition: all 0.35s;
    position: relative;
    z-index: 1;
}
.te-nav-item:hover .te-nav-icon {
    background: linear-gradient(135deg, #FF6B00, #FF9000);
    color: #fff;
    border-color: #FF6B00;
    box-shadow: 0 8px 24px rgba(255,107,0,0.3);
    transform: scale(1.05);
}
.te-nav-label {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.35);
    transition: color 0.35s;
    position: relative;
    z-index: 1;
}
.te-nav-item:hover .te-nav-label {
    color: #fff;
}

/* Bottom */
.te-footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}
.te-footer-copy {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.25);
}
.te-footer-legal {
    display: flex;
    gap: 20px;
}
.te-footer-legal a {
    text-decoration: none;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.25);
    transition: color 0.25s;
}
.te-footer-legal a:hover {
    color: #FF6B00;
}

@media (max-width: 992px) {
    .te-footer-nav {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (max-width: 576px) {
    .te-footer {
        padding: 32px 0 16px;
    }
    .te-footer-nav {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        padding: 24px 0;
    }
    .te-nav-item {
        padding: 16px 10px;
    }
    .te-nav-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    .te-footer-bottom {
        flex-direction: column;
        text-align: center;
    }
    .te-footer-legal {
        justify-content: center;
    }
}
</style>
