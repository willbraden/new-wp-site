<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blankcanvas
 */

?>


 <div class="scroll-bg scroll-bg--center textcenter scroll-bg__textshadow" style="	height:75vh;
						background-color:#333;
						color:#fff;
						background-image: url('<?php 
								if ( has_post_thumbnail() ) {
							    $url = the_post_thumbnail_url(); echo $url;};
							 ?>');">


                <div class="dimmer" style=" background-color: #000; opacity:0.15;"></div>

                <div class="scroll-bg__center-box">
                    <div class="scroll-bg__placement-box">
                        <h1 class="scroll-bg__header">
						<?php the_title(); ?>
					</h1>
                    </div>
                </div>
            </div>






<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blankcanvas' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
