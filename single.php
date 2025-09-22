<?php get_header(); ?>

<main>
  <article class="blog-detail">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <header style="margin-bottom:20px">
        <h1><?php the_title(); ?></h1>
        <p style="color:var(--muted);font-size:14px">
          投稿日: <?php the_time('Y年n月j日'); ?> | カテゴリー: <?php the_category(', '); ?>
        </p>
      </header>

      <?php if (has_post_thumbnail()): ?>
        <div class="thumb" style="margin-bottom:20px">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="content">
        <?php the_content(); ?>
      </div>

      <footer style="margin-top:30px;color:var(--muted)">
        <?php the_tags('タグ: ', ', '); ?>
      </footer>

      <!-- 前後の記事ナビゲーション -->
      <nav class="post-nav" style="margin-top:30px;display:flex;justify-content:space-between;">
        <div><?php previous_post_link('« %link'); ?></div>
        <div><?php next_post_link('%link »'); ?></div>
      </nav>

    <?php endwhile; endif; ?>
  </article>
</main>

<?php get_footer(); ?>
