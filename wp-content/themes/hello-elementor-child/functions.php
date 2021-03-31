<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_style( 'application-halflings-style',
        get_stylesheet_directory_uri() . '/font-icons/glyphicons_halflings/css/halflings.css'
    );
    wp_enqueue_style( 'application-style',
        get_stylesheet_directory_uri() . '/css/application.css'
    );
	wp_enqueue_style( 'bootstrap',
        get_stylesheet_directory_uri() . '/css/bootstrap.css'
    );
	wp_enqueue_style( 'woocommerce',
        get_stylesheet_directory_uri() . '/css/woocommerce.css'
    );
}
//
// Your code goes below
//
//define( 'TEMPLATEPATH', dirname(__FILE__), true );
//require_once (TEMPLATEPATH. '/functions/vc_elements.php');

/* remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 ); */

/* remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'lpd_single_excerpt', 'woocommerce_template_single_excerpt', 20 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 35 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'lpd_shop_content', 'lpd_product_archive_description', 10 ); */
