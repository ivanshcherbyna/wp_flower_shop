<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<section class="up-sells upsells products ">

		<?php woocommerce_product_loop_start(); ?>
		<div class="vase-opt-heading">Choose Vase :</div>
		<div class="wrap-opt-imgs">
			<?php foreach ( $upsells as $upsell['products'] ) : ?>
			<?php $image_id =$upsell['products']->get_image_id();
				$src_img=wp_get_attachment_image_url($image_id,'full');
				$product_id=$upsell['products']->get_id();
				$url =get_home_url().'/?add-to-cart=';
			?>
				<a href="#" class="upsell-image"> <img  src="<?php echo $src_img; ?>">
					<input type="hidden" name="upsell-prouct-id" value="<?php echo $product_id; ?>">
					<input type="hidden" name="url-add-to-cart" value="<?php echo $url; ?>">
				</a>


			<?php endforeach; ?>
		</div>
		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
