<?php
/**
 * App navigation for Amedama Kobo pages.
 *
 * @package fuji-soho-wp-theme
 */

$amedama_nav_items = array(
	array(
		'label'           => __( 'アプリ紹介', 'fuji-soho-wp-theme' ),
		'path'            => 'amedama-kobo',
		'require_content' => true,
	),
	array(
		'label' => __( 'プライバシーポリシー', 'fuji-soho-wp-theme' ),
		'path'  => 'amedama-kobo/privacy-policy',
	),
	array(
		'label' => __( 'サポート', 'fuji-soho-wp-theme' ),
		'path'  => 'amedama-kobo/support',
	),
);

$amedama_current_post = get_post();
$amedama_current_path = $amedama_current_post instanceof WP_Post ? trim( get_page_uri( $amedama_current_post ), '/' ) : '';
$amedama_nav_links    = array();

foreach ( $amedama_nav_items as $amedama_nav_item ) {
	$amedama_nav_page = get_page_by_path( $amedama_nav_item['path'] );

	if ( $amedama_nav_page instanceof WP_Post && 'publish' === get_post_status( $amedama_nav_page ) ) {
		if ( ! empty( $amedama_nav_item['require_content'] ) && '' === trim( $amedama_nav_page->post_content ) ) {
			continue;
		}

		$amedama_nav_links[] = array(
			'label'   => $amedama_nav_item['label'],
			'url'     => get_permalink( $amedama_nav_page ),
			'current' => $amedama_nav_item['path'] === $amedama_current_path,
		);
	}
}
?>

<?php if ( $amedama_nav_links ) : ?>
	<nav class="amedama-app-navigation" aria-label="<?php esc_attr_e( '飴玉工房ページナビゲーション', 'fuji-soho-wp-theme' ); ?>">
		<ul class="amedama-app-navigation__list">
			<?php foreach ( $amedama_nav_links as $amedama_nav_link ) : ?>
				<li class="amedama-app-navigation__item">
					<a class="amedama-app-navigation__link<?php echo $amedama_nav_link['current'] ? ' is-current' : ''; ?>" href="<?php echo esc_url( $amedama_nav_link['url'] ); ?>"<?php echo $amedama_nav_link['current'] ? ' aria-current="page"' : ''; ?>>
						<?php echo esc_html( $amedama_nav_link['label'] ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
<?php endif; ?>
