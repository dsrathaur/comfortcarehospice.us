<?php
	get_includes ('head'); 
	get_includes ('header'); 
	get_includes ('nav'); 
	get_includes ('banner');                        
	get_includes ('mid');                        
?>

	<div id="main-wrapper" class="wrapper">
		<div class="clearfix"> </div>
			<div class="maincontents">
				<?php get_template_part('loop','page'); ?>
			</div>
			<?php get_includes ('sidebar'); ?>
		<div class="clearfix"></div>			
	</div>
<?php get_includes ('footer'); ?>