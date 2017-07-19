<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blankcanvas
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found textcenter" style="padding-top: 30%;">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry, that page can&rsquo;t be found.', 'blankcanvas' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content ">
					<p><?php // esc_html_e( 'It looks like nothing was found at this location.', 'blankcanvas' ); ?>
					<!-- <br><br> -->
					<a class="button button--lt-red" href="/">back to home</a></p>




				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
