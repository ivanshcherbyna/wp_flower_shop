<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
global $post;
$product_id= get_post()->ID;
$product=wc_get_product($product_id);
$tags=get_the_terms( $product_id, 'product_tag' );
$category =wc_get_product_category_list($product_id);

$short_description =$product->get_short_description();
$image_id = $product->get_image_id();
$url_full_image_product=wp_get_attachment_image_url($image_id,'full');
$gallery_img_ids=$product->get_gallery_image_ids();

do_action( 'woocommerce_before_single_product' );


if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="product-wrap">
    <div class="product-gallery">

    <?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
    remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
//    remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
		do_action( 'woocommerce_before_single_product_summary' );

	?>
		<div class="thumbs">
			<img src="<?php echo $url_full_image_product;?>">
			<?php  //CUSTOMIZATION GALLERY FOR CLIENT FORM VIEW
			foreach ($gallery_img_ids as $id){
				$url=wp_get_attachment_image_url($id,'full');
				?>
				<img src="<?php echo $url; ?>">
			<?php
			}
			?></div>
		<div class="product-image">
			<a href="<?php echo $url_full_image_product;?>" data-lightbox="image-1">
				<img src="<?php echo $url_full_image_product;?>" class="zoom-img img-responsive">
				<div class="zoom-image-btn">
				</div>
			</a>
		</div>
</div>
	<div class="summary entry-summary product-options">
		<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
//        remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
        the_title( '<h1 class="product-name">', '</h1>' );
        ?>


            <?php

			do_action( 'woocommerce_single_product_summary' );
		

		?>
	</div>
</div>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */



	
		//do_action( 'woocommerce_after_single_product_summary' ); //CUSTOMIZATION WOOCOMMERCE TEMPLATE

	?>
	<div class="woocommerce-tabs ">


		<div class="product-description">
			<div class="description-heading"><?php echo $category;?></div> <div class="description-text"><?php echo $product->get_description(); ?></div>
			<div class="description-warning"><?php if(!empty($short_description)) echo $short_description; else return; ?></div>
		</div>

	</div>
</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
