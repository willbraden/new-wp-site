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
<?php if (get_field('talk_form_toggle', 'option')) { ?>

	<div class="button talk">
		<a class="talk-button" href="#0"><i class="fa fa-comment-o"></i>Talk</a>
	</div>
	<div class="talk-pop">
		<i class="fa fa-chevron-down talk-exit"></i>
		<img class="sean-circle" src="http://blankcanvas.com/wp-content/uploads/2016/11/sean-circle.png" alt="">
		<?php the_field('talk_form_copy', 'option'); ?>
		<?php gravity_form(1, false, false, false, '',true); ?>
	</div>

<?php } ?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; <?php echo date('Y'); ?> blankcanvas.com
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
