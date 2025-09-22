<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  
  <script>
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.main-nav');
  const icon = document.querySelector('.menu-icon');

  toggle.addEventListener('click', () => {
    nav.classList.toggle('active');
    if (nav.classList.contains('active')) {
      icon.textContent = '✕';
    } else {
      icon.textContent = '☰';
    }
  });
});
</script>
  
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="container" id="top">
    <header>
      <div class="brand">
        <div class="logo-wrap" aria-hidden>
          <!-- simple SVG logo -->
          <a href="/">
          <svg viewBox="0 0 120 120" width="56" height="56" xmlns="http://www.w3.org/2000/svg">
            <circle cx="60" cy="60" r="56" stroke="var(--primary)" stroke-width="4" fill="white"></circle>
            <path d="M18 82 L60 28 L102 82 Z" fill="var(--primary)"></path>
          </svg>
          </a>
        </div>
        <div class="site-title-sub">
          <a href="/">
          	<h1 class="site-title"><?php bloginfo('name'); ?></h1>
          	<p class="site-sub"><?php bloginfo('description'); ?></p>
          </a>
        </div>
      </div>

      <nav class="main-nav" aria-label="Main navigation">
        <a href="/#services">Services</a>
        <a href="/works">Portfolio</a>
        <a href="/#about">About</a>
        <a href="/blog">Blog</a>
        <a href="#contact">Contact</a>
      </nav>
      
      <!-- ハンバーガーボタン -->
      <button class="menu-toggle" aria-label="メニューを開閉">
        <span class="menu-icon">☰</span>
      </button>
    </header>
