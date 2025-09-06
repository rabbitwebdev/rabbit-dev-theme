<?php
/**
 * Block Contact Form template.
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
$class_name = 'block-contact-form-section';
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
<?php
    $form_id = get_field('the_form');
    if ($form_id) { ?>
<div class="col">
    <div class="form-wrp p-3">
        <?php gravity_form( $form_id, false, false, false, null, true ); ?>
    </div>
    </div>
 <?php  } ?>


</div> <!-- Row end -->
</div> <!-- Conatiner end -->
<?php } ?>
<?php
$select_featured_posts = get_field('select_featured_posts');
$card_spacing = get_field('card_spacing');
if( $select_featured_posts ): ?>
<div class="container-fluid <?php echo $card_spacing ; ?> ">
    <div class="row row-cols-2 <?php echo $card_spacing ; ?> row-cols-md-2 row-cols-lg-4">
    <?php foreach( $select_featured_posts as $featured_post ): 
   $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        $image_url = get_the_post_thumbnail_url( $featured_post->ID, 'full' );
        $custom_field = get_field( 'field_name', $featured_post->ID );
        ?>
        <div class="col">

                <a class="card post-type-card h-100 bg-black text-bg-dark border-0 rounded-0" href="<?php echo esc_url( $permalink ); ?>" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <img src="<?php echo esc_url( $image_url ); ?>" class="card-img h-100 object-fit-cover rounded-0 opacity-50" alt="...">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-uppercase"><?php echo esc_html( $title ); ?></h5>
                </div>
                </a>


            
          
        </div>
    <?php endforeach; ?>
    </div>
    </div>
<?php endif; ?>
    
</div> <!-- Block end -->

