<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Restaurant — Premium Dining Experience</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --crimson: #C0392B;
            --crimson-dark: #922B21;
            --crimson-glow: rgba(192,57,43,0.35);
            --gold: #D4AF37;
            --gold-light: #F5E97A;
            --bg: #0A0A0A;
            --bg-card: #111111;
            --bg-card2: #161616;
            --text: #F0EBE3;
            --text-muted: #8A8078;
            --border: rgba(255,255,255,0.07);
            --radius: 16px;
            --transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── Noise texture overlay ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* ──────────── NAV ──────────── */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 5%;
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            transition: var(--transition);
        }
        .navbar.scrolled {
            padding: 12px 5%;
            background: rgba(10,10,10,0.97);
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }
        .nav-logo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            object-fit: cover;
            transition: var(--transition);
        }
        .nav-logo:hover { transform: rotate(12deg) scale(1.08); box-shadow: 0 0 20px var(--crimson-glow); }
        .nav-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.55rem;
            font-weight: 600;
            color: var(--text);
            letter-spacing: 0.5px;
        }
        .nav-title span { color: var(--gold); }
        .nav-actions { display: flex; gap: 10px; align-items: center; }
        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border: none;
            font-family: 'DM Sans', sans-serif;
            letter-spacing: 0.3px;
        }
        .nav-btn-ghost {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }
        .nav-btn-ghost:hover {
            background: rgba(255,255,255,0.06);
            border-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        .nav-btn-primary {
            background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
            color: #fff;
            box-shadow: 0 4px 16px var(--crimson-glow);
        }
        .nav-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px var(--crimson-glow);
        }

        /* ──────────── HERO ──────────── */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 5% 80px;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            transform: scale(1.06);
            animation: heroZoom 20s ease-in-out infinite alternate;
        }
        @keyframes heroZoom { from { transform: scale(1.06); } to { transform: scale(1.12); } }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10,10,10,0.55) 0%, rgba(10,10,10,0.8) 60%, rgba(10,10,10,1) 100%);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(212,175,55,0.12);
            border: 1px solid rgba(212,175,55,0.3);
            color: var(--gold);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 28px;
            animation: fadeUp 0.8s ease forwards;
            opacity: 0;
        }
        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 700;
            line-height: 1.05;
            letter-spacing: -1px;
            color: #fff;
            margin-bottom: 24px;
            animation: fadeUp 0.8s 0.2s ease forwards;
            opacity: 0;
        }
        .hero-title .accent { color: var(--gold); font-style: italic; }
        .hero-subtitle {
            font-size: 1.1rem;
            color: rgba(240,235,227,0.7);
            max-width: 560px;
            margin: 0 auto 40px;
            line-height: 1.75;
            animation: fadeUp 0.8s 0.4s ease forwards;
            opacity: 0;
        }
        .hero-cta {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeUp 0.8s 0.6s ease forwards;
            opacity: 0;
        }
        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 14px 32px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
        }
        .cta-primary {
            background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
            color: #fff;
            box-shadow: 0 6px 24px var(--crimson-glow);
        }
        .cta-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px var(--crimson-glow);
        }
        .cta-secondary {
            background: rgba(255,255,255,0.06);
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
        }
        .cta-secondary:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-4px);
        }
        .hero-scroll {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: fadeIn 1.5s 1.2s ease forwards;
            opacity: 0;
        }
        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scrollPulse 2s ease-in-out infinite;
        }
        @keyframes scrollPulse { 0%,100% { transform: scaleY(1); opacity: 1; } 50% { transform: scaleY(0.6); opacity: 0.5; } }

        /* ──────────── STATS STRIP ──────────── */
        .stats-strip {
            display: flex;
            justify-content: center;
            gap: 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            background: var(--bg-card);
        }
        .stat-item {
            flex: 1;
            max-width: 200px;
            padding: 30px 20px;
            text-align: center;
            border-right: 1px solid var(--border);
            transition: var(--transition);
        }
        .stat-item:last-child { border-right: none; }
        .stat-item:hover { background: rgba(212,175,55,0.04); }
        .stat-icon {
            font-size: 1.5rem;
            color: var(--gold);
            margin-bottom: 8px;
        }
        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text);
        }
        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ──────────── DEALS SECTION ──────────── */
        .section {
            padding: 90px 5%;
        }
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .section-eyebrow {
            display: inline-block;
            color: var(--gold);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 600;
            color: var(--text);
            line-height: 1.15;
        }
        .section-title .line {
            display: block;
        }
        .section-line {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, var(--crimson), var(--gold));
            margin: 20px auto 0;
            border-radius: 2px;
        }

        /* ──────────── DEAL CARDS GRID ──────────── */
        .deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            max-width: 1300px;
            margin: 0 auto;
        }
        .deal-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
        }
        .deal-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .deal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--crimson), var(--gold));
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 2;
        }
        .deal-card:hover {
            transform: translateY(-8px);
            border-color: rgba(212,175,55,0.25);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 30px rgba(192,57,43,0.1);
        }
        .deal-card:hover::before { opacity: 1; }
        .card-img-wrap {
            position: relative;
            overflow: hidden;
            height: 210px;
        }
        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.23,1,0.32,1);
        }
        .deal-card:hover .card-img-wrap img { transform: scale(1.08); }
        .card-badge {
            position: absolute;
            top: 14px;
            right: 14px;
            background: var(--crimson);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
            z-index: 2;
            box-shadow: 0 4px 12px var(--crimson-glow);
        }
        .card-body {
            padding: 22px;
        }
        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.45rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 14px;
            position: relative;
            padding-bottom: 12px;
        }
        .card-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 36px;
            height: 1.5px;
            background: var(--gold);
            transition: width 0.3s;
        }
        .deal-card:hover .card-title::after { width: 60px; }
        .card-items {
            list-style: none;
            margin-bottom: 16px;
        }
        .card-items li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.88rem;
            color: rgba(240,235,227,0.65);
            padding: 5px 0;
        }
        .card-items li i {
            color: var(--crimson);
            font-size: 0.75rem;
            flex-shrink: 0;
        }
        .card-desc {
            font-size: 0.83rem;
            color: var(--text-muted);
            line-height: 1.7;
            font-style: italic;
            margin-bottom: 18px;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .price-tag {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--gold);
        }
        .order-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'DM Sans', sans-serif;
        }
        .order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px var(--crimson-glow);
        }

        /* ──────────── FULLSCREEN MODAL ──────────── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.92);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.35s ease;
            backdrop-filter: blur(12px);
        }
        .modal-overlay.open {
            opacity: 1;
            pointer-events: all;
        }
        .modal-card {
            background: var(--bg-card2);
            border: 1px solid rgba(212,175,55,0.2);
            border-radius: 24px;
            width: 100%;
            max-width: 640px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.92) translateY(20px);
            transition: transform 0.4s cubic-bezier(0.23,1,0.32,1);
        }
        .modal-overlay.open .modal-card {
            transform: scale(1) translateY(0);
        }
        .modal-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 24px 24px 0 0;
        }
        .modal-body {
            padding: 32px;
        }
        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }
        .modal-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 20px;
        }
        .modal-desc {
            font-size: 0.95rem;
            color: rgba(240,235,227,0.7);
            line-height: 1.8;
            margin-bottom: 24px;
        }
        .modal-items {
            list-style: none;
            margin-bottom: 28px;
        }
        .modal-items li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            color: rgba(240,235,227,0.8);
        }
        .modal-items li:last-child { border-bottom: none; }
        .modal-items li i { color: var(--gold); width: 20px; text-align: center; }
        .modal-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 44px;
            height: 44px;
            background: rgba(10,10,10,0.8);
            border: 1px solid var(--border);
            border-radius: 50%;
            color: var(--text);
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            backdrop-filter: blur(8px);
        }
        .modal-close:hover {
            background: var(--crimson);
            transform: rotate(90deg);
            border-color: transparent;
        }
        .modal-overlay { position: fixed; }

        /* ──────────── FAB ──────────── */
        .fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            box-shadow: 0 6px 24px var(--crimson-glow);
            cursor: pointer;
            z-index: 999;
            transition: var(--transition);
        }
        .fab:hover { transform: scale(1.1) rotate(15deg); box-shadow: 0 10px 32px var(--crimson-glow); }

        /* ──────────── FOOTER ──────────── */
        .footer {
            padding: 50px 5% 30px;
            border-top: 1px solid var(--border);
            text-align: center;
        }
        .footer-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 16px;
        }
        .footer-logo span { color: var(--gold); font-style: italic; }
        .footer-tagline {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 28px;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
        }
        .footer-links a:hover { color: var(--gold); }
        .footer-copy {
            font-size: 0.75rem;
            color: rgba(138,128,120,0.5);
        }

        /* ──────────── ANIMATIONS ──────────── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* ──────────── RESPONSIVE ──────────── */
        @media (max-width: 768px) {
            .navbar { padding: 14px 4%; }
            .nav-title { font-size: 1.25rem; }
            .nav-btn span { display: none; }
            .stats-strip { flex-wrap: wrap; }
            .stat-item { border-right: none; border-bottom: 1px solid var(--border); flex: 0 0 50%; }
            .hero-cta { flex-direction: column; align-items: center; }
            .deals-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .stat-item { flex: 0 0 100%; }
        }
    </style>
</head>
<body>

    <!-- ── NAVBAR ── -->
    <nav class="navbar" id="navbar">
        <a href="#" class="nav-brand">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDFtD61zTOlrKQ06nitMUQMZgpfaSVcBomKQ&s" alt="Logo" class="nav-logo">
            <span class="nav-title">Recipes <span>Restaurant</span></span>
        </a>
        <div class="nav-actions">
            <button class="nav-btn nav-btn-ghost" onclick="window.location.href='tel:+923234031347'">
                <i class="fas fa-phone-alt"></i>
                <span>Call Us</span>
            </button>
            <button class="nav-btn nav-btn-ghost">
                <i class="fas fa-map-marker-alt"></i>
                <span>Location</span>
            </button>
            <button class="nav-btn nav-btn-primary" onclick="showMenu()">
                <i class="fas fa-book-open"></i>
                <span>Menu</span>
            </button>
        </div>
    </nav>

    <!-- ── HERO ── -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-award"></i>
                Nankana's Finest Dining
            </div>
            <h1 class="hero-title">
                Where Every Bite<br>Tells a <span class="accent">Story</span>
            </h1>
            <p class="hero-subtitle">
                Handcrafted flavors, premium ingredients, and an experience worth savoring — welcome to the best restaurant in Nankana Sahib.
            </p>
            <div class="hero-cta">
                <button class="cta-btn cta-primary" onclick="document.getElementById('deals').scrollIntoView({behavior:'smooth'})">
                    <i class="fas fa-fire"></i>
                    Explore Deals
                </button>
                <button class="cta-btn cta-secondary" onclick="showMenu()">
                    <i class="fas fa-utensils"></i>
                    Full Menu
                </button>
            </div>
        </div>
        <div class="hero-scroll">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ── STATS ── -->
    <div class="stats-strip">
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-star"></i></div>
            <div class="stat-num">4.9★</div>
            <div class="stat-label">Customer Rating</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-hamburger"></i></div>
            <div class="stat-num">50+</div>
            <div class="stat-label">Menu Items</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-num">10K+</div>
            <div class="stat-label">Happy Guests</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-num">8 Yrs</div>
            <div class="stat-label">Of Excellence</div>
        </div>
    </div>

    <!-- ── DEALS ── -->
    <section class="section" id="deals">
        <div class="section-header">
            <div class="section-eyebrow"><i class="fas fa-tag"></i> &nbsp;Today's Specials</div>
            <h2 class="section-title">
                <span class="line">Signature</span>
                <span class="line" style="color: var(--crimson);">Deals & Combos</span>
            </h2>
            <div class="section-line"></div>
        </div>
        <div class="deals-grid" id="dealsGrid"></div>
    </section>

    <!-- ── MODAL ── -->
    <div class="modal-overlay" id="modal" onclick="closeModal(event)">
        <div class="modal-card" id="modalCard">
            <button class="modal-close" onclick="closeModalDirect()"><i class="fas fa-times"></i></button>
            <img id="modalImg" src="" alt="" class="modal-img">
            <div class="modal-body">
                <div class="modal-title" id="modalTitle"></div>
                <div class="modal-price" id="modalPrice"></div>
                <div class="modal-desc" id="modalDesc"></div>
                <ul class="modal-items" id="modalItems"></ul>
                <button class="order-btn" style="padding:12px 28px;font-size:0.92rem;">
                    <i class="fas fa-shopping-cart"></i>
                    Order Now — Call 0323-4031347
                </button>
            </div>
        </div>
    </div>

    <!-- ── FAB ── -->
    <div class="fab" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- ── FOOTER ── -->
    <footer class="footer">
        <div class="footer-logo">Recipes <span>Restaurant</span></div>
        <div class="footer-tagline"><i class="fas fa-map-marker-alt" style="color:var(--crimson)"></i>&nbsp; Railway Road Main Mor, beside MCB Bank, Nankana Sahib</div>
        <div class="footer-links">
            <a href="tel:+923234031347"><i class="fas fa-phone"></i> 0323-4031347</a>
            <a href="tel:+923065928241"><i class="fas fa-phone"></i> 0306-5928241</a>
            <a href="#"><i class="fas fa-utensils"></i> Family Hall Available</a>
        </div>
        <div class="footer-copy">© 2025 Recipes Restaurant · All rights reserved</div>
    </footer>

    <script>
        // ── Data ──
        const deals = [
            { title:"Zinger Delight", image:"https://images.pexels.com/photos/2280545/pexels-photo-2280545.jpeg", items:["Premium Zinger Wing","Signature Drink"], description:"Our famous crispy zinger wing with special house seasoning, served with our signature homemade drink — a classic that keeps people coming back.", price:"Rs. 450", icon:"fa-drumstick-bite" },
            { title:"Burger Feast", image:"https://images.pexels.com/photos/825661/pexels-photo-825661.jpeg", items:["Gourmet Chicken Burger","Handcrafted Lemonade"], description:"Juicy chicken patty stacked with garden-fresh vegetables and our legendary secret sauce, paired with ice-cold lemonade.", price:"Rs. 550", icon:"fa-burger" },
            { title:"Wings Combo", image:"https://images.pexels.com/photos/1082343/pexels-photo-1082343.jpeg", items:["5 Spicy Hot Wings","Refreshing Mojito"], description:"Perfectly spiced wings with a cooling mint mojito — the ultimate sweet heat balance you won't find anywhere else.", price:"Rs. 650", icon:"fa-fire" },
            { title:"Family Platter", image:"https://images.pexels.com/photos/1199960/pexels-photo-1199960.jpeg", items:["10 Crispy Nuggets","5 Hot Wings","2 Large Drinks"], description:"Designed to bring everyone together — an overflowing feast perfect for family gatherings and special occasions.", price:"Rs. 1200", icon:"fa-users" },
            { title:"Chef's Special", image:"https://images.pexels.com/photos/2373520/pexels-photo-2373520.jpeg", items:["Full Chicken Platter","Garlic Bread","Special Drink"], description:"Our head chef's proudest creation — a complete culinary experience crafted with finest ingredients and masterful technique.", price:"Rs. 950", icon:"fa-hat-chef" },
            { title:"Ultimate Combo", image:"https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg", items:["Zinger Burger","5 Hot Wings","Large Drink"], description:"For the big appetite — our most popular combo that satisfies every craving in one legendary package.", price:"Rs. 850", icon:"fa-crown" },
            { title:"Classic Zinger", image:"https://images.pexels.com/photos/2097090/pexels-photo-2097090.jpeg", items:["Signature Zinger Burger","Regular Drink"], description:"The timeless classic that started our legacy. Simple, honest, and absolutely delicious — every single time.", price:"Rs. 500", icon:"fa-star" },
            { title:"Spicy Chapill", image:"https://images.pexels.com/photos/2673353/pexels-photo-2673353.jpeg", items:["Chapill Burger","Mint Lemonade"], description:"For the brave spice lovers — our fiery chapill burger that challenges your taste buds and rewards them spectacularly.", price:"Rs. 550", icon:"fa-pepper-hot" },
            { title:"Wings Party", image:"https://images.pexels.com/photos/299348/pexels-photo-299348.jpeg", items:["10 Hot Wings","2 Dipping Sauces","Large Drink"], description:"When wings are the answer, this is the ultimate question. Ten perfectly sauced wings with your choice of dips.", price:"Rs. 800", icon:"fa-party-horn" },
            { title:"Zinger Duo", image:"https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg", items:["2 Zinger Burgers","2 Regular Drinks"], description:"Double the joy — perfect for couples or best friends sharing a great meal and even better memories.", price:"Rs. 900", icon:"fa-heart" },
        ];

        const grid = document.getElementById('dealsGrid');
        const modal = document.getElementById('modal');

        // ── Render cards ──
        deals.forEach((deal, i) => {
            const card = document.createElement('div');
            card.className = 'deal-card';
            card.style.transitionDelay = `${i * 0.07}s`;
            card.innerHTML = `
                <div class="card-img-wrap">
                    <img src="${deal.image}" alt="${deal.title}" loading="lazy">
                    <span class="card-badge">${deal.price}</span>
                </div>
                <div class="card-body">
                    <div class="card-title"><i class="fas ${deal.icon}" style="color:var(--crimson);margin-right:8px;font-size:0.9em"></i>${deal.title}</div>
                    <ul class="card-items">
                        ${deal.items.map(it => `<li><i class="fas fa-circle-check"></i>${it}</li>`).join('')}
                    </ul>
                    <p class="card-desc">${deal.description}</p>
                    <div class="card-footer">
                        <span class="price-tag">${deal.price}</span>
                        <button class="order-btn"><i class="fas fa-eye"></i> View Deal</button>
                    </div>
                </div>
            `;
            card.addEventListener('click', () => openModal(deal));
            grid.appendChild(card);
        });

        // ── Intersection Observer for cards ──
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.deal-card').forEach(c => observer.observe(c));

        // ── Modal ──
        function openModal(deal) {
            document.getElementById('modalImg').src = deal.image;
            document.getElementById('modalTitle').textContent = deal.title;
            document.getElementById('modalPrice').textContent = deal.price;
            document.getElementById('modalDesc').textContent = deal.description;
            document.getElementById('modalItems').innerHTML = deal.items.map(it =>
                `<li><i class="fas fa-circle-check"></i>${it}</li>`
            ).join('');
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal(e) {
            if (e.target === modal) closeModalDirect();
        }
        function closeModalDirect() {
            modal.classList.remove('open');
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModalDirect(); });

        // ── Navbar shrink on scroll ──
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 60);
        });

        function showMenu() { window.location.href = 'menu'; }
    </script>
</body>
</html>
