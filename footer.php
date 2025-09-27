    <footer>
      <div style="display:flex;align-items:center;gap:12px">
        <div style="width:44px;height:44px">
          <svg viewBox="0 0 120 120" width="44" height="44" xmlns="http://www.w3.org/2000/svg">
            <circle cx="60" cy="60" r="56" stroke="var(--primary)" stroke-width="4" fill="white"></circle>
            <path d="M18 82 L60 28 L102 82 Z" fill="var(--primary)"></path>
          </svg>
        </div>
        <div>
          <div style="font-weight:600"><?php bloginfo('name'); ?></div>
          <div style="color:var(--muted);font-size:13px">ﾂｩ <?php echo date('Y'); ?> <?php bloginfo('name'); ?></div>
        </div>
      </div>
      <p class="recaptcha-notice">
  		このサイトは reCAPTCHA によって保護されており、
  		<a href="https://policies.google.com/privacy" target="_blank" rel="noopener">プライバシーポリシー</a> と
  		<a href="https://policies.google.com/terms" target="_blank" rel="noopener">利用規約</a> が適用されます。
	  </p>
      <div style="color:var(--muted)">Made with care Remote Friendly</div>
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
