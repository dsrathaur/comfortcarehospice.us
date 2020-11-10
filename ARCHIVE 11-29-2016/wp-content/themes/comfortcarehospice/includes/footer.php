<footer class="wrapper">	
		<div class="footer-inner">
			<div class="service-areas">
			<?php dynamic_sidebar('servareas') ;?>
		</div>
			<div class="footernav">
				<h2>Navigation</h2>
				<div class="footermenuA footermenu"><?php wp_nav_menu( array( 'menu' => 'footer-nav1') ); ?> </div>
				<div class="footermenu"><?php wp_nav_menu( array( 'menu' => 'footer-nav2') ); ?> </div>
			</div>
			<div class="copyright">
			<a href="index.php" class="footerlogo"><img src="<?php bloginfo('template_url'); ?>/images/footerlogo.png" alt="Comfort Care Hospice"></a>	
			&copy; Copyright&nbsp;<?php
				$start_year = '2016';
				$current_year = date('Y');
				$copyright = ($current_year == $start_year) ? $start_year : $start_year.' - '.$current_year;
				echo $copyright;
			?><br/><a href="http://www.proweaver.com/hospice-care-web-design" target="_blank">Hospice Care Web Design</a>: <a href="http://www.proweaver.com/" target="_blank">Proweaver</a>
		</div>
		</div>
</footer>

		<!--validator logos -->
        <div style="width:200px; height:auto; overflow:hidden; clear:both; margin:0 auto; padding:5px 0px;">
             <div style="float:left; width:auto; height:auto;">
              <a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
             </div>
            <div style="float:right; width:auto; height:auto;">
              <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" /></a>
             </div>
        
        </div>
      <!--validator logos -->

		</div> <!-- End Protect Me -->
		
		<?php get_includes('ie'); ?>
		
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.1.min.js"></script>

		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/calcheight.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr-custom-v2.7.1.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/selectivizr-min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/responsiveslides.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
	
		<?php wp_footer(); ?>
		
    </body>
</html>


<!--- Author: Control Number 13 -->