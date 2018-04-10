<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  Automattic
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

//CUSTOMIZING VIEW (DELETE SHORT DESCRIPTION ON META PRODUCT SECTION



?>

<?php  //CUSTOMIZATION VIEW SELECT ON CHANGE QUANTITY
global $product;
$quantity_product= $product->get_stock_quantity();
echo '<div class="upsells hidden">';
woocommerce_upsell_display( $limit = '-1', $columns = 4, $orderby = 'rand', $order = 'desc' );
echo '</div>';
?>

<?php if(!empty($quantity_product)){
	?>
<div class="select-wrap hidden">
	<div class="dropdown-heading">Product Option :</div>
	<select class="selectpicker select_quantity_product" title="choose quantity" name="quantity" data-width="171px">
		<?php
		for ($i=1;$i<=$quantity_product;$i++){
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		?>
	</select>
<?php
}
else return;
?>

</div>
