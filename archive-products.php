<?php get_header(); ?>

<main class="product-archive">
  <?php if (function_exists('fuji_breadcrumb')) fuji_breadcrumb(); ?>

  <section class="product-archive__header" aria-labelledby="product-archive-title">
    <p class="product-archive__eyebrow">Products</p>
    <h1 id="product-archive-title">プロダクト</h1>
    <p class="product-archive__lead">
      fuji-sohoが制作・運営しているアプリやWebサービスを紹介します。
    </p>
  </section>

  <?php if (have_posts()): ?>
    <div class="product-archive__grid">
      <?php while (have_posts()): the_post(); ?>
        <?php
        $product_url = fuji_get_product_url();
        $product_lead = fuji_get_product_lead();
        ?>
        <article class="product-card">
          <a class="product-card__link" href="<?php echo esc_url($product_url); ?>">
            <div class="product-card__thumb">
              <?php if (has_post_thumbnail()): ?>
                <?php
                the_post_thumbnail(
                  'product-card',
                  array(
                    'alt' => esc_attr(get_the_title()),
                  )
                );
                ?>
              <?php else: ?>
                <div class="product-card__thumb-placeholder" aria-hidden="true"></div>
              <?php endif; ?>
            </div>

            <div class="product-card__body">
              <h2 class="product-card__title"><?php the_title(); ?></h2>
              <?php if (!empty($product_lead)): ?>
                <p class="product-card__lead"><?php echo esc_html($product_lead); ?></p>
              <?php endif; ?>
              <span class="product-card__button">詳しく見る</span>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>

    <div class="product-archive__pagination">
      <?php
      the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
      ));
      ?>
    </div>
  <?php else: ?>
    <p class="product-archive__empty">プロダクトはまだ登録されていません。</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
