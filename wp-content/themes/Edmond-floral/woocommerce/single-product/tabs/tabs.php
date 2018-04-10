<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

//FULL CUSTOMIZATION WOOCOMMERCE TABS -> CONVERT TO ONLY DESCRIPTION IN DIV CLASS "woocommerce-tabs"
$product_id= get_post()->ID;
$product=wc_get_product($product_id);
$tags=get_the_terms( $product_id, 'product_tag' );
$category =wc_get_product_category_list($product_id);

$shortDescription =$product->get_short_description();
if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs ">


			<div class="product-description">
				<div class="description-heading"><?php echo $category;?></div> <div class="description-text"><?php echo $product->get_description(); ?></div>
				<div class="description-warning"><?php if(!empty($shortDescription)) echo $shortDescription; else return; ?></div>
			</div>

	</div>

<?php endif; ?>
