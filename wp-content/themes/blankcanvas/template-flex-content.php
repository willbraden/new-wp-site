<?php
/*
Template Name: Flex Content
*/

get_header(); ?>
<!-- test section -->



<!-- end test section -->




    <!-- http://slicejack.com/fullscreen-html5-video-background-css/ -->
    <!-- FLEXIBLE CONTENT -->



    <?php

// elseif( get_row_layout() == 'flex_layout' ) {
    // $i++;
          //  $label = get_sub_field('label');
          //  $i = (str_replace(' ', '-', strtolower($label)));
    // $field = get_sub_field('field');
        // if (have_rows('repeater')): 
            // while ( have_rows('repeater') ) : the_row(); 
                // $field = get_sub_field('field');
            //endwhile; 
        // endif; 
// }





$i = 0;

// check if the flexible content field has rows of data
if( have_rows('home_flex') ):

     // loop through the rows of data
    while ( have_rows('home_flex') ) : the_row();

        if( get_row_layout() == 'bg_scroll_layout' ) {
            
            $section_height = get_sub_field('section_height');
            $bg_image = get_sub_field('bg_image');
            $header = get_sub_field('header');
            $i++;
            $i = (str_replace(' ', '-', strtolower($header)));
            $i = str_replace('"', '', $i );
            $i = str_replace('\'', '', $i );
            $subheader = get_sub_field('subheader',false, false);
            $button_link = get_sub_field('button_link');
            $button_text = get_sub_field('button_text');
            $section_bg_attachment = get_sub_field('section_bg_attachment');
            $overlay_toggle = get_sub_field('overlay_toggle');
            $overlay_color = get_sub_field('overlay_color');
            $overlay_alpha = get_sub_field('overlay_alpha');
            $button_toggle = get_sub_field('button_toggle');
            $bg_color = get_sub_field('bg_color');
            $scroll_bg_pos = get_sub_field('scroll_bg_pos');
            $text_color = get_sub_field('text_color');
            $text_shadow_toggle = get_sub_field('text_shadow_toggle');
            $video_background_webm = get_sub_field('video_background_webm');            
            $video_background_mp4 = get_sub_field('video_background_mp4');
            $video_background_ogg = get_sub_field('video_background_ogg');  
            $video_image_fallback = get_sub_field('video_image_fallback');  
            $images = get_sub_field('slider');      
        ?>
        
            <div class=" scroll-bg scroll-bg--<?php echo $scroll_bg_pos; ?> textcenter <?php echo $section_bg_attachment; if ($text_shadow_toggle) { echo ' scroll-bg__textshadow';}?>" style=" height:<?php echo $section_height; ?>vh;min-height:<?php echo $section_height; ?>vmin;
                        background-color:<?php if( get_sub_field('background_content') == 'Color' ) { echo $bg_color; } ?>;
                        color:<?php echo $text_color ?>;
                        background-image: url('<?php if( get_sub_field('background_content') == 'Image' ) { echo $bg_image; }else {echo $video_image_fallback;} ?>');">
                        <span id="<?php echo 'elem-' . $i; ?>" class="goTo"></span>
                <?php if( get_sub_field('background_content') == 'Video' ) { ?>
                <video loop muted autoplay poster="<?php echo $video_image_fallback ?>" class="scroll-bg__video">
                    <source src="<?php echo $video_background_webm ?>" type="video/webm">
                    <source src="<?php echo $video_background_mp4 ?>" type="video/mp4">
                    <source src="<?php echo $video_background_ogg ?>" type="video/ogg">
                </video>
                <?php } ?>
                <?php if ($overlay_toggle) {?>
                <div class="dimmer" style=" background-color: <?php echo $overlay_color ?>; opacity:0.<?php echo $overlay_alpha ?>;"></div>
                <?php  } ?>
                <div class="scroll-bg__center-box">
                    <div class="scroll-bg__placement-box">
                        <h2 class="scroll-bg__header">
                        <?php echo $header; ?>
                    </h2>
                        <p class="scroll-bg__subtext">
                            <?php echo $subheader; ?>
                        </p>
                        <?php if ($button_toggle) {?>
                        <a href="<?php echo $button_link; ?>" class="button button--lt-grey">
                            <?php echo $button_text; ?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        }
        elseif( get_row_layout() == 'one_column_section' ) {
            $i++;
            $label = get_sub_field('label');
            $i = (str_replace(' ', '-', strtolower($label)));
            $header = get_sub_field('header');
            $wysiwyg_editor = get_sub_field('wysiwyg_editor');
            $bg_color = get_sub_field('bg_color');
            $text_color = get_sub_field('text_color');
            
        ?>
                <div class="column-section column-section--full" style="background-color:<?php echo $bg_color ?>;color:<?php echo $text_color ?>;">
                <span id="<?php echo 'elem-' . $i; ?>" class="goTo"></span>
                    <div class="container">
                        <h2 class="column-section__header"><?php echo $header; ?></h2>
                        <div class="wiw-block__full">
                            <?php echo $wysiwyg_editor ?>
                        </div>
                      
                </div>
                <?php
        }
        elseif( get_row_layout() == 'sticky_bar_layout' ) {
            $i++;
            $label = get_sub_field('label');
            $i = (str_replace(' ', '-', strtolower($label)));
            // $bg_color = get_sub_field('bg_color');
        ?>
        <div class="sticky-bar SBstyle">
        <span id="<?php echo 'elem-' . $i; ?>" class="goTo"></span>
            <div class="container">
                <?php if (have_rows('nav_items')): while ( have_rows('nav_items') ) : the_row(); 
                $nav_text = get_sub_field('nav_text');
                $nav_link = get_sub_field('nav_link');
                
                ?>
                <a href="<?php echo $nav_link; ?>" class="SBlink"><?php echo $nav_text; ?></a>
                <?php endwhile; endif; ?> 
            </div>
        </div>
                        <?php
        }
        elseif( get_row_layout() == 'multi_content_repeater' ) {
            $i++;
            $label = get_sub_field('label');
            $i = (str_replace(' ', '-', strtolower($label)));
            $bg_color = get_sub_field('bg_color');
            $text_color = get_sub_field('text_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $padding_left = get_sub_field('padding_left');
            $padding_right = get_sub_field('padding_right');
            $bg_image = get_sub_field('bg_image');
            $container = get_sub_field('container');
        ?>
                        <div class="column-section " style="
                        padding-left: <?php echo $padding_left ?>px ;padding-right: <?php echo $padding_right ?>px ;padding-top: <?php echo $padding_top ?>px ;padding-bottom: <?php echo $padding_bottom ?>px ;
                        background-color:<?php echo $bg_color ?>;
                        color:<?php echo $text_color ?>;
                        background-image: url(' <?php echo $bg_image; ?> ');">
                         <span id="<?php echo 'elem-' . $i; ?>" class="goTo"></span>
                            <?php if ($container) { ?><div class="container"> <?php } ?>
                            <?php if (have_rows('column_repeater')): while ( have_rows('column_repeater') ) : the_row(); 
                            $content = get_sub_field('content');
                            $width = get_sub_field('width');
                            $font_size = get_sub_field('font_size');    
                            $alignment = get_sub_field('alignment');
                            $padding_top = get_sub_field('padding_top');
                            $padding_bottom = get_sub_field('padding_bottom');
                            $padding_left = get_sub_field('padding_left');
                            $padding_right = get_sub_field('padding_right');
                            ?>
                                <div  style="width: 100%; padding-left: <?php echo $padding_left ?>px ;padding-right: <?php echo $padding_right ?>px ;padding-top: <?php echo $padding_top ?>px ;padding-bottom: <?php echo $padding_bottom ?>px ; max-width: <?php echo $width;?>%;" class="wiw-block--multi w-<?php echo $alignment;?>" >
                                    <?php echo $content ?>
                                </div>
                            <?php endwhile; endif; ?>  
                            <?php if ($container) { ?></div> <?php } ?>
                        </div>
                        <?php
        }
         elseif( get_row_layout() == 'blog_category_reel' ) {
            $i++;
            $label = get_sub_field('label');
            $i = (str_replace(' ', '-', strtolower($label)));
            $category = get_sub_field('taxonomy');
            $header = get_sub_field('header');
            $posts = get_posts(array(
                'posts_per_page'    => 4,
                'post_type'         => 'post',
                'category'          => '$category'
            ));
            if( $posts ){ ?>
          <div class="acf-blog-reel ">
          <span id="<?php echo 'elem-' . $i; ?>" class="goTo"></span>
          <h2><?php echo $header ?></h2>
                    <ul class="container">
                <?php foreach( $posts as $post ):         
                    setup_postdata( $post ) ?>
                    <li class="acf-blog-reel__li">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                        <br>
                        <?php the_title('<h3 class="acf-blog-reel__title">','</h3>'); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
          </div>
                <?php wp_reset_postdata(); 
            } } 
    endwhile;

else :

    // no layouts found

endif;

?>


                            <?php get_footer(); ?>
