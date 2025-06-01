<?php
// This is the main template file for the WordPress theme.

get_header(); ?>
<?php $page_settings = get_field('page_settings'); ?>
<?php $page_title = $page_settings['show_page_title']; ?>
<?php if ($page_title) : ?>
    <h1><?php the_title(); ?></h1>
  <?php endif; ?>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
   


<?php
// get_sidebar();
get_footer();
?>