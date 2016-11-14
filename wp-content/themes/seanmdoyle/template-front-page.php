<?php
/*
Template Name:Front Page
*/

get_header(); ?>
<div class="scroll-bg textcenter home-hero" style="background-image: url('http://seanmdoyle.com/wp-content/uploads/2016/11/sean_v2.jpg <?php // the_field('scroll_bg_image'); ?> ');"> 
	<div class="scroll-bg__center-box">
		<div class="scroll-bg__placement-box">
			<h2 class="scroll-bg__header">Aliena dixit in physicis nec ea ipsa</h2>
		<p class="scroll-bg__subtext">Quae tibi probarentur; Iam in altera philosophiae parte. His singulis copiose responderi solet, sed quae perspicua sunt longa esse non debent. </p>
		</div>
	</div>
</div>
<div class="" style="padding:25px 0;background-image: url('http://seanmdoyle.com/wp-content/uploads/2016/11/cheap_diagonal_fabric.png');">
	
	<div class="bio-card">
		<?php 
			$image = get_field('bio_card_image');
			if( !empty($image) ): ?>
				<img class="bio-card__img col-sm-6 col-xs-12" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<?php endif; ?>
		<div class="bio-card__copy col-sm-6 col-xs-12">
				<h2 class="bio-card__header"><?php the_field('bio_card_header') ?></h2>
				<p class="bio-card_text"><?php the_field('bio_card_text') ?></p>
					<a href="#0" class="button button--orange">Check it out <i class="fa fa-external-link"></i></a>
		</div>
	
	</div>

	<p class="container enhanced-text">
			It's about stuff and thats cool! It's about stuff and thats cool! It's about stuff and thats cool! It's about stuff and thats cool!
		</p>
</div>


<!-- FLEXIBLE CONTENT -->
<?php

// check if the flexible content field has rows of data
if( have_rows('home_flex') ):

     // loop through the rows of data
    while ( have_rows('home_flex') ) : the_row();

        if( get_row_layout() == 'bg_scroll_layout' ):


$section_height = get_sub_field('section_height');
$bg_image = get_sub_field('bg_image');
$header = get_sub_field('header');
$subheader = get_sub_field('subheader');
$button_link = get_sub_field('button_link');
$button_text = get_sub_field('button_text');

?>
	<div class="scroll-bg textcenter" style="height:<?php echo $section_height; ?>vh;background-image: url('<?php echo $bg_image; ?>');"> 
		<div class="dimmer"></div>
		<div class="scroll-bg__center-box">
			<h2 class="scroll-bg__header">
				<?php echo $header; ?>
			</h2>
			<p class="scroll-bg__subtext">
				<?php echo $subheader; ?>
			</p>
			<a href="<?php echo $button_link; ?>" class="button button--lt-grey">
				<?php echo $button_text; ?>				
			</a>
		</div>
	</div>
<?php
        elseif( get_row_layout() == 'bio_card_layout' ): 

        	$file = get_sub_field('file');

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>


<?php get_footer(); ?>
