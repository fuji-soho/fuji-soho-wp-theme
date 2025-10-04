<?php get_header(); ?>
<main>
  <?php if (function_exists('fuji_breadcrumb')) fuji_breadcrumb(); ?>
  <section class="works">
    <h1>制作実績一覧</h1>

    <?php
    // ▼ ピックアップを先頭に表示するカスタムクエリ
    $args = array(
      'post_type'      => 'works',
      'posts_per_page' => -1,
      'meta_key'       => 'pickup',
      'orderby'        => array(
        'meta_value_num' => 'DESC', // pickup=1 を先頭に
        'date'           => 'DESC', // その後は日付順
      ),
    );
    $works_query = new WP_Query($args);
    ?>

    <div class="works-grid">
      <?php if ($works_query->have_posts()): ?>
        <?php while ($works_query->have_posts()): $works_query->the_post(); ?>
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
        <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p>制作実績はまだありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
