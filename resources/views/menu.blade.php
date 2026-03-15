<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Restaurant — Our Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --crimson:#C0392B; --crimson-dark:#922B21; --crimson-glow:rgba(192,57,43,0.28);
            --gold:#D4AF37; --gold-faint:rgba(212,175,55,0.12);
            --bg:#080808; --bg2:#0D0D0D; --bg3:#131313;
            --text:#F0EBE3; --text-muted:#7A7068; --border:rgba(255,255,255,0.07);
            --ease:cubic-bezier(0.23,1,0.32,1);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth}
        body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);overflow-x:hidden}

        /* ── NAVBAR ── */
        .navbar{
            position:fixed;top:0;left:0;right:0;z-index:1000;
            display:flex;align-items:center;justify-content:space-between;
            padding:16px 5%;
            background:rgba(8,8,8,0.88);
            backdrop-filter:blur(20px);
            border-bottom:1px solid var(--border);
            transition:all 0.4s var(--ease);
        }
        .navbar.scrolled{padding:10px 5%;background:rgba(8,8,8,0.98)}
        .nav-brand{display:flex;align-items:center;gap:12px;text-decoration:none}
        .nav-logo{width:44px;height:44px;border-radius:50%;border:2px solid var(--gold);object-fit:cover;transition:all 0.4s}
        .nav-logo:hover{transform:rotate(12deg);box-shadow:0 0 16px var(--crimson-glow)}
        .nav-name{font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:600;color:var(--text)}
        .nav-name em{color:var(--gold);font-style:italic}
        .nav-btns{display:flex;gap:10px}
        .nbtn{
            display:inline-flex;align-items:center;gap:7px;
            padding:9px 20px;border-radius:50px;font-size:0.84rem;font-weight:600;
            cursor:pointer;transition:all 0.35s;border:none;font-family:'DM Sans',sans-serif;
        }
        .nbtn-ghost{background:transparent;color:var(--text);border:1px solid var(--border)}
        .nbtn-ghost:hover{background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.18);transform:translateY(-2px)}
        .nbtn-red{background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));color:#fff;box-shadow:0 4px 16px var(--crimson-glow)}
        .nbtn-red:hover{transform:translateY(-3px);box-shadow:0 8px 24px var(--crimson-glow)}

        /* ── PAGE HEADER ── */
        .page-header{
            padding:140px 5% 70px;
            text-align:center;
            position:relative;
            overflow:hidden;
        }
        .page-header::before{
            content:'';position:absolute;top:0;left:50%;transform:translateX(-50%);
            width:600px;height:600px;border-radius:50%;
            background:radial-gradient(circle,rgba(192,57,43,0.12) 0%,transparent 70%);
            pointer-events:none;
        }
        .ph-eyebrow{
            display:inline-block;color:var(--gold);font-size:0.72rem;font-weight:600;
            letter-spacing:3px;text-transform:uppercase;margin-bottom:14px;
        }
        .ph-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.5rem,5vw,4.5rem);font-weight:700;
            line-height:1.08;color:var(--text);margin-bottom:16px;
        }
        .ph-title em{color:var(--gold);font-style:italic}
        .ph-sub{font-size:1rem;color:var(--text-muted);max-width:500px;margin:0 auto 32px;line-height:1.7}
        .ph-line{width:50px;height:2px;background:linear-gradient(90deg,var(--crimson),var(--gold));margin:0 auto;border-radius:2px}

        /* ── FILTER TABS ── */
        .filter-bar{
            display:flex;justify-content:center;gap:8px;flex-wrap:wrap;
            padding:0 5% 50px;
        }
        .filter-btn{
            display:inline-flex;align-items:center;gap:7px;
            padding:9px 22px;border-radius:50px;
            font-size:0.82rem;font-weight:600;cursor:pointer;
            transition:all 0.3s;border:1px solid var(--border);
            background:transparent;color:var(--text-muted);font-family:'DM Sans',sans-serif;
        }
        .filter-btn:hover{color:var(--text);border-color:rgba(255,255,255,0.2)}
        .filter-btn.active{
            background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));
            color:#fff;border-color:transparent;
            box-shadow:0 4px 16px var(--crimson-glow);
        }

        /* ── MENU GRID ── */
        .menu-section{padding:0 5% 100px;max-width:1350px;margin:0 auto}
        .menu-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(310px,1fr));
            gap:22px;
        }

        /* ── MENU CARD ── */
        .menu-card{
            background:var(--bg2);border:1px solid var(--border);border-radius:16px;
            overflow:hidden;transition:all 0.4s var(--ease);
            opacity:0;transform:translateY(24px);
        }
        .menu-card.visible{opacity:1;transform:translateY(0)}
        .menu-card:hover{
            border-color:rgba(212,175,55,0.2);
            transform:translateY(-7px);
            box-shadow:0 18px 45px rgba(0,0,0,0.45);
        }
        .card-media{position:relative;overflow:hidden;height:200px}
        .card-media img,.card-media video{width:100%;height:100%;object-fit:cover;transition:transform 0.55s var(--ease)}
        .menu-card:hover .card-media img,
        .menu-card:hover .card-media video{transform:scale(1.06)}
        .card-tag{
            position:absolute;top:12px;left:12px;z-index:2;
            background:rgba(8,8,8,0.75);backdrop-filter:blur(8px);
            border:1px solid var(--border);padding:4px 12px;border-radius:50px;
            font-size:0.72rem;font-weight:600;color:var(--gold);letter-spacing:0.5px;
        }
        .card-body{padding:20px}
        .card-cat{
            font-size:0.7rem;font-weight:600;color:var(--crimson);
            letter-spacing:1.5px;text-transform:uppercase;margin-bottom:6px;
        }
        .card-name{
            font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:600;
            color:var(--text);margin-bottom:10px;
        }
        .card-desc{font-size:0.84rem;color:var(--text-muted);line-height:1.7;margin-bottom:16px}
        .card-footer{display:flex;align-items:center;justify-content:space-between}
        .card-price{
            font-family:'Cormorant Garamond',serif;font-size:1.4rem;
            font-weight:700;color:var(--gold);
        }
        .card-cta{
            display:inline-flex;align-items:center;gap:6px;
            background:var(--bg3);color:var(--text-muted);border:1px solid var(--border);
            padding:7px 16px;border-radius:50px;font-size:0.78rem;font-weight:600;
            cursor:pointer;transition:all 0.3s;font-family:'DM Sans',sans-serif;
        }
        .menu-card:hover .card-cta{
            background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));
            color:#fff;border-color:transparent;
            box-shadow:0 4px 14px var(--crimson-glow);
        }

        /* ── FAB ── */
        .fab{
            position:fixed;bottom:32px;right:32px;
            width:54px;height:54px;
            background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));
            border-radius:50%;display:flex;align-items:center;justify-content:center;
            color:#fff;font-size:1.1rem;box-shadow:0 6px 24px var(--crimson-glow);
            cursor:pointer;z-index:999;transition:all 0.35s;
        }
        .fab:hover{transform:scale(1.12) rotate(15deg)}

        /* ── RESPONSIVE ── */
        @media(max-width:768px){
            .navbar{padding:12px 4%}
            .nav-name{font-size:1.2rem}
            .nbtn span{display:none}
            .menu-grid{grid-template-columns:1fr}
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
            <button class="nbtn nbtn-ghost" onclick="window.location.href='about.html'">
                <i class="fas fa-info-circle"></i>
                <span>About</span>
            </button>
            <button class="nbtn nbtn-red" onclick="window.location.href='tel:+923234031347'">
                <i class="fas fa-phone"></i>
                <span>Call Us</span>
            </button>
        </div>
    </nav>

    <div class="page-header">
        <div class="ph-eyebrow"><i class="fas fa-utensils"></i> &nbsp;Culinary Collection</div>
        <h1 class="ph-title">Our <em>Menu</em></h1>
        <p class="ph-sub">Fresh ingredients, masterful recipes, and flavors crafted to make every visit unforgettable.</p>
        <div class="ph-line"></div>
    </div>

    <div class="filter-bar">
        <button class="filter-btn active" data-filter="all" onclick="filterMenu('all',this)">
            <i class="fas fa-th-large"></i> All Items
        </button>
        <button class="filter-btn" data-filter="food" onclick="filterMenu('food',this)">
            <i class="fas fa-drumstick-bite"></i> Food
        </button>
        <button class="filter-btn" data-filter="dessert" onclick="filterMenu('dessert',this)">
            <i class="fas fa-ice-cream"></i> Desserts
        </button>
        <button class="filter-btn" data-filter="drinks" onclick="filterMenu('drinks',this)">
            <i class="fas fa-blender"></i> Drinks
        </button>
        <button class="filter-btn" data-filter="video" onclick="filterMenu('video',this)">
            <i class="fas fa-video"></i> Videos
        </button>
    </div>

    <div class="menu-section">
        <div class="menu-grid" id="menuGrid"></div>
    </div>

    <div class="fab" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        const menuItems = [
            { type:"food", tag:"Chef's Pick", name:"Delicious Pizza", cat:"Wood-Fired", desc:"A hot and cheesy pizza topped with fresh olives, mushrooms, and peppers, baked to perfection in our wood-fired oven.", price:"Rs. 1,300", icon:"fa-pizza-slice",
              img:"https://images.pexels.com/photos/2373520/pexels-photo-2373520.jpeg?auto=compress&cs=tinysrgb&w=600" },
            { type:"dessert", tag:"Crowd Favorite", name:"Caramel Pudding", cat:"Desserts", desc:"A creamy, sweet, and rich caramel pudding with a silky texture, topped with fresh berries and mint leaves.", price:"Rs. 650", icon:"fa-star",
              img:"https://media.istockphoto.com/id/1447673516/photo/cream-caramel-pudding-with-caramel-sauce-in-plate.jpg?b=1&s=612x612&w=0&k=20&c=b_320ZNc81sYMRBQ82eiPXQYwF4psH5jOr9tGHSDKZc=" },
            { type:"dessert", tag:"Classic", name:"Vanilla Ice Cream", cat:"Desserts", desc:"A refreshing classic vanilla ice cream with a smooth creamy texture, made with real vanilla beans.", price:"Rs. 400", icon:"fa-ice-cream",
              img:"https://images.pexels.com/photos/1132558/pexels-photo-1132558.jpeg?auto=compress&cs=tinysrgb&w=600" },
            { type:"video", tag:"Watch & Enjoy", name:"Cooking in Action", cat:"Behind the Scenes", desc:"Watch our chef in action, bringing mouth-watering dishes to life with skill and passion every day.", price:"Watch Now", icon:"fa-video", isVideo:true,
              img:"https://images.pexels.com/photos/6270544/pexels-photo-6270544.jpeg?auto=compress&cs=tinysrgb&w=600",
              video:"https://videos.pexels.com/video-files/18904821/18904821-hd_1080_1920_24fps.mp4" },
            { type:"video", tag:"Exclusive", name:"Chef's Special", cat:"Behind the Scenes", desc:"Watch our master chef prepare signature dishes, bursting with flavor and culinary expertise.", price:"Watch Now", icon:"fa-hat-chef", isVideo:true,
              img:"https://images.pexels.com/photos/1351238/pexels-photo-1351238.jpeg?auto=compress&cs=tinysrgb&w=600",
              video:"https://videos.pexels.com/video-files/18904819/18904819-hd_1080_1920_24fps.mp4" },
            { type:"drinks", tag:"Freshly Made", name:"Berry Smoothie", cat:"Drinks", desc:"A rich smoothie made with mixed berries, Greek yogurt, and honey — packed with antioxidants.", price:"Rs. 500", icon:"fa-blender", isVideo:true,
              img:"https://images.pexels.com/photos/103566/pexels-photo-103566.jpeg?auto=compress&cs=tinysrgb&w=600",
              video:"https://videos.pexels.com/video-files/854128/854128-sd_640_360_25fps.mp4" },
            { type:"drinks", tag:"Refreshing", name:"Classic Cocktail", cat:"Drinks", desc:"A refreshing mocktail with a hint of citrus and mint, perfect for unwinding after a long day.", price:"Rs. 600", icon:"fa-cocktail", isVideo:true,
              img:"https://images.pexels.com/photos/128242/pexels-photo-128242.jpeg?auto=compress&cs=tinysrgb&w=600",
              video:"https://videos.pexels.com/video-files/3958714/3958714-sd_640_360_30fps.mp4" },
            { type:"food", tag:"All-Day Favorite", name:"Golden Fries", cat:"Snacks", desc:"Perfectly crispy fries with a golden texture, served with your choice of truffle aioli or spicy ketchup.", price:"Rs. 350", icon:"fa-cookie-bite",
              img:"https://images.pexels.com/photos/2725744/pexels-photo-2725744.jpeg?auto=compress&cs=tinysrgb&w=600" },
            { type:"food", tag:"Bestseller", name:"Crispy Fried Chicken", cat:"Mains", desc:"Crunchy on the outside and juicy on the inside — this buttermilk fried chicken is a crowd favorite.", price:"Rs. 1,100", icon:"fa-drumstick-bite", isVideo:true,
              img:"https://images.pexels.com/photos/6210876/pexels-photo-6210876.jpeg?auto=compress&cs=tinysrgb&w=600",
              video:"https://videos.pexels.com/video-files/2909914/2909914-sd_960_506_24fps.mp4" },
        ];

        const grid = document.getElementById('menuGrid');
        let currentFilter = 'all';

        function renderMenu(filter) {
            grid.innerHTML = '';
            const items = filter === 'all' ? menuItems : menuItems.filter(i => i.type === filter);
            items.forEach((item, idx) => {
                const card = document.createElement('div');
                card.className = 'menu-card';
                card.dataset.type = item.type;
                card.style.transitionDelay = `${idx * 0.06}s`;
                card.innerHTML = `
                    <div class="card-media">
                        ${item.isVideo
                            ? `<video controls poster="${item.img}"><source src="${item.video}" type="video/mp4"></video>`
                            : `<img src="${item.img}" alt="${item.name}" loading="lazy">`}
                        <span class="card-tag">${item.tag}</span>
                    </div>
                    <div class="card-body">
                        <div class="card-cat"><i class="fas ${item.icon}"></i> &nbsp;${item.cat}</div>
                        <div class="card-name">${item.name}</div>
                        <div class="card-desc">${item.desc}</div>
                        <div class="card-footer">
                            <span class="card-price">${item.price}</span>
                            <button class="card-cta"><i class="fas fa-plus"></i> Order</button>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
                requestAnimationFrame(() => {
                    setTimeout(() => card.classList.add('visible'), idx * 60 + 10);
                });
            });
        }

        function filterMenu(filter, btn) {
            currentFilter = filter;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderMenu(filter);
        }

        renderMenu('all');

        window.addEventListener('scroll', () => {
            document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>
</html>
