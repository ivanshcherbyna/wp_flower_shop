<?php
/* Template name: Home
 *
 *
 */?>
<?php

global $post; // FOR USE METHOD REDUX redux_post_meta
get_header();
?>

<main role="main">
    <!-- section -->
    <?php $background=redux_post_meta(THEME_OPT,$post->ID,'background-homepage-img');
          $location_head_text=redux_post_meta(THEME_OPT,$post->ID,'location-head-text');
          $location_head_inner_text=redux_post_meta(THEME_OPT,$post->ID,'location-head-inner-text');
          $location_head_phone=redux_post_meta(THEME_OPT,$post->ID,'location-phone-text');
          $location_background_color=redux_post_meta(THEME_OPT,$post->ID,'location-background-img');
          $location_general_text=redux_post_meta(THEME_OPT,$post->ID,'location-general-text');
          $homepage_images=redux_post_meta(THEME_OPT,$post->ID,'homepage-images');

    ?>
    <div class="location-banner" style="background: url('<?php echo $background['url']; ?>') no-repeat center; background-size:cover;">
        <div class="location-heading">
            <?php echo $location_head_text; ?>
            <span class="location-address"> <?php echo $location_head_inner_text; ?></span>
            <span class="location-phone"> <?php echo $location_head_phone; ?></span>
        </div>
    </div>
    <div class="location-text" style="background-color:'<?php echo $location_background_color['background-color']; ?>">
        <p><?php echo $location_general_text; ?></p>
    </div>
    <div class="location-img-wrap">

        <!--images grid sector -->
        <?php
        if(!empty($homepage_images)) {
            $rows = (count($homepage_images)) / 2; // Number rows how has array (2 img on row)
            for ($i = 0; $i < $rows; $i++) {
                ?>
                <div class="wrap-row">
                    <?php
                    $imageChunk = array_slice($homepage_images, $i * 2, 2);// Get chunk images from array to row
                    foreach ($imageChunk as $item) {
                        ?>

                        <a href="<?php echo $item['url']; ?>" class="img-wrap">
                            <img src="<?php echo $item['image']; ?>"/>
                            <span href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></span>
                        </a>

                        <?php
                    }
                    ?>
                </div>
                <?php

            }
        }
        ?>
        <!--/images grid sector -->

    </div>
    <!-- /section -->
</main>



<?php get_footer(); ?>
