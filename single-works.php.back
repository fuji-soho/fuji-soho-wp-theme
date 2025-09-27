<?php get_header(); ?>
<main>
  <?php if (function_exists('fuji_breadcrumb')) fuji_breadcrumb(); ?>
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="work-detail">
      <h1><?php the_title(); ?></h1>
      <?php if (has_post_thumbnail()): ?>
        <div class="thumb"><?php the_post_thumbnail('large'); ?></div>
      <?php endif; ?>
      <div class="content"><?php the_content(); ?></div>
    </article>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
