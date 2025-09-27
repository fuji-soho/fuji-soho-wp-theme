<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?17">


<script>
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.menu-toggle');
  const menu = document.getElementById('mobileMenu');
  const overlay = document.getElementById('menuOverlay');
  const closeBtn = document.querySelector('.menu-close');

  // メニュー開閉
  toggle.addEventListener('click', () => {
    menu.classList.toggle('active');
    overlay.classList.toggle('active');
  });

  // ✕ボタンで閉じる
  closeBtn.addEventListener('click', () => {
    menu.classList.remove('active');
    overlay.classList.remove('active');
  });

  // オーバーレイで閉じる
  overlay.addEventListener('click', () => {
    menu.classList.remove('active');
    overlay.classList.remove('active');
  });
});
</script>

<?php if (is_singular()): ?>
  <meta name="description" content="<?php 
    $content = strip_tags( get_the_content() );   // 本文からタグを除去
    $content = trim( preg_replace('/\s+/', ' ', $content) ); // 改行や余分な空白を1つに
    $description = mb_substr( $content, 0, 120 ); // 120文字でカット
    echo esc_attr( $description . ( mb_strlen($content) > 120 ? '...' : '' ) );
  ?>">
<?php elseif (is_home() || is_archive()): ?>
  <meta name="description" content="<?php bloginfo('description'); ?>">
<?php endif; ?>

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

      <!-- ナビゲーション -->
    <nav class="main-nav" aria-label="メインメニュー">
      <a href="/#services">サービス</a>
      <a href="/works">制作実績</a>
      <a href="/blog">ブログ</a>
      <a href="/#about">自己紹介</a>
      <a href="/contact" class="cta">お問い合わせ</a>
    </nav>
      
      <!-- ハンバーガーボタン -->
      <button class="menu-toggle" aria-label="メニューを開閉">☰</button>
      
      <!-- スマホメニュー -->
<div class="mobile-menu" id="mobileMenu">
  <!-- ✕ボタン -->
  <button class="menu-close" aria-label="メニューを閉じる">✕</button>

  <nav aria-label="スマホメニュー">
    <a href="/">トップ</a>
    <a href="/#services">サービス</a>
    <a href="/works">制作実績</a>
    <a href="/blog">ブログ</a>
    <a href="/#about">自己紹介</a>
    <a href="/contact" class="cta">お問い合わせ</a>
  </nav>
</div>
<div class="menu-overlay" id="menuOverlay"></div>
      
    </header>
