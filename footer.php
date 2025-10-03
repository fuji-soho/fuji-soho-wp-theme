    <footer style="padding:12px 0">
  <!-- reCAPTCHA 注意文 -->
  <div class="recaptcha-note" style="text-align:center; margin-bottom:12px">
    このサイトは reCAPTCHA によって保護されており、<br>
    <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">プライバシーポリシー</a> と
    <a href="https://policies.google.com/terms" target="_blank" rel="noopener">利用規約</a> が適用されます。<br />
  </div>
  <div class="site-policy-link">
  <a href="<?php echo home_url('/privacy-policy'); ?>">当サイトのプライバシーポリシー</a>
  <a style="margin-left:15px;" href="<?php echo home_url('/disclaimer'); ?>">免責事項</a>
</div>

  <!-- 2行目: 左にロゴ＋著作権、右に Made with care -->
  <div class="footer-inner">
    <!-- 左側 -->
    <div class="footer-left" >
      <div style="width:44px;height:44px">
        <a href="/">
        <svg viewBox="0 0 120 120" width="44" height="44" xmlns="http://www.w3.org/2000/svg">
          <circle cx="60" cy="60" r="56" stroke="var(--primary)" stroke-width="4" fill="white"></circle>
          <path d="M18 82 L60 28 L102 82 Z" fill="var(--primary)"></path>
        </svg>
        </a>
      </div>
      <div>
        <div style="font-weight:600"><?php bloginfo('name'); ?></div>
        <div style="color:var(--muted);font-size:13px">
          © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
        </div>
      </div>
    </div>

    <!-- 右側 -->
    <div class="footer-right" style="color:var(--muted);font-size:14px;white-space:nowrap">
      Made with care • Remote Friendly
    </div>
  </div>
</footer>
  </div><!-- /.container -->

  <div class="big-logo" aria-hidden>
    <svg viewBox="0 0 120 120" width="220" height="220" xmlns="http://www.w3.org/2000/svg">
      <circle cx="60" cy="60" r="56" stroke="var(--primary)" stroke-width="4" fill="white"></circle>
      <path d="M18 82 L60 28 L102 82 Z" fill="var(--primary)"></path>
    </svg>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
