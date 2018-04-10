<?php global $mytheme; ?>
            <!-- footer -->
<?php

if( is_page(sanitize_title('my-account'))){
    do_action('wc_pip_before_footer');
}
?>
			<footer class="footer" role="contentinfo" style="background-color: <?php echo $mytheme['footer-background-img']['background-color'];?>">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6 footer-column">
                            <div class="footer-column-heading">SHOP ADDRESS</div>
                            <ul>
                                <li><?php echo $mytheme['name-shop-text']; ?></li>
                                <li><?php echo $mytheme['adress-street-text']; ?></li>
                                <li><?php echo $mytheme['adress-city-text']; ?></li>
                                <li>
                                    <a href="tel:<?php echo $mytheme['telephone-text'];?>">tel: <?php echo $mytheme['telephone-text'];?></a>
                                </li>
                                <li>
                                    <a href="<?php echo $mytheme['footer-url-find-us']; ?>">Find us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-6 footer-column">
                            <div class="footer-column-heading">HOUSE OF OPERATION</div>
                            <ul>
                                <li>Mon-Sat: <?php echo $mytheme['work-hours-Mon-Sat-text'];?></li>
                                <li>Sun: <?php echo $mytheme['work-hours-Sun-text'];?></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-6 footer-column">
                            <div class="footer-column-heading">OUR POLICIES</div>

                                <?php wp_nav_menu('menu=footer-menu'); ?>

                        </div>
                        <div class="col-sm-3 col-xs-6 footer-column">
                            <?php
                            if(is_active_sidebar('sidebar-footer'))
                            {
                           ?>
                             <div class="footer-column-heading">SOCIAL MEDIA</div>
                                <?php dynamic_sidebar('sidebar-footer'); }?>
                                
                            
                        </div>
                    </div>
                </div>

			</footer>
			<!-- /footer footer-bg -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
	</body>

</html>
