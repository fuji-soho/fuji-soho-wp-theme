<?php get_header(); ?>

<main>
  <section id="blog">
    <div class="works">
      <h2>ブログ記事一覧</h2>
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
        <?php endwhile; ?>
      </div>

      <!-- ページネーション -->
      <div class="pagination" style="margin-top:20px">
        <?php the_posts_pagination(array(
          'mid_size'  => 2,
          'prev_text' => '« 前へ',
          'next_text' => '次へ »',
        )); ?>
      </div>

      <?php else: ?>
        <p>まだ記事がありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
