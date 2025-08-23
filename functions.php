<?php
/**
 * Functions and definitions devrabbittheme
 *
 * @package devrabbittheme
 */

// Enqueue scripts and styles
function devrabbit_theme_enqueue_scripts() {
    // Theme stylesheet
  
    wp_enqueue_style('devrabbittheme-style', get_template_directory_uri() . '/style.css', [], wp_get_theme()->get('Version'));

    

        wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0', 'all');

         wp_enqueue_style('boot-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3', 'all');

      wp_register_style( 'app', get_template_directory_uri() . '/dist/css/app.css', array(), '5.5', 'all' );
    wp_enqueue_style( 'app' );

    // Custom scripts

    wp_enqueue_script('bootstrap-pop', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array('jquery'), '2.9.2', true);

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', array('jquery'), '5.3.2', true);

       wp_enqueue_script('js-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '2.9.2', true);

    wp_enqueue_script('simplePara', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js', array('jquery'), '5.5.1', false);

    wp_enqueue_script('devrabbittheme-script', get_template_directory_uri() . '/dist/js/app.js', ['jquery'], wp_get_theme()->get('Version'), true);


}
add_action('wp_enqueue_scripts', 'devrabbit_theme_enqueue_scripts');

// Theme setup
function devrabbit_theme_setup() {
    // Add support for document title tag
    add_theme_support('title-tag');

    // Add support for custom logo
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'devrabbittheme'),
         'top_nav' => __('Top Menu', 'devrabbittheme'),
        'footer'  => __('Footer Menu', 'devrabbittheme'),
    ]);

    // Add support for HTML5 markup
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'devrabbit_theme_setup');

add_theme_support( 'block-template-parts' );

add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => esc_attr__( 'Small', 'themeLangDomain' ),
        'size' => 12,
        'slug' => 'small'
    ),
    array(
        'name' => esc_attr__( 'Regular', 'themeLangDomain' ),
        'size' => 16,
        'slug' => 'regular'
    ),
    array(
        'name' => esc_attr__( 'Large', 'themeLangDomain' ),
        'size' => 36,
        'slug' => 'large'
    ),
    array(
        'name' => esc_attr__( 'Huge', 'themeLangDomain' ),
        'size' => 50,
        'slug' => 'huge'
    )
) );


function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce');
add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

if ( class_exists( 'WooCommerce' ) ) {
    // WooCommerce is active, include the WooCommerce-specific functions file
    require_once get_template_directory() . '/include/woo-functions.php';
}

add_action( 'woocommerce_before_main_content', 'bbloomer_woo_page' );
 
function bbloomer_woo_page() {
   if ( is_woocommerce() ) {
   echo null ;
   } else {
     add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
   }
}



// Register widget areas
function devrabbit_theme_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'devrabbittheme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'devrabbittheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'devrabbit_theme_widgets_init');


function devrabbit_theme_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}
add_action('admin_init', 'devrabbit_theme_editor_styles');

add_action('acf/input/admin_enqueue_scripts', 'my_acf_admin_enqueue_scripts');

function my_acf_admin_enqueue_scripts() {
        wp_enqueue_style( 'my-acf-input-css', get_stylesheet_directory_uri() . '/dist/css/acf-input.css', false, '1.0.0' );
        
    }
// function enqueue_plyr_scripts() {
//     wp_enqueue_style('plyr-css', 'https://cdn.plyr.io/3.7.8/plyr.css');
//     wp_enqueue_script('plyr-js', 'https://cdn.plyr.io/3.7.8/plyr.polyfilled.js', [], null, true);
//     wp_enqueue_script('custom-music-player', get_template_directory_uri() . '/dist/js/custom-music-player.js', ['plyr-js'], null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_plyr_scripts');

// Add a custom excerpt length
function devrabbit_theme_custom_excerpt_length($length) {
    return 10; // Adjust the length as needed
}
add_filter('excerpt_length', 'devrabbit_theme_custom_excerpt_length');

// Add a custom "Read More" link to excerpts
// function devrabbit_theme_excerpt_more($more) {
//     return '<div class="w-100 mt-3 "><a class="link-underline-primary w-100" href="' . get_permalink() . '">' . __('Read More', 'devrabbittheme') . '</a></div>';
// }
// add_filter('excerpt_more', 'devrabbit_theme_excerpt_more');

// Load theme's text domain for translations
function devrabbit_theme_load_textdomain() {
    load_theme_textdomain('devrabbittheme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'devrabbit_theme_load_textdomain');

// Disable the WordPress admin bar for all users except administrators
function devrabbit_theme_disable_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'devrabbit_theme_disable_admin_bar');

// Cleanup WordPress head
function devrabbit_theme_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
}
add_action('init', 'devrabbit_theme_cleanup_head');

function customrabbitstyles() {
    $primary_brand_colour = get_field('primary_brand_colour', 'option');

     if ($primary_brand_colour) {
        echo '<style>
            :root {
                --bs-primary: ' . esc_attr($primary_brand_colour) . ';
                --bs-primary-rgb ' . esc_attr($primary_brand_colour) . ';
            }
        </style>';
    }
}
add_action('wp_head', 'customrabbitstyles');

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats($init_array) {
// Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
         array(
            'title' => 'Buttons', // Main title
            'items' => array( // Subfields
                array(
                    'title' => 'Primary Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-primary',
                      'attributes' => array(
                         'role' => 'button', 
                    )
                ),
                 array(
                    'title' => 'Primary large',
                    'selector' => 'a',
                    'classes' => 'btn btn-primary btn-lg',
                      'attributes' => array(
                         'role' => 'button', 
                    )
                ),
                array(
                    'title' => 'Second Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-secondary',
                       'attributes' => array(
                         'role' => 'button', 
                    )
                ),
                 array(
                    'title' => 'Second large',
                    'selector' => 'a',
                    'classes' => 'btn btn-secondary btn-lg',
                       'attributes' => array(
                         'role' => 'button', 
                    )
                ),
                 array(
                    'title' => 'Gray Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-gray'
                ),
                array(
                    'title' => 'Invert Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-invert'
                ),
                 array(
                    'title' => 'Outline Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-outline'
                ),
                 array(
                    'title' => 'Outline Light',
                    'selector' => 'a',
                    'classes' => 'btn btn-outline-light',
                        'attributes' => array(
                         'role' => 'button', 
                    )
                ),
                 array(
                    'title' => 'Underline Button',
                    'selector' => 'a',
                    'classes' => 'btn btn-underline-primary'
                ),
            )
        ),
         array(
            'title' => 'Text Animations', // Another main title
            'items' => array( // Subfields
                array(
                    'title' => 'Fade out',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li, a',
                    'classes' => 'text-fade-out'
                ),
                array(
                    'title' => 'Fade in',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li, a',
                    'classes' => 'text-fade-in'
                ),
                array(
                    'title' => 'Fade in left',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li, a',
                    'classes' => 'text-fade-in-left'
                ),
                array(
                    'title' => 'Fade in right',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li, a',
                    'classes' => 'text-fade-in-right'
                ),
                array(
                    'title' => 'Anim font',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, li',
                    'classes' => 'animated-text',
                     'attributes' => array(
                        'data-text' => ' ',
                    )
                ),
            )
        ),
        array(
            'title' => 'Text Styles', // Another main title
            'items' => array( // Subfields
                array(
                    'title' => 'Script Text',
                    'inline' => 'span',
                    'type' => 'a',
                    'classes' => 'script-text'
                ),
                 array(
                    'title' => 'Text SM',
                    'inline' => 'span',
                    'selector' => 'p',
                    'classes' => 'text-sm'
                ),
                 array(
                    'title' => 'Lead Text',
                    'inline' => 'span',
                    'selector' => 'p',
                    'classes' => 'lead'
                ),
                 array(
                    'title' => 'Small ul',
                    'inline' => 'span',
                    'selector' => 'ul',
                    'classes' => 'sm-ul'
                ),
                 array(
                    'title' => 'li Check',
                    'inline' => 'span',
                    'selector' => 'ul, li',
                    'classes' => 'bi bi-check2-circle'
                ),
            )
        ),
        array(
            'title' => 'Font Styles', // Another main title
            'items' => array( // Subfields
                array(
                    'title' => 'li Font',
                    'inline' => 'span',
                    'selector' => 'li',
                    'classes' => 'li-font'
                ),
                 array(
                    'title' => 'Text White',
                    'inline' => 'span',
                    'selector' => 'p, h2, h1, h3, h4, h5, h6, li',
                    'classes' => 'text-white'
                ),
                array(
                    'title' => 'Uppercase',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6',
                    'classes' => 'text-uppercase'
                ),
                array(
                    'title' => 'Light Text',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li',
                    'classes' => 'fw-lighter'
                ),
                array(
                    'title' => 'Line high',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li',
                    'classes' => 'lh-lg'
                ),
                array(
                    'title' => 'Large Text',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li',
                    'classes' => 'fs-1'
                ),
                array(
                    'title' => 'Small Text',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6 ul, li',
                    'classes' => 'fs-5'
                ),
                array(
                    'title' => 'Font Bold',
                    'inline' => 'span',
                    'selector' => 'p, h1, h2, h3, h4, h5, h6, li',
                    'classes' => 'fw-bold'
                ),
            )
        ),
          array(
            'title' => 'Formats', // Another main title
            'items' => array( // Subfields
             array(
                'title' => 'Margin Bottom 5',
                'inline' => 'span',
                'selector' => 'p, h1, h2, h3, h4, h5, h6, a',
                'classes' => 'mb-5'
            ),
             array(
                'title' => 'Margin Bottom 3',
                'inline' => 'span',
                'selector' => 'p, h1, h2, h3, h4, h5, h6, a',
                'classes' => 'mb-3'
            ),
             array(
                'title' => 'Margin Bottom 0',
                'inline' => 'span',
                'selector' => 'p, h1, h2, h3, h4, h5, h6, a',
                'classes' => 'mb-0'
            ),
              array(
                'title' => 'Margin Top 0',
                'inline' => 'span',
                'selector' => 'p, h1, h2, h3, h4, h5, h6, a',
                'classes' => 'mt-0'
            ),
               array(
                'title' => 'Margin Top 3',
                'inline' => 'span',
                'selector' => 'p, h1, h2, h3, h4, h5, h6, a',
                'classes' => 'mt-3'
            ),
            )
            ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');



function build_section_style_string($block = []) {
    $block = wp_parse_args($block, [
        'className' => ' ',
        'align' => ' ',
    ]);

    $classes = '';
    $style_string = '';
    if ($background_color = get_field('block_background_color')) {
        $style_string .= ' ' . esc_attr($background_color);
    }

        if ($background_color == 'bg-img') {
        $style_string .= ' position-relative text-white pt-0 pb-1 ' ; // Add width to inline style
    }

    if ($theme_color = get_field('block_theme_color')) {
        $style_string .= ' ' . esc_attr($theme_color);
    }

    if ($block_pt = get_field('block_pt')) {
        $style_string .= ' ' . esc_attr($block_pt);
    }

    if ($block_pb = get_field('block_pb')) {
        $style_string .= ' ' . esc_attr($block_pb);
    }

    if ($block_mt = get_field('block_mt')) {
          $style_string .= ' ' . esc_attr($block_mt);
    }

    if ($block_mb = get_field('block_mb')) {
         $style_string .= ' ' . esc_attr($block_mb);
    }


    $style_width_string = '';
      if ($block_width = get_field('block_width')) {
         $style_width_string .= ' ' . esc_attr($block_width);
    }

    $style_col_pos_string = '';
    if ($block_column_placement = get_field('block_column_placement')) {
        $style_col_pos_string .= ' justify-content-' . esc_attr($block_column_placement);
    }

    $style_image_string = '';
    if ($block_image_style = get_field( 'block_image_style' )) {
        $style_image_string .= ' ' . esc_attr($block_image_style);
    }

    $img_style = $block_image_style;
if ($img_style == 'rounded') {
    $img_style = 'rounded';
} elseif ($img_style == 'rounded-shadow') {
    $img_style = 'shadow-lg border border-black rounded-5 rounded border-3';
} elseif ($img_style == 'border-lg') {
    $img_style = 'border-5 shadow-lg';
} elseif ($img_style == 'fill-col') {
    $img_style = 'p-0  img-down';
} else {
    $img_style = 'rounded mx-auto d-block border border-4 shadow-lg';
}

   $style_image_effect_string = '';
    if ($block_image_effect = get_field( 'block_image_effect' )) {
        $style_image_effect_string .= ' ' . esc_attr($block_image_effect);
    }
     if ($block_section_image_size = get_field( 'block_section_image_size' )) {
        $style_image_effect_string .= ' ' . esc_attr($block_section_image_size);
    }


    $style_image_align_string = '';
    if ($block_image_align = get_field( 'block_align_image' )) {

            $img_align = $block_image_align;
            if ($img_align == 'top') {
                $img_align = 'is-top';
            } elseif ($img_align == 'center') {
                $img_align = 'is-center';
            } elseif ($img_align == 'bottom') {
                $img_align = 'is-bottom';
            }  else {
                $img_align = 'is-none';
            }


        $style_image_align_string .= ' ' . esc_attr($img_align);
    }

 


    $styles = trim($style_string);
    $width = trim($style_width_string);
    $styleimage = trim($style_image_string);
    $effectimage = trim($style_image_effect_string);
    $alignimage = trim($style_image_align_string);
    $colposition = trim($style_col_pos_string);

    return [
        'style' => $styles,
        'width' => $width,
        'image' => $styleimage,
        'effect' => $effectimage,
        'align' => $alignimage,
        'col' => $colposition,
    ];
}


// function ab_test_redirect() {
//     if (is_page('free-wordpress-task-plugin')) {  // Replace with your page slug
//         if (!isset($_COOKIE['ab_test'])) {
//             $variant = (rand(0, 1) == 0) ? 'A' : 'B';
//             setcookie('ab_test', $variant, time() + (86400 * 1), "/"); // 30-day cookie
//         } else {
//             $variant = $_COOKIE['ab_test'];
//         }

     

//         if ($variant == 'B') {
//             wp_redirect(site_url('/wordpress-task-plugin/')); // Redirect to version B
//             exit;
//         }
//     }
// }
// add_action('template_redirect', 'ab_test_redirect');
