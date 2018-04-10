<?php
/* Template Name: Retail */


get_header();?>
<?php global $mytheme ?>

    <div class="retail-banner" style="background: url('<?php echo $mytheme['background-retail-img']['url']; ?>') no-repeat center; background-size:cover;" >
        <div class="retail-heading"><?php echo $mytheme['inner-retail-text']; ?><br><span><?php echo $mytheme['retail-subhead-text']; ?></span></div>
    </div>
    <div class="retails-items-wrap">
        <?php foreach ($mytheme['frontpage_sections'] as $section )
{?>

    <?php
    if($section['button-set-left-right'] ==1){
        ?>
    <div class="retail-item">
        <div class="item-description">
                <div class="item-heading"><?php echo $section['ph_section_head']; ?></div>
        <div class="item-text"><?php echo $section['ph_section_title']; ?></div>
        </div>
             <div class="img-wrap">
                <img src="<?php echo $section['ph_section_image']['url']; ?>"/>
            </div>
    </div>
            <?php
    }
    else{
        ?>
       <div class="retail-item">
            <div class="img-wrap">
                <img src="<?php echo $section['ph_section_image']['url']; ?>"/>
            </div>
            <div class="item-description">
                <div class="item-heading"><?php echo $section['ph_section_head']; ?></div>
                <div class="item-text"><?php echo $section['ph_section_title']; ?></div>
            </div>

        </div>
            <?php
    }
?>

    <?php
}?>

        <div class="retail-item">
            <div class="retail-ab-heading"><?php echo $mytheme['retail-desc-head-text']; ?></div>
            <div class="item-description back-day" style="background: url('<?php echo $mytheme['background-desc-left-img']['url'];?>')no-repeat center;
                background-size: cover;">
                <div class="item-heading"><?php echo $mytheme['retail-desc-head-left-text']; ?></div>
                <div class="item-text">
                    <?php echo $mytheme['retail-desc-left-text']; ?>
                </div>
            </div>
            <div class="item-description locate" style="background: url('<?php echo $mytheme['background-desc-right-img']['url'];?>')no-repeat center;
                background-size: cover;">
                <div class="item-heading"><?php echo $mytheme['retail-desc-head-right-text']; ?></div>
                <div class="item-text">
                    <?php echo $mytheme['retail-desc-right-text']; ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
?>