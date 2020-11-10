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
				<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title home-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				</div><!-- #post-0 -->
		
				<script type="text/javascript">
					// focus on search field after it has loaded
					document.getElementById('s') && document.getElementById('s').focus();
				</script>
			</div>
			<?php get_includes ('sidebar'); ?>
		<div class="clearfix"></div>			
	</div>
<?php get_includes ('footer'); ?>
