<?php
/**
 * Block Vertical Slider template.
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
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-vertical-slider';
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

?>


  


<div <?php echo esc_attr( $anchor ); ?> class="section-block <?php echo esc_attr( $class_name ); ?>   <?php echo esc_attr( $style ); ?>  "  >



<?php if ( $has_background ) : ?>
    <div class="background-img-wrp">
         <img class=" <?php echo $img_scroll; ?> " src="<?php echo esc_url($block_background_image['url']); ?>" alt="<?php echo esc_attr($block_background_image['alt']); ?>" />
    </div>
<?php endif; ?>


   

   




    <!-- Slider main container -->
<div class="swiper swiper-slide-up">
  <!-- Additional required wrapper -->

       <?php if( have_rows('the_v_slide') ): ?>
  <div class="swiper-wrapper">
     <?php while( have_rows('the_v_slide') ): the_row(); 
    
         $image = get_sub_field('image');
         $title = get_sub_field('title');
          $text = get_sub_field('text');
          $svg = get_sub_field('icon_code');
           $link = get_sub_field('link');
            $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
    <!-- Slides -->
    <div class="swiper-slide">
         <img class="img-fluid mb-0" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
<?php endwhile; ?>
  </div>
<?php endif; ?>
  <!-- If we need pagination -->
  <!-- <div class="swiper-pagination"></div> -->

  <!-- If we need navigation buttons -->
  <!-- <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div> -->

  <!-- If we need scrollbar -->
  <!-- <div class="swiper-scrollbar"></div> -->
</div>

</div> <!-- Block end -->

