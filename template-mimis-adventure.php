<?php
/**
 * Template Name: ミミの冒険 共通ページ
 * Template Post Type: page
 *
 * Shared page template for Mimi's Adventure pages.
 *
 * @package fuji-soho-wp-theme
 */

get_header();
?>

<main class="app-page app-page--mimis-adventure">
	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<?php get_template_part( 'template-parts/mimis-adventure/app-header' ); ?>
		<?php get_template_part( 'template-parts/mimis-adventure/app-navigation' ); ?>

		<div class="mimi-page-shell">
			<header class="mimi-page-heading">
				<h1 class="mimi-page-title"><?php the_title(); ?></h1>
				<div class="mimi-page-meta" aria-label="<?php esc_attr_e( 'Page information', 'fuji-soho-wp-theme' ); ?>">
					<time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
						<?php echo esc_html( fuji_mimis_adventure_get_modified_date_text( get_the_ID() ) ); ?>
					</time>
				</div>
			</header>

			<article class="mimi-content-card">
				<?php the_content(); ?>
			</article>
		</div>

	<?php endwhile; ?>
</main>

<?php
get_footer();
