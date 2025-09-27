<?php get_header(); ?>
<div class="container work-single">

  <!-- タイトル & 概要 -->
  <header class="work-header">
    <h1 class="work-title"><?php the_title(); ?></h1>
    <?php if (function_exists('get_field') && get_field('work_overview')): ?>
      <p class="work-lead"><?php echo esc_html(get_field('work_overview')); ?></p>
    <?php endif; ?>
  </header>

  <!-- アイキャッチ + メタ情報カード -->
  <div class="work-hero">
    <div class="work-thumb">
      <div class="work-thumb-inner">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('work-thumb'); ?>
        <?php endif; ?>
      </div>
    </div>

    <aside class="work-meta-cards">
      <?php if (function_exists('get_field') && get_field('work_period')): ?>
      <div class="info-card">
        <h3>制作期間</h3>
        <p><?php echo esc_html(get_field('work_period')); ?></p>
      </div>
      <?php endif; ?>

      <?php if (function_exists('get_field') && get_field('work_scope')): ?>
      <div class="info-card">
        <h3>担当範囲</h3>
        <ul>
          <?php foreach (get_field('work_scope') as $scope): ?>
            <li><?php echo esc_html($scope); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <?php if (function_exists('get_field') && get_field('work_tech')): ?>
      <div class="info-card">
        <h3>使用技術</h3>
        <ul>
          <?php foreach (get_field('work_tech') as $tech): ?>
            <li><?php echo esc_html($tech); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </aside>
  </div>

  <!-- 本文：課題 / 解決アプローチ / 成果 -->
  <main class="work-main">
    <?php if (function_exists('get_field') && get_field('work_challenges')): ?>
    <section class="work-section">
      <h2>課題</h2>
      <p><?php echo nl2br(esc_html(get_field('work_challenges'))); ?></p>
    </section>
    <?php endif; ?>

    <?php if (function_exists('get_field') && get_field('work_solution')): ?>
    <section class="work-section">
      <h2>解決アプローチ</h2>
      <p><?php echo nl2br(esc_html(get_field('work_solution'))); ?></p>
    </section>
    <?php endif; ?>

    <?php if (function_exists('get_field') && get_field('work_result')): ?>
    <section class="work-section">
      <h2>成果</h2>
      <p><?php echo nl2br(esc_html(get_field('work_result'))); ?></p>
    </section>
    <?php endif; ?>
  </main>

  <?php if (function_exists('get_field') && get_field('work_tech')): ?>
<section class="work-tech">
  <h2>関連技術</h2>
  <ul class="tech-list">
    <?php foreach (get_field('work_tech') as $tech): ?>
      <li><?php echo esc_html($tech); ?></li>
    <?php endforeach; ?>
  </ul>
</section>
<?php endif; ?>

  <!-- 関連実績 -->
  <section class="work-related">
  <h2>関連する制作実績</h2>
  <div class="works-grid">
    <?php
    $related = new WP_Query([
      'post_type' => 'works',
      'posts_per_page' => 3,
      'post__not_in' => [get_the_ID()],
      'tax_query' => [
        [
          'taxonomy' => 'work_category', // ← 独自タクソノミーに変更
          'field'    => 'id',
          'terms'    => wp_get_post_terms(get_the_ID(), 'work_category', ['fields' => 'ids']),
        ],
      ],
    ]);
    if ($related->have_posts()) :
      while ($related->have_posts()) : $related->the_post(); ?>
        <article class="work">
          <a href="<?php the_permalink(); ?>">
            <div class="thumb"><?php the_post_thumbnail('work-card'); ?></div>
            <h4><?php the_title(); ?></h4>
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>

</div>
<?php get_footer(); ?>
