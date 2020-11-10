<?php if(is_page('landing-page') || is_page('hospice-care-about-us-landing-page') || is_page('hospice-care-our-services-landing-page') || is_page('hospice-care-volunteer-landing-page') || is_page('hospice-care-resources-landing-page') || is_page('hospice-care-contact-us-landing-page')){ ?>
	<?php
	@session_start();
	get_includes('header-landing');
	?>	
	<div class="landing">
		<div class="landing_comp">
			<div align="center">
				<div id="flashContent"></div>
				<div id="nav_landing">
					<?php wp_nav_menu( array( 'after' => '', 'container_class' => 'menu-header', 'theme_location' => 'primary')); ?>
				</div>
			</div>
		</div>
		<div class="landing_content">
			<?php get_template_part( 'loop', 'page' ); ?>
		</div>
	</div>
	<?php get_includes('footer-landing'); ?>
<?php } else { ?>
	<?php
	@session_start();
	get_includes('header');
	get_includes('top');
	?>	
		<!--main-->
		<div id="main" class="clearfix">
			<div id="mainbg" class="clearfix">
				<?php get_includes('sidebar'); ?>
				<!--right-->
				<div class="col-b">
					<?php get_template_part( 'loop', 'page' ); ?>
				</div>
				<!--end right-->
			</div>	
		</div>
		<!--end main-->
	<?php get_includes('footer'); ?>
<?php } ?>