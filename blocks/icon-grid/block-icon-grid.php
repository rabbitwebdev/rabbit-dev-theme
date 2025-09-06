<?php
/**
 * Block Icon Grid template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$image_block             = get_field('main_block_image');





$block_background_image = get_field( 'block_background_image' );
$turn_on_parallax = get_field( 'turn_on_parallax' );


$block_column_size = get_field( 'block_column_size' );
$content_wrap_size = get_field( 'content_wrap_size' );
$reverse_block = get_field( 'reverse_block' );



$add_second_image = get_field( 'add_second_image' );
$block_image_two = get_field( 'block_image_two' );
$button_group = get_field( 'button_group' );

$block_title = get_field( 'group_block_title' );

$title_size = $block_title['size'];
$title_text = $block_title['title'];
$section_title = $block_title['section_title'];


$content = get_field( 'content' ); 

if ($reverse_block) {
    $reverse_block = 'flex-row-reverse';
    $left_line = true ;
    $down_left = false ;
} else {
    $reverse_block = '';
      $left_line = false ;
    $down_left = true ;
} 

$the_options = get_field( 'the_block_options' );

$animations = isset($the_options['line_animation']) ? $the_options['line_animation'] : '';


$col_size = $block_column_size;
if ($col_size == '4') {
    $col_width = 'col-lg-4 col-md-4';
} elseif ($col_size == '12') {
    $col_width = 'col-lg-12';
} elseif ($col_size == '10') {
    $col_width = 'col-lg-10 col-md-8';
} elseif ($col_size == '2') {
    $col_width = 'col-lg-2';
} elseif ($col_size == '3') {
    $col_width = 'col-lg-3';
} elseif ($col_size == '5') {
    $col_width = 'col-lg-5';
} elseif ($col_size == '6') {
    $col_width = 'col-lg-6 col-md-6';
}   elseif ($col_size == '8') {
    $col_width = 'col-lg-8 col-md-8';
} else {
    $col_width = 'col-lg-6';
}

  


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-icon-grid';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}



if ( $block_background_image ) {
    $has_background = true ;
} else {
    $has_background = false;
}

if ( $turn_on_parallax ) {
    $img_scroll = ' img-scroll';
} else {
    $img_scroll = '';
}



$style_data = build_section_style_string($block);
$style = $style_data['style'];
$width = $style_data['width'];
$styleimage = $style_data['image'];
$effectimage = $style_data['effect'];
$alignimage = $style_data['align'];
?>


  


<div <?php echo esc_attr( $anchor ); ?> class="section-block <?php echo esc_attr( $class_name ); ?>   <?php echo esc_attr( $style ); ?>  "  >
 <?php if ($animations == '1') { ?>
                 
              
    <?php if ( $left_line ) : ?>
    <div class="animated-border-left" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500"  data-aos-easing="linear" ></div>
    <?php else : ?>
 <div class="animated-border"  data-aos="fade-left" data-aos-duration="1800" data-aos-delay="500"  data-aos-easing="linear" ></div> 
  <?php endif; ?>
  <?php if ( $down_left ) : ?>
    <div class="animated-border-down-left"  data-aos="fade-down" data-aos-duration="1500" data-aos-delay="900" data-aos-offset="100"  data-aos-easing="linear" ></div>
    <?php else : ?>
 <div class="animated-border-down"  data-aos="fade-down" data-aos-duration="1500" data-aos-delay="900" data-aos-offset="500"  data-aos-easing="linear" ></div> 
    <?php endif; ?>
    
    
    
    <?php  } ?>


<?php if ( $section_title ) : ?>
    <div class="section-block-title "  data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500" data-aos-easing="linear" >
        <h3 class=""><?php echo esc_html( $section_title ); ?></h3> 
    </div>

<?php endif; ?>
<?php if ( $has_background ) : ?>
    <div class="background-img-wrp">
         <img class=" <?php echo $img_scroll; ?> " src="<?php echo esc_url($block_background_image['url']); ?>" alt="<?php echo esc_attr($block_background_image['alt']); ?>" />
    </div>
<?php endif; ?>
 <?php if ($content) { ?>
<div class=" <?php echo esc_attr( $width ); ?>"> <!-- Conatiner -->
<div class="row align-items-center justify-content-center <?php echo $reverse_block ; ?> "> <!-- Row -->
 
    <div class="<?php echo esc_attr( $col_width ); ?>"> <!-- Col -->
        <div class="content-wrp <?php echo esc_attr( $content_wrap_size ) ;?>"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <?php if ( $title_text ) : ?>
            <div class="section-title mb-3 mt-3">
               
                <h1 class="<?php echo $title_size ;  ?>"><?php echo esc_html( $title_text ); ?></h1> 
             </div>

        <?php endif; ?>

          <?php if ( ! $content ) {
                return;
            } else { ?>

                <?php get_template_part('templates/content'); ?>

            
            <?php } ?>

   

     <?php if ( isset($button_group['link']) && isset($button_group['link']['url']) ) : ?>
           <div class="btn-wrp mb-3 mt-3">
        <a class="<?php echo isset($button_group['style']) ? $button_group['style'] : ''; ?>" href="<?php echo esc_url( $button_group['link']['url'] ); ?>">
            <?php if ( isset( $button_group['link']['title'] ) ) : ?>
                <?php echo esc_html( $button_group['link']['title'] ); ?>
            <?php endif; ?>
        </a>
         </div>
    <?php endif; ?>

   
      </div> <!-- Content end -->
</div> <!-- Col end -->


    <?php if ( $image_block ) : 
    // Image variables.
    $url = $image_block['url'];
   
        ?>
        <div class="col"> <!-- Col -->
        <div class="img-wrp  <?php echo esc_attr( $alignimage ); ?> ">
            <?php 
            if ( $add_second_image && $block_image_two && $img_two_url = $block_image_two['url'] ) : ?>
                    <div class="img-2-wrp">
                        <img class="img-fluid w-75 <?php echo esc_attr( $styleimage ); ?> img-left-right " src="<?php echo esc_url($img_two_url); ?>"  />
                    </div>
            <?php endif; ?>
            
            <img class="img-fluid <?php echo esc_attr( $styleimage ); ?> <?php echo esc_attr( $effectimage ); ?> " src="<?php echo esc_url($url); ?>"  />

        </div>
        </div> <!-- Col end -->
    <?php endif; ?>

</div> <!-- Row end -->
</div> <!-- Conatiner end -->
<?php } ?>
 <div class="<?php echo esc_attr( $width ); ?> " id="featured-3">
     <?php if( have_rows('the_icon_grid') ): ?>
   <div class="row g-2 py-4 row-cols-2 row-cols-md-4 justify-content-center row-cols-lg-4">
    <?php while( have_rows('the_icon_grid') ): the_row(); 
    
         $image = get_sub_field('icon');
         $title = get_sub_field('title');
          $text = get_sub_field('text');
          $svg = get_sub_field('icon_code');
           $link = get_sub_field('link');
          
        ?>

         <div class="feature col mb-4 ">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-2"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <?php if ($svg) { ?>
            <?php echo $svg ?>
            <?php } else { ?>
            <?php echo wp_get_attachment_image( $image['ID'], 'large', '', array( 'class' => '' ) ); ?>
            <?php } ?>
        </div>
        <h4 class="fs-4 mb-2 text-uppercase "  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <?php echo $title ?>
        </h4>
        <?php if ($text) : ?>
        <div class="WYSIWIG  mb-2 <?php echo esc_attr( $style_txt_string ); ?>"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <?php echo $text ?>
        </div>
        <?php endif ; ?>
        <?php if ($link) { 
              $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo $link_target ?>" class="btn btn-lg btn-underline-light icon-link text-fade-in"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
          <?php echo $link_title ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
</svg>
        </a>
        <?php } else {  } ?>
      
      </div>


      
        
    <?php endwhile; ?>
     </div>
<?php endif; ?>
     </div>
    
</div> <!-- Block end -->

