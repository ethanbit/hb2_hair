<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );

$classes[] = 'ws-content-product';


?>
<li <?php post_class( $classes ); ?>>

	<?php 
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<div class="product-box-wrapper">	
		<div class="product-details-wrapper">
			<div class="product-details">	
				<?php 				
				$catID = wc_get_product_term_ids( get_the_ID(), 'product_cat' );

				$color = get_field('field_5bb3186564a87', 'product_cat_'.$catID[0]);
				if($color == ''){
					$color = findParent($catID[0]);
				}

				if($color == ''){
					$color = '#ffffff';
				}
				?>
			
				<!-- <h5 class="product-category-title"><?php echo wp_kses_post( $product->get_categories( ', ', '<span class="posted_in">' . _n( '', '', $cat_count, 'woocommerce' ) . ' ', '</span>' ) ); ?></h5> -->
			
				<h2 class="product-title  ws_title"  style="color:#fff;background-color: <?php echo $color; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<!-- <div class="product-info">
					<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</div> -->
				
			</div>		
		</div>
		<div class="product-img-box">

			<a href="<?php the_permalink(); ?>" class="product-image">
			
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
				
			</a>
			
			<!-- <div class="product-buttons-overlay">
				<?php
					/**
					 * woocommerce_after_shop_loop_item hook.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' );
			
				?>
			</div> -->
			
		</div>
	</div>

</li>
