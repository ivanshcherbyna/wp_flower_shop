<?php
/* Template Name: Category products */

global $post;
$categories=get_categories(array('type'=> 'product', 'taxonomy'=>'product_cat'));
get_header();?>

<?php global $mytheme ?>
<div class="catalog-wrap">
<div class="catalog-heading"><?php echo'<pre>'; var_dump($categories); ?></div>
<div class="catalog-subheading"><?php ?></div>
<?php foreach ($mytheme['design_sections'] as $section ){?>
    <div class="garden-design-wrap">
        <div class="garden-item">
            <?php
            if($section['design_button-set-left-right'] ==1){ ?>

                <div class="item-description">
                    <div class="item-heading"><?php echo $section['ph_design_section_head']; ?></div>
                    <div class="item-text">
                        <?php echo $section['ph_design_section_title']; ?>
                    </div>
                </div>
                <div class="img-wrap">
                    <img src="<?php echo $section['ph_design_section_image']['url']; ?>"/>
                </div>
                <?php
            }
            else {?>
                <div class="img-wrap">
                    <img src="<?php echo $section['ph_design_section_image']['url']; ?>"/>
                </div>
                <div class="item-description">
                    <div class="item-heading"><?php echo $section['ph_design_section_head']; ?></div>
                    <div class="item-text">
                        <?php echo $section['ph_design_section_title']; ?>
                    </div>
                </div>
                <?php
            }?>
        </div>
        <div class="garden-design-subheading"><?php echo $section['design_section_head_portfolio']; ?></div>
        <div class="portfolio-wrap">

            <?php
            for ($i=1;$i<5;$i++){ //only 4 items on portfolio
                if(!empty($section['title-for-'.$i.'-image']) && !empty($section['title-for-'.$i.'-image']) && !empty($section['link-for-'.$i.'-image'])){
                    ?>
                    <div class="portfolio-item">
                        <img src="<?php echo $section['ph_design-portfolio-image' . $i]['url']; ?>"/>
                        <a href="<?php echo $section['link-for-' . $i . '-image']; ?>"><?php echo $section['title-for-' . $i . '-image']; ?></a>
                    </div>
                    <?php
                }
                else return;
            } ?>

        </div>

    </div>
    <?php
}?>
</div>


<?php
get_footer();
?>
