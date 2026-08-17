<?php
/**
 * App navigation for Mimi's Adventure pages.
 *
 * @package fuji-soho-wp-theme
 */

$mimi_nav_items = array(
	array(
		'label_ja' => __( 'ゲーム紹介', 'fuji-soho-wp-theme' ),
		'label_en' => __( 'Game', 'fuji-soho-wp-theme' ),
		'paths' => array( 'mimis-adventure', 'mimis-adventure/en' ),
	),
	array(
		'label_ja' => __( 'プライバシーポリシー', 'fuji-soho-wp-theme' ),
		'label_en' => __( 'Privacy Policy', 'fuji-soho-wp-theme' ),
		'paths' => array( 'mimis-adventure/privacy-policy', 'mimis-adventure/en/privacy-policy' ),
	),
	array(
		'label_ja' => __( '利用規約', 'fuji-soho-wp-theme' ),
		'label_en' => __( 'Terms', 'fuji-soho-wp-theme' ),
		'paths' => array( 'mimis-adventure/terms', 'mimis-adventure/en/terms' ),
	),
	array(
		'label_ja' => __( 'サポート', 'fuji-soho-wp-theme' ),
		'label_en' => __( 'Support', 'fuji-soho-wp-theme' ),
		'paths' => array( 'mimis-adventure/support', 'mimis-adventure/en/support' ),
	),
	array(
		'label_ja' => __( 'ライセンス', 'fuji-soho-wp-theme' ),
		'label_en' => __( 'Licenses', 'fuji-soho-wp-theme' ),
		'paths' => array( 'mimis-adventure/licenses', 'mimis-adventure/en/licenses' ),
	),
);

$mimi_current_post = get_post();
$mimi_current_path = $mimi_current_post instanceof WP_Post ? trim( get_page_uri( $mimi_current_post ), '/' ) : '';
$mimi_is_english   = fuji_mimis_adventure_is_english_page( $mimi_current_post );
?>

<nav class="mimi-app-navigation" aria-label="<?php esc_attr_e( 'Mimi’s Adventure page navigation', 'fuji-soho-wp-theme' ); ?>">
	<ul class="mimi-app-navigation__list">
		<?php foreach ( $mimi_nav_items as $mimi_nav_item ) : ?>
			<?php
			$mimi_nav_path = $mimi_is_english ? $mimi_nav_item['paths'][1] : $mimi_nav_item['paths'][0];
			$mimi_nav_page = get_page_by_path( $mimi_nav_path );
			$mimi_current  = $mimi_nav_path === $mimi_current_path;
			$mimi_nav_label = $mimi_is_english ? $mimi_nav_item['label_en'] : $mimi_nav_item['label_ja'];
			?>
			<?php if ( $mimi_nav_page instanceof WP_Post && 'publish' === get_post_status( $mimi_nav_page ) ) : ?>
				<li class="mimi-app-navigation__item">
					<a class="mimi-app-navigation__link<?php echo $mimi_current ? ' is-current' : ''; ?>" href="<?php echo esc_url( get_permalink( $mimi_nav_page ) ); ?>"<?php echo $mimi_current ? ' aria-current="page"' : ''; ?>>
						<?php echo esc_html( $mimi_nav_label ); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</nav>
