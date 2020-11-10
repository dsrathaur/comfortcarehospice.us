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
				<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
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
			<!--end right-->
		</div>	
	</div>
	<!--end main-->
<?php get_includes('footer'); ?>

