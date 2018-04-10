<?php
/*
 * Template Name: Contact form
 */
get_header();
global $mytheme;
?>
<div class="contact-wrap">
    <div class="contact-heading"><?php echo $mytheme['contact-head-text'];?></div>
    <div class="contact-subheading"><?php echo $mytheme['contact-subhead-text'];?></div>
    <div class="inputs-wrap">
        <?php
        echo do_shortcode('[contact-form-7 id="117" title="Contact Form on single page"]');
        ?>
    </div>

</div>


<?php
get_footer();
?>
