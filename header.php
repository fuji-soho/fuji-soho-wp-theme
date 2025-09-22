<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    :root{
      --primary: #0f4c81; /* default theme A */
      --accent:  #f59e0b;
      --muted: #6b7280;
      --bg: #ffffff;
      --card: #f8fafc;
      --radius: 12px;
      --maxw: 1100px;
      --gap: 20px;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    /* alternative theme classes */
    .theme-b{ --primary:#0b6b4a; --accent:#06b6d4; }
    .theme-c{ --primary:#111827; --accent:#ef4444; }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{margin:0;background:var(--bg);color:#0f172a;line-height:1.5;-webkit-font-smoothing:antialiased}
    .container{max-width:var(--maxw);margin:0 auto;padding:36px}

    header{display:flex;align-items:center;justify-content:space-between;padding:8px 0}
    .brand{display:flex;gap:14px;align-items:center}
    .logo-wrap{width:56px;height:56px;flex:0 0 56px}
    .site-title{font-weight:700;margin:0}
    .site-sub{margin:0;font-size:13px;color:var(--muted)}

    nav a{margin-left:18px;text-decoration:none;color:var(--muted);font-size:15px}
    nav a.cta{border:1px solid rgba(15,20,42,0.06);padding:8px 12px;border-radius:10px}
    nav a:hover{color:var(--primary)}

    /* hero */
    .hero{display:grid;grid-template-columns:1fr 420px;gap:32px;align-items:center;padding:24px 0}
    .eyebrow{font-size:13px;color:var(--muted);text-transform:uppercase;letter-spacing:1px}
    .headline{font-size:34px;margin:10px 0 8px;line-height:1.05}
    .lead{color:var(--muted);max-width:60ch}
    .hero-ctas{margin-top:18px;display:flex;gap:12px}
    .btn{display:inline-block;padding:12px 18px;border-radius:10px;text-decoration:none}
    .btn.primary{background:var(--primary);color:#fff}
    .btn.ghost{border:1px solid rgba(15,20,42,0.06)}

    .profile-card{background:var(--card);padding:18px;border-radius:14px;border:1px solid rgba(15,20,42,0.04)}
    .avatar{width:80px;height:80px;border-radius:50%;background:linear-gradient(180deg, rgba(15,76,129,0.06),transparent);display:flex;align-items:center;justify-content:center}
    .tags{display:flex;gap:8px;margin-top:12px;flex-wrap:wrap}
    .tag{padding:6px 10px;border-radius:999px;border:1px solid rgba(0,0,0,0.06);font-size:13px}

    /* services */
    .services{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin:28px 0}
    .service{padding:18px;border-radius:12px;background:white;border:1px solid rgba(15,20,42,0.04)}
    .service h4{margin:0 0 8px}
    .service p{margin:0;color:var(--muted);font-size:14px}

    /* works */
    .works{background:#f8fafc;padding:28px;border-radius:12px}
    .works-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:16px}
    .work{background:white;border-radius:10px;overflow:hidden;border:1px solid rgba(15,20,42,0.04)}
    .work .thumb{height:140px;background:linear-gradient(135deg, rgba(15,76,129,0.06),transparent);display:flex;align-items:flex-end;padding:12px}

    /* about/contact */
    .two-col{display:grid;grid-template-columns:1fr 1fr;gap:18px}
    form input, form textarea{width:100%;padding:12px;border-radius:10px;border:1px solid rgba(15,20,42,0.06)}
    .form-row{display:flex;gap:12px}

    footer{margin-top:34px;padding:18px 0;border-top:1px solid rgba(15,20,42,0.04);color:var(--muted);font-size:14px;display:flex;justify-content:space-between;align-items:center}

    /* decorative big logo */
    .big-logo{position:fixed;right:28px;bottom:28px;opacity:0.12;pointer-events:none;transform:scale(1.6)}

    /* responsive */
    @media (max-width:1000px){
      .hero{grid-template-columns:1fr;}
      .works-grid{grid-template-columns:repeat(2,1fr)}
      .services{grid-template-columns:repeat(2,1fr)}
      .two-col{grid-template-columns:1fr}
      nav{display:none}
      .big-logo{display:none}
    }
    @media (max-width:560px){
      .works-grid{grid-template-columns:1fr}
      .service{padding:14px}
      .headline{font-size:26px}
    }
  </style>
  
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="container" id="top">
    <header>
      <div class="brand">
        <div class="logo-wrap" aria-hidden>
          <!-- simple SVG logo -->
          <svg viewBox="0 0 120 120" width="56" height="56" xmlns="http://www.w3.org/2000/svg">
            <circle cx="60" cy="60" r="56" stroke="var(--primary)" stroke-width="4" fill="white"></circle>
            <path d="M18 82 L60 28 L102 82 Z" fill="var(--primary)"></path>
          </svg>
        </div>
        <div>
          <h1 class="site-title"><?php bloginfo('name'); ?></h1>
          <p class="site-sub"><?php bloginfo('description'); ?></p>
        </div>
      </div>

      <nav aria-label="Main navigation">
        <a href="#services">Services</a>
        <a href="#works">Portfolio</a>
        <a href="#about">About</a>
        <a class="cta" href="#contact">Contact</a>
      </nav>
    </header>
