<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php// endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php

// sort by porder custom field
function array_sort($array, $on, $order=SORT_ASC)
 {

     $new_array = array();
     $sortable_array = array();
     
     if (count($array) > 0) {
         foreach ($array as $k => $v) {
             if (is_array($v) or is_object($v)) {
                 foreach ($v as $k2 => $v2) {
                     if ($k2 == $on) {                     	
                         $sortable_array[$k] = $v2;
                     }
                 }
             } else {
                 $sortable_array[$k] = $v;
             }
         }

         switch ($order) {
             case SORT_ASC:
                 asort($sortable_array);
             break;
             case SORT_DESC:
                 arsort($sortable_array);
             break;
         }

         foreach ($sortable_array as $k => $v) {
             array_push($new_array, $array[$k]);
         }
     }

     return $new_array;
 }


global $post;
$termID = get_queried_object()->term_id;

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'product',
    'tax_query'     => array(
        array(
            'taxonomy'  => 'product_cat',
            'field'     => 'id', 
            'terms'     => $termID
        )
    )
);

$the_query = new WP_Query( $args );
$tmp = array();
$wsresults = $the_query->get_posts();
foreach($wsresults as $wsresult){
	$getOrder = get_field('porder', $wsresult->ID);
	if($getOrder == ''){
		$getOrder = 0;
	}
	$tmpobj = $wsresult;
	$tmpobj->product_order = intval($getOrder);
	$tmp[] = $tmpobj;
}
$sorted = array_sort($tmp, 'product_order', SORT_ASC);
$the_query->posts = $sorted;
if ( $the_query->have_posts() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {

		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
		wp_reset_postdata();
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
