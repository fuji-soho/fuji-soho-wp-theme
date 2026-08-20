<?php
/**
 * Template Name: 飴玉工房 共通ページ
 * Template Post Type: page
 *
 * Shared page template for Amedama Kobo pages.
 *
 * @package fuji-soho-wp-theme
 */

get_header();
?>

<main class="app-page app-page--amedama-kobo">
	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<?php if ( function_exists( 'fuji_breadcrumb' ) ) : ?>
			<?php fuji_breadcrumb(); ?>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/amedama-kobo/app-header' ); ?>
		<?php get_template_part( 'template-parts/amedama-kobo/app-navigation' ); ?>

		<div class="amedama-page-shell">
			<header class="amedama-page-heading">
				<h1 class="amedama-page-title"><?php the_title(); ?></h1>
				<div class="amedama-page-meta" aria-label="<?php esc_attr_e( 'ページ情報', 'fuji-soho-wp-theme' ); ?>">
					<time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
						<?php echo esc_html( '最終更新日：' . get_the_modified_date( 'Y年n月j日' ) ); ?>
					</time>
				</div>
			</header>

			<article class="amedama-content-card">
				<?php if ( trim( get_the_content() ) ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<p><?php echo esc_html( '本文はWordPress管理画面から入力します。' ); ?></p>
				<?php endif; ?>
			</article>
		</div>

	<?php endwhile; ?>
</main>

<?php
get_footer();
