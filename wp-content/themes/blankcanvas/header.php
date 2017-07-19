<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blankcanvas
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=EB+Garamond|Oswald:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/blankcanvas/js/unslider-master/dist/css/unslider.css">
<!-- Google Analytics -->


</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blankcanvas' ); ?></a>

	<header id="masthead" class="site-header nav-text sticky-bar" role="banner">
		<div class="row">
			<div class="site-branding">
<?php 

$url = $_SERVER['REQUEST_URI'];
preg_match("/[^\/]+$/", $url, $matches);
$last_word = $matches[0]; // test
$urlStrip = "- " . str_replace('/','',$url);
if (empty($url)) {
	$urlStrip = '';
}
// $nav_text = get_bloginfo( 'name' ) . '&nbsp;&nbsp;  |  &nbsp;&nbsp;' . get_the_title();
$nav_text = '&nbsp;&nbsp;  |  &nbsp;&nbsp;' . 'ALUMNI AND DEVELOPMENT';

 ?>

			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Blank Canvas Theme<span><?php echo $nav_text ?></span></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Blank Canvas Theme<span><?php echo $nav_text; ?></span></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			// if ( $description || is_customize_preview() ) : ?>
				<!-- <p class="site-description"><?php // echo $description; /* WPCS: xss ok. */ ?></p> -->
			<?php
			// endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class=" col-sm-6 main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'blankcanvas' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
