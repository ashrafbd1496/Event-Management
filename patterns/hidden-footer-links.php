<?php
/**
 * Title: Footer links
 * Slug: event-management/footer-links
 * Categories: text
 * Inserter: no
 *
 * @package event-management
 * @since 1.0.0
 */
?>

<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"fontSize":"extra-small"} -->
	<p class="has-extra-small-font-size"><?php echo esc_html__( 'Copyright', 'event-management' ) . ' ' . date_i18n( _x( 'Y', 'copyright date format', 'event-management' ) ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:site-title {"level":0,"isLink":false,"fontSize":"extra-small"} /-->
	<!-- wp:social-links {"iconColor":"contrast","iconColorValue":"var(--wp--preset--color--contrast)","className":"has-icon-color is-style-logos-only"} -->
	<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /--></ul>
	<!-- /wp:social-links -->
</div>
<!-- /wp:group -->
