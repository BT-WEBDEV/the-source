<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gka_theme
 */

if ( ! is_active_sidebar( 'gka_theme_widget_after' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'gka_theme_widget_after' ); ?>
