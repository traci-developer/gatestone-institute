<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<!-- Traci: Remove has-header-image -->
<?php
$bodyClassArr = get_body_class();
$hdrImgKey = array_search('has-header-image', $bodyClassArr);

if ($hdrImgKey != FALSE) {
    unset($bodyClassArr[$hdrImgKey]);
    $bodyClass = 'class="' . join( ' ', $bodyClassArr ) . '"';
}

?>
<body <?php echo $bodyClass; ?>>
<!-- #Remove has-header-image  -->


<?php wp_body_open(); ?>

<div id="page" class="site">
	

	<header id="masthead" class="site-header" role="banner">

<!-- Traci: Use site-branding for logo and center it -->
		<div class="custom-header" style="background-color: white;">
			<div class="site-branding" style="margin-bottom: 72px;">
				<div class="wrap" style="text-align:center">		
					<a href="<?php echo home_url();?>">
						<img src="https://www.gatestoneinstitute.org/images/gatestone-logo-1000.gif" style="max-width: 280px;">
					</a>
				</div><!-- .wrap -->
			</div><!-- .site-branding -->
		</div><!-- .custom-header-->

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
