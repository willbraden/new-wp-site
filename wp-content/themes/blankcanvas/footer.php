<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blankcanvas
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			 &copy; <?php echo date('Y'); ?> uwa.edu 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<!-- <script src="//code.jquery.com/jquery-2.1.4.min.js"></script> -->
<!-- <script src="<?php echo site_url(); ?>/wp-content/themes/blankcanvas/js/unslider-master/dist/js/unslider-min.js"></script> -->

<script>
		jQuery(document).ready(function($) {
			var slider = $('.slider').unslider({ autoplay: true, delay: 5000, animation: 'fade' });

		});

	</script>

</body>
</html>
