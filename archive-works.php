<?php get_header(); ?>
<main>
  <section class="works">
    <h2>制作実績</h2>
    <div class="works-grid">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="work">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php else: ?>
              <div style="height:140px;background:var(--card)"></div>
            <?php endif; ?>
            <h4><?php the_title(); ?></h4>
          </a>
          <div class="excerpt"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; else: ?>
        <p>制作実績はまだありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
