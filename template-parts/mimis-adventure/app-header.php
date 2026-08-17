<?php
/**
 * App header for Mimi's Adventure pages.
 *
 * @package fuji-soho-wp-theme
 */

$mimi_character_path = get_template_directory() . '/assets/img/mimis-adventure/mimi-character.png';
$mimi_character_uri  = get_template_directory_uri() . '/assets/img/mimis-adventure/mimi-character.png';
$mimi_app_icon_path  = get_template_directory() . '/assets/img/mimis-adventure/app-icon.png';
$mimi_app_icon_uri   = get_template_directory_uri() . '/assets/img/mimis-adventure/app-icon.png';

$mimi_current_path = '';
$mimi_current_post = get_post();
$mimi_is_english   = fuji_mimis_adventure_is_english_page( $mimi_current_post );

if ( $mimi_current_post instanceof WP_Post ) {
	$mimi_current_path = trim( get_page_uri( $mimi_current_post ), '/' );
}

$mimi_language_paths = array(
	'ja' => fuji_mimis_adventure_get_language_page_path( $mimi_current_post, 'ja' ),
	'en' => fuji_mimis_adventure_get_language_page_path( $mimi_current_post, 'en' ),
);
?>

<section class="mimi-app-header" aria-labelledby="mimi-app-title">
	<div class="mimi-app-header__content">
		<div class="mimi-app-header__identity">
			<?php if ( file_exists( $mimi_app_icon_path ) ) : ?>
				<img class="mimi-app-header__icon" src="<?php echo esc_url( $mimi_app_icon_uri ); ?>" alt="" width="96" height="96" loading="lazy" decoding="async">
			<?php endif; ?>
			<div class="mimi-app-header__copy">
				<p class="mimi-app-header__eyebrow"><?php esc_html_e( 'Fantasy puzzle game', 'fuji-soho-wp-theme' ); ?></p>
				<?php if ( $mimi_is_english ) : ?>
					<div class="mimi-app-header__title-main mimi-app-header__title-en" id="mimi-app-title" lang="en">
						<span class="mimi-app-header__title-en-main"><?php echo esc_html( 'Mimi’s Adventure' ); ?></span>
						<span class="mimi-app-header__title-en-sub"><?php echo esc_html( '— Mimi and the Seven Colored Keys —' ); ?></span>
					</div>
					<div class="mimi-app-header__title-secondary mimi-app-header__title-ja" lang="ja">
						<?php echo esc_html( 'ミミの冒険 ～ミミと七色の鍵～' ); ?>
					</div>
				<?php else : ?>
					<div class="mimi-app-header__title-main mimi-app-header__title-ja" id="mimi-app-title" lang="ja">
						<span class="mimi-app-header__title-ja-main"><?php echo esc_html( 'ミミの冒険' ); ?></span>
						<span class="mimi-app-header__title-ja-sub"><?php echo esc_html( '～ミミと七色の鍵～' ); ?></span>
					</div>
					<div class="mimi-app-header__title-secondary mimi-app-header__title-en" lang="en">
						<?php echo esc_html( 'Mimi’s Adventure — Mimi and the Seven Colored Keys —' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<nav class="mimi-language-switcher" aria-label="<?php esc_attr_e( 'Language switcher', 'fuji-soho-wp-theme' ); ?>">
			<?php foreach ( $mimi_language_paths as $mimi_language_code => $mimi_language_path ) : ?>
				<?php
				$mimi_language_page = get_page_by_path( $mimi_language_path );
				$mimi_language_text = 'ja' === $mimi_language_code ? '日本語' : 'English';
				$mimi_is_current    = fuji_mimis_adventure_get_page_language( $mimi_current_post ) === $mimi_language_code;
				?>
				<?php if ( $mimi_language_page instanceof WP_Post && 'publish' === get_post_status( $mimi_language_page ) ) : ?>
					<a class="mimi-language-switcher__item<?php echo $mimi_is_current ? ' is-current' : ''; ?>" href="<?php echo esc_url( get_permalink( $mimi_language_page ) ); ?>"<?php echo $mimi_is_current ? ' aria-current="page"' : ''; ?>>
						<?php echo esc_html( $mimi_language_text ); ?>
					</a>
				<?php else : ?>
					<span class="mimi-language-switcher__item is-disabled" aria-disabled="true">
						<?php echo esc_html( $mimi_language_text ); ?>
					</span>
				<?php endif; ?>
			<?php endforeach; ?>
		</nav>
	</div>

	<?php if ( file_exists( $mimi_character_path ) ) : ?>
		<div class="mimi-app-header__character">
			<img src="<?php echo esc_url( $mimi_character_uri ); ?>" alt="" width="220" height="220" loading="lazy" decoding="async">
		</div>
	<?php endif; ?>
</section>
