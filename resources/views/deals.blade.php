<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Restaurant — Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --crimson: #C0392B;
            --crimson-dark: #922B21;
            --crimson-glow: rgba(192,57,43,0.3);
            --gold: #D4AF37;
            --bg: #080808;
            --bg2: #0F0F0F;
            --bg3: #141414;
            --text: #F0EBE3;
            --text-muted: #7A7068;
            --border: rgba(255,255,255,0.07);
            --radius: 18px;
            --ease: cubic-bezier(0.23,1,0.32,1);
        }
        *,*::before,*::after { box-sizing: border-box; margin:0; padding:0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); overflow-x: hidden; }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed; top:0; left:0; right:0; z-index:1000;
            display:flex; align-items:center; justify-content:space-between;
            padding:16px 5%;
            background: rgba(8,8,8,0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            transition: all 0.4s var(--ease);
        }
        .navbar.scrolled { padding: 10px 5%; background: rgba(8,8,8,0.98); }
        .nav-brand { display:flex; align-items:center; gap:12px; text-decoration:none; }
        .nav-logo { width:46px; height:46px; border-radius:50%; border:2px solid var(--gold); object-fit:cover; transition:all 0.4s; }
        .nav-logo:hover { transform:rotate(12deg); box-shadow:0 0 18px var(--crimson-glow); }
        .nav-name { font-family:'Cormorant Garamond',serif; font-size:1.45rem; font-weight:600; color:var(--text); }
        .nav-name em { color:var(--gold); font-style:italic; }
        .nav-btns { display:flex; gap:10px; }
        .nbtn {
            display:inline-flex; align-items:center; gap:7px;
            padding:9px 20px; border-radius:50px; font-size:0.84rem; font-weight:600;
            cursor:pointer; transition:all 0.35s; border:none; font-family:'DM Sans',sans-serif;
        }
        .nbtn-ghost { background:transparent; color:var(--text); border:1px solid var(--border); }
        .nbtn-ghost:hover { background:rgba(255,255,255,0.05); border-color:rgba(255,255,255,0.18); transform:translateY(-2px); }
        .nbtn-red { background:linear-gradient(135deg,var(--crimson),var(--crimson-dark)); color:#fff; box-shadow:0 4px 16px var(--crimson-glow); }
        .nbtn-red:hover { transform:translateY(-3px); box-shadow:0 8px 24px var(--crimson-glow); }

        /* ── HERO SPLIT ── */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding-top: 80px;
        }
        .hero-left {
            padding: 80px 6% 80px 6%;
            animation: fadeLeft 1s ease forwards;
        }
        @keyframes fadeLeft { from{opacity:0;transform:translateX(-40px)} to{opacity:1;transform:translateX(0)} }
        .hero-eyebrow {
            display:inline-flex; align-items:center; gap:8px;
            color:var(--gold); font-size:0.72rem; font-weight:600;
            letter-spacing:2.5px; text-transform:uppercase; margin-bottom:22px;
            border-bottom: 1px solid rgba(212,175,55,0.3); padding-bottom:8px;
        }
        .hero-title {
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.8rem,4.5vw,4.8rem);
            font-weight:700; line-height:1.08; letter-spacing:-0.5px;
            color:var(--text); margin-bottom:22px;
        }
        .hero-title em { color:var(--gold); font-style:italic; }
        .hero-title .red { color:var(--crimson); }
        .hero-info { margin-bottom:32px; }
        .info-row {
            display:flex; align-items:flex-start; gap:14px; padding:14px 0;
            border-bottom: 1px solid var(--border);
            opacity:0; animation: fadeUp 0.6s ease forwards;
        }
        .info-row:nth-child(1){animation-delay:0.5s}
        .info-row:nth-child(2){animation-delay:0.7s}
        .info-row:nth-child(3){animation-delay:0.9s}
        @keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        .info-icon {
            width:40px;height:40px;border-radius:10px;
            background:rgba(192,57,43,0.12); border:1px solid rgba(192,57,43,0.2);
            display:flex;align-items:center;justify-content:center;
            color:var(--crimson); font-size:0.95rem; flex-shrink:0;
        }
        .info-text { font-size:0.9rem; color:rgba(240,235,227,0.75); line-height:1.6; }
        .info-text strong { display:block; color:var(--text); font-size:0.82rem; letter-spacing:0.5px; margin-bottom:2px; }
        .hero-actions {
            display:flex; gap:12px; flex-wrap:wrap;
            opacity:0; animation:fadeUp 0.6s 1.1s ease forwards;
        }
        .hero-btn {
            display:inline-flex; align-items:center; gap:8px;
            padding:13px 28px; border-radius:50px; font-size:0.9rem; font-weight:600;
            cursor:pointer; transition:all 0.35s var(--ease); text-decoration:none; border:none;
            font-family:'DM Sans',sans-serif;
        }
        .hbtn-primary { background:linear-gradient(135deg,var(--crimson),var(--crimson-dark)); color:#fff; box-shadow:0 6px 24px var(--crimson-glow); }
        .hbtn-primary:hover { transform:translateY(-4px); box-shadow:0 12px 32px var(--crimson-glow); }
        .hbtn-outline { background:transparent; color:var(--text); border:1px solid rgba(255,255,255,0.15); }
        .hbtn-outline:hover { background:rgba(255,255,255,0.05); transform:translateY(-4px); }

        /* ── HERO VIDEO ── */
        .hero-right {
            position:relative; height:100vh; overflow:hidden;
            animation:fadeRight 1.2s ease forwards;
        }
        @keyframes fadeRight{from{opacity:0;transform:translateX(40px)}to{opacity:1;transform:translateX(0)}}
        .hero-right video {
            width:100%;height:100%;object-fit:cover;
            filter:brightness(0.65) saturate(1.2);
        }
        .hero-right::before {
            content:''; position:absolute; inset:0;
            background:linear-gradient(90deg,var(--bg) 0%,transparent 30%);
            z-index:1;
        }
        .video-badge {
            position:absolute; bottom:36px; left:50%; transform:translateX(-50%);
            z-index:2; background:rgba(8,8,8,0.8); border:1px solid var(--border);
            backdrop-filter:blur(12px); padding:14px 24px; border-radius:14px;
            display:flex; align-items:center; gap:12px; white-space:nowrap;
        }
        .vb-dot { width:8px;height:8px;border-radius:50%;background:var(--crimson);animation:pulse 2s infinite; }
        @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(1.4)}}
        .vb-text { font-size:0.78rem; color:var(--text); }
        .vb-text strong { color:var(--gold); }

        /* ── GALLERY SECTION ── */
        .gallery-section {
            padding:90px 5%;
            background: var(--bg2);
        }
        .section-header { text-align:center; margin-bottom:56px; }
        .eyebrow {
            display:inline-block; color:var(--gold); font-size:0.72rem; font-weight:600;
            letter-spacing:3px; text-transform:uppercase; margin-bottom:12px;
        }
        .s-title {
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(1.8rem,3.5vw,3rem); font-weight:600; color:var(--text);
        }
        .s-line { width:50px;height:2px;background:linear-gradient(90deg,var(--crimson),var(--gold));margin:18px auto 0;border-radius:2px; }

        .gallery-grid {
            display:grid;
            grid-template-columns: repeat(4,1fr);
            grid-template-rows: repeat(2,220px);
            gap:14px;
            max-width:1200px;
            margin:0 auto;
        }
        .g-item {
            border-radius:14px; overflow:hidden; position:relative; cursor:pointer;
            transition:all 0.4s var(--ease);
        }
        .g-item:nth-child(1) { grid-column:span 2; grid-row:span 2; }
        .g-item:nth-child(4) { grid-column:span 2; }
        .g-item img {
            width:100%;height:100%;object-fit:cover;
            transition:transform 0.6s var(--ease), filter 0.4s;
            filter:brightness(0.8) saturate(1.1);
        }
        .g-item:hover img { transform:scale(1.06); filter:brightness(1) saturate(1.3); }
        .g-item::after {
            content:''; position:absolute; inset:0;
            background:linear-gradient(to top,rgba(0,0,0,0.7) 0%,transparent 50%);
        }
        .g-label {
            position:absolute; bottom:14px; left:14px; z-index:2;
            font-family:'Cormorant Garamond',serif; font-size:1.05rem; font-weight:600;
            color:#fff; text-shadow:0 2px 8px rgba(0,0,0,0.6);
        }

        /* ── FAB ── */
        .fab {
            position:fixed; bottom:32px;right:32px;
            width:54px;height:54px;
            background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));
            border-radius:50%; display:flex;align-items:center;justify-content:center;
            color:#fff; font-size:1.1rem;
            box-shadow:0 6px 24px var(--crimson-glow);
            cursor:pointer; z-index:999; transition:all 0.35s;
        }
        .fab:hover { transform:scale(1.12) rotate(15deg); }

        /* ── RESPONSIVE ── */
        @media(max-width:900px){
            .hero { grid-template-columns:1fr; }
            .hero-right { height:50vh; }
            .hero-right::before { background:linear-gradient(180deg,var(--bg) 0%,transparent 25%); }
            .gallery-grid { grid-template-columns:repeat(2,1fr); grid-template-rows:auto; }
            .g-item:nth-child(1){grid-column:span 2;height:240px}
            .g-item:nth-child(4){grid-column:span 1}
            .g-item{height:180px}
        }
        @media(max-width:600px){
            .navbar { padding:12px 4%; }
            .nav-name { font-size:1.2rem; }
            .nbtn span { display:none; }
            .hero-actions { flex-direction:column; }
            .gallery-grid { grid-template-columns:1fr; }
            .g-item:nth-child(1){grid-column:span 1;grid-row:span 1;height:220px}
            .g-item:nth-child(4){grid-column:span 1}
        }
    </style>
</head>
<body>

    <nav class="navbar" id="nav">
        <a href="#" class="nav-brand">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDFtD61zTOlrKQ06nitMUQMZgpfaSVcBomKQ&s" alt="Logo" class="nav-logo">
            <span class="nav-name">Recipes <em>Restaurant</em></span>
        </a>
        <div class="nav-btns">
            <button class="nbtn nbtn-ghost" onclick="window.location.href='{{ route('deal') }}'">
                <i class="fas fa-fire"></i>
                <span>Deals</span>
            </button>
            <button class="nbtn nbtn-ghost" onclick="window.location.href='tel:+923234031347'">
                <i class="fas fa-phone"></i>
                <span>Contact</span>
            </button>
            <button class="nbtn nbtn-red" onclick="showMenu()">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </button>
        </div>
    </nav>

    <main>
        <!-- ── HERO SPLIT ── -->
        <section class="hero">
            <div class="hero-left">
                <div class="hero-eyebrow">
                    <i class="fas fa-award"></i>
                    Irresistible Taste · Best in Town
                </div>
                <h1 class="hero-title">
                    <em>Fine Dining</em><br>
                    Comes to<br>
                    <span class="red">Nankana Sahib</span>
                </h1>
                <div class="hero-info">
                    <div class="info-row">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-text">
                            <strong>Our Location</strong>
                            Railway Road Main Mor, beside MCB Bank, Nankana Sahib
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="info-text">
                            <strong>Reserve a Table</strong>
                            0323-4031347 &nbsp;|&nbsp; 0306-5928241
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fas fa-users"></i></div>
                        <div class="info-text">
                            <strong>Dine With Family</strong>
                            Dedicated family hall with cozy private seating
                        </div>
                    </div>
                </div>
                <div class="hero-actions">
                    <button class="hero-btn hbtn-primary" onclick="showMenu()">
                        <i class="fas fa-book-open"></i>
                        Explore Menu
                    </button>
                    <button class="hero-btn hbtn-outline" onclick="window.location.href='{{ route('deal') }}'">
                        <i class="fas fa-tag"></i>
                        View Deals
                    </button>
                </div>
            </div>
            <div class="hero-right">
                <video autoplay muted loop playsinline poster="https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                    <source src="https://videos.pexels.com/video-files/3120243/3120243-uhd_2560_1440_25fps.mp4" type="video/mp4">
                </video>
                <div class="video-badge">
                    <div class="vb-dot"></div>
                    <div class="vb-text"><strong>Live Kitchen</strong> — Fresh meals prepared daily</div>
                </div>
            </div>
        </section>

        <!-- ── GALLERY ── -->
        <section class="gallery-section">
            <div class="section-header">
                <div class="eyebrow"><i class="fas fa-camera"></i> &nbsp;Our Specialties</div>
                <h2 class="s-title">A Feast for the Eyes</h2>
                <div class="s-line"></div>
            </div>
            <div class="gallery-grid">
                <div class="g-item">
                    <img src="https://images.pexels.com/photos/2119758/pexels-photo-2119758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Specialty Dish">
                    <div class="g-label">Chef's Signature</div>
                </div>
                <div class="g-item">
                    <img src="https://images.pexels.com/photos/750073/pexels-photo-750073.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Specialty Dish">
                    <div class="g-label">Premium Cuts</div>
                </div>
                <div class="g-item">
                    <img src="https://images.pexels.com/photos/1653877/pexels-photo-1653877.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Specialty Dish">
                    <div class="g-label">Fresh Ingredients</div>
                </div>
                <div class="g-item">
                    <img src="https://media.istockphoto.com/id/1415605166/photo/businesswoman-working-at-laptop-with-fast-food-on-restaurant-table.jpg?b=1&s=612x612&w=0&k=20&c=lZ0rC2gWQCm-NWSqxy6_B9ThjG4csMIdJgEDb4hMqBo=" alt="Specialty Dish">
                    <div class="g-label">Family Favorites</div>
                </div>
            </div>
        </section>
    </main>

    <div class="fab" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        window.addEventListener('scroll', () => {
            document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 50);
        });
        function showMenu() { window.location.href = 'menu'; }
    </script>
</body>
</html>
