<?php 

$content = get_field( 'content' ); 
$content_width = get_field( 'content_width' );
$content_align = get_field( 'content_align' );

$content_styles = array( '  mb-' . $content_align, '  mt-' . $content_align, ' w-' . $content_width ) ;
$content_style  = implode( ' ', $content_styles );
?>
<?php if ( ! $content ) {
    return;
} else { ?>
<div class="text-wrp <?php echo esc_attr( $content_style ); ?>">
    <div class="content   WYSIWYG">
        <?php echo $content; ?>
    </div> <!-- content end -->
     </div> <!-- content end -->
  
<?php } ?>
 