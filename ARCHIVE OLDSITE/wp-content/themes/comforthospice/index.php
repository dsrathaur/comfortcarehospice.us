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