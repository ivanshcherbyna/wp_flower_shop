<?php
/* Template Name: Flowering plants COPY RESERVED */


get_header();?>

<?php global $mytheme ?>

<?php
//TEST MODE GET POSTS
//GET PRODUCTS FOR TAG, YOU CAN USE THIS CODE FOR ANY TAGS, CATEGORIES & ETC
//$args = array(
//    'post_type'    => 'product',
//    'product_tag'  => 'flowering'
//);
//$query = new WP_Query;
//$my_posts = $query->query($args);

//foreach( $my_posts as $my_post ){
//    echo '<p>pos_id: '. $my_post->ID .'</p>';
//    echo '<p>post_title: '. $my_post->post_title .'</p>';
//    echo '<p>link: '. $my_post->guid .'</p>';
//}


//////////////
$args = array(
    'post_type'    => 'product',
    'post_status'    => 'publish',
    'taxonomy'  => 'product_tag',

);
$query = new WP_Query;
$my_tags = get_terms($args);

//$my_tags->name
//$my_tags->slug
//$my_tags->term_taxonomy_id
//$my_tags->term_id
//$my_tags->count
//$my_tags->description
//$current_product_tag ='flowering';

if(!isset($_GET['current_product_tag']))
    $current_product_tag = 'flowering';
else $current_product_tag = $_GET['current_product_tag'];

$args_=array(
    'post_type'    => 'product',
    'post_status'    => 'publish',
    'product_tag'  => $current_product_tag,
    'order' => 'ASC',
    'posts_per_page' => -1,
);
$products_of_tag=wc_get_products($args_);
$quantity_of_products_tag=count($products_of_tag);
$products_rows = [];
$rows_wrap_ten_products=ceil($quantity_of_products_tag/10);
?>

<div class="slider-wrap" style="background: url(<?php echo $mytheme['slider-under-img']['url'];?>) no-repeat center bottom; background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="my-slider">
                        <?php foreach ($my_tags as $slide) {
                            ?>
                            <div class="slide-wrap">
                                <div class="slide-heading"><?php echo $slide->name; ?></div>
                                <div class="slide-subheading"><?php echo $slide->description;?></div>
                                <div class="cat-link">
                                    <a class="current-slide-button" href="" data="<?php echo $slide->slug;?>">Details</a>
                                    <input type="hidden" name="current-url" data="<?php echo get_permalink() ;?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php
//////////////////


        echo '<div class="catalog-wrap">';
            echo '<div class=" catalog-items-wrap">';


for  ($i=0; $i<$rows_wrap_ten_products; $i++) {
    foreach( [ 3, 2, 5 ] as $index ) { //array of indexes 2 3 5 for use to next view
        if ($quantity_of_products_tag > 0) {

            echo "<div class=' items-wrap'>";

            foreach (array_splice($products_of_tag, 0, $index) as $product) {

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

}
echo "</div>";
//TEST MODE GET POSTS
?>
    <!--    <div class="slider-wrap" style="background: url(--><?php //echo $mytheme['slider-under-img']['url'];?><!--) no-repeat center bottom; background-size: cover;">*/*/
<!--/*        <div class="container-fluid">*/-->
    <!--/*            <div class="row">*/-->
    <!--/*                <div class="my-slider">*/-->
    <!--/*                        */--><?php ////foreach ($mytheme['flowering-link-slides'] as $slide) {
//                            ?>
    <!--                            <div class="slide-wrap">-->
    <!--                                <div class="slide-heading">--><?php //echo $slide['title']; ?><!--</div>-->
    <!--                                <div class="slide-subheading">--><?php //echo $slide['description']; ?><!--</div>-->
    <!--                                <div class="cat-link">-->
    <!--                                    <a href="--><?php //echo $slide['url']; ?><!--">Details</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            --><?php
//                        }
//                        ?>
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


<!--    <div class="home-cats-wrap">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="">-->
<!---->
<!--                    <div class="wrap-cats-row three-per-row">-->
<!--                        --><?php //foreach ($mytheme['section-three-images'] as $slide){
//                            ?>
<!--                            <a href="--><?php //echo $slide['url'];?><!--" class="home-cat">-->
<!--                                <img src="--><?php //echo $slide['image'];?><!--"/>-->
<!--                                <span >--><?php //echo $slide['title'];?><!--</span>-->
<!--                            </a>-->
<!--                         --><?php
//                        }
//                        ?>
<!--                    </div>-->
<!--                    <div class="wrap-cats-row two-per-row">-->
<!--                        --><?php //foreach ($mytheme['section-second-images'] as $slide){
//                            ?>
<!--                            <a href="--><?php //echo $slide['url'];?><!--" class="home-cat">-->
<!--                                <img src="--><?php //echo $slide['image'];?><!--"/>-->
<!--                                <span >--><?php //echo $slide['title'];?><!--</span>-->
<!--                            </a>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="row">
                <div class="col-sm-6 col-md-4 no-padding-left text-center col-xs-12 no-padding-xs">
                    <img src="<?php echo $mytheme['home-cat-img']['url'];?>" class="img-responsive cat-text-img"/>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="home-cat-heading"><?php echo $mytheme['home-cat-heading'];?></div>
                    <div class="home-cat-text">
                        <?php echo $mytheme['home-cat-text'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();

