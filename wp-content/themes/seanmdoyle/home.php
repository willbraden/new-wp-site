<?php get_header(); ?>
<div class="scroll-bg textcenter" style="background-image: url('https://www.fillmurray.com/1920/1080 <?php // the_field('scroll_bg_image'); ?> ');"> 
	<div class="scroll-bg__center-box">
		<h2 class="scroll-bg__header">Aliena dixit in physicis nec ea ipsa</h2>
		<p class="scroll-bg__subtext">Quae tibi probarentur; Iam in altera philosophiae parte. His singulis copiose responderi solet, sed quae perspicua sunt longa esse non debent. </p>
	</div>
</div>
<div class="row">
	<div id="sub-header" class="bio-card ">
		<?php 
			//$image = get_field('bio_card_image');
			//if( !empty($image) ): ?>
				<img class="bio-card__img" src="<?php //echo $image['url']; ?>" alt="<?php //echo $image['alt']; ?>" />
		<?php //endif; ?>
		<h2 class="bio-card__header"><?php //the_field('bio_card_header') ?></h2>
		<p class="bio-card_text"><?php //the_field('bio_card_text') ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et nemo nimium beatus est; Verum hoc idem saepe faciamus. Certe, nisi voluptatem tanti aestimaretis. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? Quis est autem dignus nomine hominis, qui unum diem totum velit esse in genere isto voluptatis? Duo Reges: constructio interrete.</div>
</div>
<div class="row">
	<div class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et nemo nimium beatus est; Verum hoc idem saepe faciamus. Certe, nisi voluptatem tanti aestimaretis. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? Quis est autem dignus nomine hominis, qui unum diem totum velit esse in genere isto voluptatis? Duo Reges: constructio interrete.</div>
</div>
<div class="row">
	<div class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et nemo nimium beatus est; Verum hoc idem saepe faciamus. Certe, nisi voluptatem tanti aestimaretis. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? Quis est autem dignus nomine hominis, qui unum diem totum velit esse in genere isto voluptatis? Duo Reges: constructio interrete.</div>
</div>



<?php get_footer(); ?>
