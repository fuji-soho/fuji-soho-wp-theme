<?php get_header(); ?>

<main>
  <?php fuji_breadcrumb(); ?>
  <article class="blog-detail">

  <!-- パンくず -->
  <?php if ( function_exists('bcn_display') ) : ?>
    <div class="breadcrumb" aria-label="パンくずリスト">
      <?php bcn_display(); ?>
    </div>
  <?php endif; ?>

  <!-- アイキャッチ -->
  <?php if ( has_post_thumbnail() ): ?>
    <div class="eyecatch">
      <?php the_post_thumbnail('large'); ?>
    </div>
  <?php endif; ?>

  <!-- タイトル -->
  <h1 class="title"><?php the_title(); ?></h1>

  <!-- 投稿日・カテゴリ -->
  <div class="meta">
    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
    <?php the_category(', '); ?>
  </div>

  <!-- 本文 -->
  <div class="content">
    <?php the_content(); ?>
  </div>

  <!-- SNSシェアボタン -->
  <ul class="share-buttons">
    <li><a href="#" class="btn-x"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
    <li><a href="#" class="btn-f"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
    <li><a href="#" class="btn-l"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a></li>
    <li><a href="#" class="btn-h"><i class="fa-solid fa-bookmark"></i> はてブ</a></li>
  </ul>


  <!-- 前後記事ナビ -->
  <div class="post-nav">
    <div class="prev"><?php previous_post_link('%link', '← %title'); ?></div>
    <div class="next"><?php next_post_link('%link', '%title →'); ?></div>
  </div>

  <!-- 関連記事 -->
  <div class="related-posts">
    <h3>関連記事</h3>
    <div class="related-grid">
      <?php
        $categories = wp_get_post_categories(get_the_ID());
        $args = array(
          'category__in' => $categories,
          'post__not_in' => array(get_the_ID()),
          'posts_per_page' => 3,
        );
        $related = new WP_Query($args);
        if ($related->have_posts()):
          while($related->have_posts()): $related->the_post(); ?>
            <div class="related-card">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                <div class="info"><?php the_title(); ?></div>
              </a>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        endif;
      ?>
    </div>
  </div>

</article>

</main>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const pageUrl   = encodeURIComponent(window.location.href);
  const pageTitle = encodeURIComponent(document.title);

  // Base64デコード関数
  const decode = str => atob(str);

  // Twitter (X)
  document.querySelector(".btn-x")?.addEventListener("click", e => {
    e.preventDefault();
    const tw = decode("aHR0cHM6Ly90d2l0dGVyLmNvbS9pbnRlbnQvdHdlZXQ/dXJsPQ=="); // "https://twitter.com/intent/tweet?url="
    window.open(`${tw}${pageUrl}&text=${pageTitle}`, "_blank", "width=600,height=500");
  });

  // Facebook
  document.querySelector(".btn-f")?.addEventListener("click", e => {
    e.preventDefault();
    const fb = decode("aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL3NoYXJlci9zaGFyZXIucGhwP3U9"); // "https://www.facebook.com/sharer/sharer.php?u="
    window.open(`${fb}${pageUrl}`, "_blank", "width=600,height=500");
  });

  // LinkedIn
  document.querySelector(".btn-l")?.addEventListener("click", e => {
    e.preventDefault();
    const li = decode("aHR0cHM6Ly93d3cubGlua2VkaW4uY29tL3NoYXJlQXJ0aWNsZT9taW5pPXRydWUmdXJsPQ=="); // "https://www.linkedin.com/shareArticle?mini=true&url="
    window.open(`${li}${pageUrl}&title=${pageTitle}`, "_blank", "width=600,height=500");
  });

  // はてなブックマーク
  document.querySelector(".btn-h")?.addEventListener("click", e => {
    e.preventDefault();
    const hb = decode("aHR0cHM6Ly9iLmhhdGVuYS5uZS5qcC9lbnRyeS8="); // "https://b.hatena.ne.jp/entry/"
    window.open(`${hb}${pageUrl}`, "_blank", "width=600,height=500");
  });
});
</script>

<?php get_footer(); ?>
