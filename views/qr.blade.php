<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Restaurant — QR Deal Scanner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,500&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --crimson:#C0392B; --crimson-dark:#922B21; --crimson-glow:rgba(192,57,43,0.3);
            --gold:#D4AF37;
            --bg:#080808; --bg2:#0D0D0D; --bg3:#131313;
            --text:#F0EBE3; --text-muted:#7A7068; --border:rgba(255,255,255,0.07);
            --ease:cubic-bezier(0.23,1,0.32,1);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;overflow-x:hidden}

        /* ── NAVBAR ── */
        .navbar{
            position:fixed;top:0;left:0;right:0;z-index:100;
            display:flex;align-items:center;justify-content:space-between;
            padding:16px 5%;
            background:rgba(8,8,8,0.92);backdrop-filter:blur(20px);
            border-bottom:1px solid var(--border);
        }
        .nav-brand{display:flex;align-items:center;gap:12px;text-decoration:none}
        .nav-logo{width:42px;height:42px;border-radius:50%;border:2px solid var(--gold);object-fit:cover}
        .nav-name{font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:600;color:var(--text)}
        .nav-name em{color:var(--gold);font-style:italic}
        .nbtn{
            display:inline-flex;align-items:center;gap:7px;
            padding:9px 20px;border-radius:50px;font-size:0.84rem;font-weight:600;
            cursor:pointer;transition:all 0.3s;border:1px solid var(--border);
            background:transparent;color:var(--text);font-family:'DM Sans',sans-serif;
        }
        .nbtn:hover{background:rgba(255,255,255,0.05);transform:translateY(-2px)}
        .nbtn-red{background:linear-gradient(135deg,var(--crimson),var(--crimson-dark));color:#fff;border:none;box-shadow:0 4px 16px var(--crimson-glow)}
        .nbtn-red:hover{box-shadow:0 8px 24px var(--crimson-glow)}

        /* ── MAIN ── */
        .main{
            max-width:700px;margin:0 auto;
            padding:120px 5% 80px;
            text-align:center;
        }
        .page-eyebrow{
            display:inline-flex;align-items:center;gap:8px;
            color:var(--gold);font-size:0.72rem;font-weight:600;
            letter-spacing:2.5px;text-transform:uppercase;margin-bottom:16px;
        }
        .page-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.2rem,5vw,3.8rem);font-weight:700;
            color:var(--text);margin-bottom:14px;line-height:1.1;
        }
        .page-title em{color:var(--gold);font-style:italic}
        .page-sub{font-size:0.95rem;color:var(--text-muted);margin-bottom:44px;line-height:1.7}

        /* ── SCANNER BOX ── */
        .scanner-wrap{
            position:relative;margin:0 auto 40px;
            width:100%;max-width:480px;
            border-radius:20px;overflow:hidden;
            border:1px solid var(--border);
            background:var(--bg2);
        }
        #video{width:100%;display:block;border-radius:20px}
        .scan-overlay{
            position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
            pointer-events:none;
        }
        .scan-frame{
            width:200px;height:200px;position:relative;
        }
        .scan-frame::before,.scan-frame::after,
        .scan-frame span::before,.scan-frame span::after{
            content:'';position:absolute;width:32px;height:32px;
            border-color:var(--gold);border-style:solid;
        }
        .scan-frame::before{top:0;left:0;border-width:3px 0 0 3px}
        .scan-frame::after{top:0;right:0;border-width:3px 3px 0 0}
        .scan-frame span::before{bottom:0;left:0;border-width:0 0 3px 3px}
        .scan-frame span::after{bottom:0;right:0;border-width:0 3px 3px 0}
        .scan-line{
            position:absolute;left:10%;right:10%;height:2px;
            background:linear-gradient(90deg,transparent,var(--crimson),transparent);
            animation:scanMove 2s ease-in-out infinite;
            border-radius:2px;
        }
        @keyframes scanMove{
            0%{top:10%}50%{top:85%}100%{top:10%}
        }
        .scanner-status{
            padding:14px 20px;
            background:var(--bg3);border-top:1px solid var(--border);
            display:flex;align-items:center;justify-content:center;gap:10px;
            font-size:0.84rem;color:var(--text-muted);
        }
        .status-dot{width:8px;height:8px;border-radius:50%;background:var(--crimson);animation:pulse 1.8s infinite}
        @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.4;transform:scale(1.5)}}

        /* ── MESSAGE STATE ── */
        .state-msg{
            display:none;padding:32px;border-radius:16px;
            background:var(--bg2);border:1px solid var(--border);margin-bottom:32px;
            text-align:center;
        }
        .state-msg.show{display:block}
        .state-icon{font-size:2.8rem;margin-bottom:12px}
        .state-title{font-family:'Cormorant Garamond',serif;font-size:1.6rem;font-weight:600;color:var(--text);margin-bottom:8px}
        .state-sub{font-size:0.88rem;color:var(--text-muted)}

        /* ── DEALS GRID ── */
        #deals-container{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
            gap:20px;
            text-align:left;
            margin-top:40px;
        }
        .deal-card{
            background:var(--bg2);border:1px solid var(--border);border-radius:14px;
            overflow:hidden;transition:all 0.4s var(--ease);
            opacity:0;animation:fadeUp 0.5s forwards;
        }
        @keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .deal-card:hover{transform:translateY(-6px);border-color:rgba(212,175,55,0.2);box-shadow:0 16px 40px rgba(0,0,0,0.4)}
        .deal-card img{width:100%;height:175px;object-fit:cover;transition:transform 0.5s var(--ease)}
        .deal-card:hover img{transform:scale(1.05)}
        .deal-body{padding:18px}
        .deal-name{font-family:'Cormorant Garamond',serif;font-size:1.25rem;font-weight:600;color:var(--text);margin-bottom:10px}
        .deal-items{list-style:none}
        .deal-items li{
            display:flex;align-items:center;gap:9px;
            font-size:0.83rem;color:rgba(240,235,227,0.65);
            padding:5px 0;border-bottom:1px solid var(--border);
        }
        .deal-items li:last-child{border:none}
        .deal-items li i{color:var(--crimson);font-size:0.7rem}

        /* ── RESPONSIVE ── */
        @media(max-width:600px){
            .nav-name{font-size:1.1rem}
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="nav-brand">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDFtD61zTOlrKQ06nitMUQMZgpfaSVcBomKQ&s" alt="Logo" class="nav-logo">
            <span class="nav-name">Recipes <em>Restaurant</em></span>
        </a>
        <div style="display:flex;gap:10px">
            <button class="nbtn" onclick="history.back()"><i class="fas fa-arrow-left"></i> Back</button>
            <button class="nbtn nbtn-red"><i class="fas fa-utensils"></i> Menu</button>
        </div>
    </nav>

    <div class="main">
        <div class="page-eyebrow"><i class="fas fa-qrcode"></i> &nbsp;QR Deal Scanner</div>
        <h1 class="page-title">Scan & <em>Unlock</em> Deals</h1>
        <p class="page-sub">Point your camera at our exclusive QR code to instantly reveal today's best deals and special offers.</p>

        <div class="scanner-wrap">
            <video id="video" autoplay playsinline muted></video>
            <div class="scan-overlay">
                <div class="scan-frame">
                    <span></span>
                    <div class="scan-line"></div>
                </div>
            </div>
            <div class="scanner-status">
                <div class="status-dot"></div>
                <span id="statusText">Camera initializing…</span>
            </div>
        </div>

        <!-- Error state -->
        <div class="state-msg" id="errorMsg">
            <div class="state-icon">📷</div>
            <div class="state-title">Camera Access Needed</div>
            <div class="state-sub">Please allow camera access in your browser settings to use the QR scanner.</div>
        </div>

        <!-- Deals output -->
        <div id="deals-container"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
    <script>
        const video = document.getElementById('video');
        const dealsContainer = document.getElementById('deals-container');
        const statusText = document.getElementById('statusText');

        async function startQRScanner() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } });
                video.srcObject = stream;
                video.play();
                statusText.textContent = 'Scanning for QR code…';

                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                function scanQRCode() {
                    if (video.readyState === video.HAVE_ENOUGH_DATA) {
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height);
                        if (code) {
                            const apiUrl = code.data;
                            if (apiUrl === "https://bgnuf22four.com/restaurant-website/public/api/deals") {
                                video.srcObject.getTracks().forEach(t => t.stop());
                                statusText.textContent = 'QR Code detected! Loading deals…';
                                fetch(apiUrl)
                                    .then(r => r.json())
                                    .then(data => displayDeals(data))
                                    .catch(() => {
                                        statusText.textContent = 'Failed to load deals.';
                                    });
                            } else {
                                statusText.textContent = 'Invalid QR code. Please use the restaurant\'s QR.';
                            }
                        }
                    }
                    requestAnimationFrame(scanQRCode);
                }
                scanQRCode();
            } catch (err) {
                document.getElementById('errorMsg').classList.add('show');
                statusText.textContent = 'Camera access denied.';
            }
        }

        function displayDeals(deals) {
            dealsContainer.innerHTML = deals.map((deal, i) => `
                <div class="deal-card" style="animation-delay:${i*0.07}s">
                    <img src="${deal.image}" alt="${deal.title}">
                    <div class="deal-body">
                        <div class="deal-name">${deal.title}</div>
                        <ul class="deal-items">
                            ${deal.items.map(item => `<li><i class="fas fa-circle-check"></i>${item}</li>`).join('')}
                        </ul>
                    </div>
                </div>
            `).join('');
        }

        startQRScanner();
    </script>
</body>
</html>
