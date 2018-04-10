<?php
/* Template Name: About test */


?>

    <?php get_header();
    ?>
<header class="header">


<div class="main-nav-wrap">
    <nav class="navbar custom-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
    <?php my_nav(); ?>
    </div>
</nav>
</div>

</header>
<?php global $mytheme ?>
    <div class="about-banner" style="background: url('<?php echo $mytheme['background-about-img']['url']; ?>') no-repeat center; background-size:cover;">
        <div class="about-heading"><?php echo $mytheme['inner-about-text']; ?></div>
    </div>
    <div class="about-text">

        <?php if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif; ?>

    </div>
    <div class="meet-wrap">



        <?php
        foreach ($mytheme['about-page-images-meet'] as $item) {
            ?>
            <div class="meet-item david">
                <img src="<?php echo $item['image']; ?>">
                <a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
            </div>
            <?php
        }
        ?>
    </div>



<?php
get_footer();
?>