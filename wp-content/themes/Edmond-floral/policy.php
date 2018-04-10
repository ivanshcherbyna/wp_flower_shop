<?php
/* Template Name: Policy */


get_header();?>
<?php global $mytheme ?>

    <div class="policy-banner" style="background: url('<?php echo $mytheme['background-policy-img']['url']; ?>') no-repeat center; background-size:cover;">
        <div class="policy-heading"><?php echo $mytheme['inner-policy-text']; ?></div>
    </div>


    <div class="policy-text">
        <?php// echo $mytheme['policy-page-text']; ?>
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif; ?>

    </div>

<?php
get_footer();
?>