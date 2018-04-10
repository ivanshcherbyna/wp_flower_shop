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
global $post;
//$product_id= get_post()->ID;
//$product=wc_get_product($product_id);
//$image_id = $product->get_image_id();
//$url_full_image_product=wp_get_attachment_image_url($image_id,'full');
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
do_action( 'woocommerce_before_main_content' );

?>
<div class="catalog-wrap">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<div class=" catalog-heading"><?php woocommerce_page_title(); ?></div>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	?>
	<div class="catalog-subheading">
		<?php
	do_action( 'woocommerce_archive_description' );
		?>
	</div>


<?php

if ( have_posts() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

	//do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {

		$terms = wp_get_post_terms( $post->ID, 'product_cat' );
		$category_slug =$terms[0]->slug;
		$args=array(
			'post_status'    => 'publish',
			'category' => $category_slug,
			'order' => 'ASC',
			'posts_per_page' => -1,
		);
		$products_of_category=wc_get_products($args);
		$quantity_of_products_cat=count($products_of_category);
		$products_rows = [];
		$rows_wrap_ten_products=ceil($quantity_of_products_cat/10);
		$counter =0;
		global $mytheme;
		$category_divide=$mytheme['categories_sections'];


		echo '<div class="catalog-items-wrap">';
		for  ($i=0; $i<$rows_wrap_ten_products; $i++) {
			$counter++;
		foreach( [ 2, 3, 5 ] as $index ) { //array of indexes 2 3 5 for use to next view
			if ($quantity_of_products_cat > 0) {

				echo "<div class='items-wrap'>";

				foreach (array_splice($products_of_category, 0, $index) as $product) {

					$product_name = $product->get_name();
					$product_url = $product->get_permalink();
					$image_id = $product->get_image_id();
					$url_full_image_product = wp_get_attachment_image_url($image_id, 'full');
					?>
					<a href="<?php echo $product_url; ?>" class="item">
						<img src="<?php echo $url_full_image_product; ?>">
						<span><?php echo $product_name; ?></span>
					</a>
					<?php

					}

				echo "</div>";

				}
			}
			?>
			<div class="divider" style="background: <?php echo $category_divide[$counter]['divider-background-img']['background-color'];?> url(<?php echo $category_divide[$counter]['divider-background-img']['background-image'];?>) no-repeat left center; background-size: cover; ">
				<div class="wrap">
					<div class="content">
						<div class="heading"><?php echo $category_divide[$counter]['divider-head-text'];?></div>
						<div class="text"><?php echo $category_divide[$counter]['divider-text']; ?>
						</div>
						<a href="<?php echo get_home_url();?>/shop/" class="go-to-cat">Shop</a>
					</div>
				</div>
			</div>

			<?php
		}
		?>


		<?php
		echo "</div>";
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-5 no-padding-left text-center col-xs-12 no-padding-xs">
				<img src="<?php echo $image;?>" class="img-responsive cat-text-img">
			</div>
			<div class="col-sm-6 col-md-7 col-xs-12">
				<div class="home-cat-heading"><?php woocommerce_page_title();?></div>
				<div class="home-cat-text"><?php do_action( 'woocommerce_archive_description' );?> </div>
				<a href="#" class="learn-more">Learn more</a>
			</div>
		</div>
	</div>


<?php

		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );


			//wc_get_template_part( 'content', 'product' );
		}
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
//do_action( 'woocommerce_sidebar' );
?>
</div>
<?php
get_footer( 'shop' );
