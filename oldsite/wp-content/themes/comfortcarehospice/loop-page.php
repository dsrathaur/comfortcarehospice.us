<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php if ( is_front_page() ) { ?>
					<h1><span>Welcome to</span> Comfort Care Hospice</h1>
					<?php } else { ?>
						<h1 class="nontitle"><?php the_title(); ?></h1>
						
						<?php } the_content(); ?>
						<?php if($post->post_content=="" && !is_page('sitemap')) { ?>
						<p><span class="comingsoon">Coming Soon...</span></p>
						<?php } ?>
						
					<?php if(is_page( '11' )) { ?>
						<p><iframe id="myframe" style="width:100%;overflow:hidden;border:0;" src="<?php bloginfo('template_url'); ?>/forms/contactForm.php">Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page: <?php bloginfo('template_url'); ?>/forms/contactForm.php</iframe>
						<script type="text/javascript">
						//<![CDATA[ 
						document.getElementById('myframe').onload = function(){
						calcHeight();
						};
						//]]>
						</script>
						</p>
					<?php } else if(is_page( 'sitemap' )) { ?>
					
						<?php wp_list_pages(); ?>
						
					<?php } else if(is_page( '44' )) { ?>
						<p><iframe id="myframe" style="width:100%;overflow:hidden;border:0;" src="<?php bloginfo('template_url'); ?>/forms/appointmentForm.php">Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page: <?php bloginfo('template_url'); ?>/forms/appointmentForm.php</iframe>
						<script type="text/javascript">
						//<![CDATA[ 
						document.getElementById('myframe').onload = function(){
						calcHeight();
						};
						//]]>
						</script>
						</p>
					<?php } else if(is_page( '41' )) { ?>
						<p><iframe id="myframe" style="width:100%;overflow:hidden;border:0;" src="<?php bloginfo('template_url'); ?>/forms/clientSurveyForm.php">Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page: <?php bloginfo('template_url'); ?>/forms/clientSurveyForm.php</iframe>
						<script type="text/javascript">
						//<![CDATA[ 
						document.getElementById('myframe').onload = function(){
						calcHeight();
						};
						//]]>
						</script>
						</p>
					<?php } else if(is_page( '10' )) { ?>
						<p><iframe id="myframe" style="width:100%;overflow:hidden;border:0;" src="<?php bloginfo('template_url'); ?>/forms/volunteerForm.php">Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page: <?php bloginfo('template_url'); ?>/forms/volunteerForm.php</iframe>
						<script type="text/javascript">
						//<![CDATA[ 
						document.getElementById('myframe').onload = function(){
						calcHeight();
						};
						//]]>
						</script>
						</p>
					<?php }
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) );
					edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>	
<?php endwhile; // end of the loop. ?>
