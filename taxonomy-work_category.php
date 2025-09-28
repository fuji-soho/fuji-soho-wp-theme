<?php get_header(); ?>
<div class="container work-archive">

  <!-- ページタイトル -->
  <header class="archive-header">
    <h1 class="archive-title">
      制作実績カテゴリー: <?php single_term_title(); ?>
    </h1>
    <?php if (term_description()) : ?>
      <p class="archive-description"><?php echo term_description(); ?></p>
    <?php endif; ?>
  </header>

  <!-- 制作実績一覧 -->
  <div class="work-archive-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="work-archive-item">
        <a href="<?php the_permalink(); ?>">
          <div class="thumb">
            <?php the_post_thumbnail('work-card'); ?>
          </div>
          <h4><?php the_title(); ?></h4>
          <?php if (get_field('work_overview')): ?>
            <p class="excerpt"><?php echo esc_html(get_field('work_overview')); ?></p>
          <?php endif; ?>
        </a>
      </article>
    <?php endwhile; endif; ?>
  </div>

</div>
<?php get_footer(); ?>
