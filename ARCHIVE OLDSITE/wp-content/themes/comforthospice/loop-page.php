<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_front_page() ) { ?>
			<h1>Welcome to Comfort Care Hospice</h1>
		<?php } else {
				if( is_page('hospice-care-about-us-landing-page') || is_page('hospice-care-our-services-landing-page') || is_page('hospice-care-volunteer-landing-page') || is_page('hospice-care-resources-landing-page') || is_page('hospice-care-contact-us-landing-page')) { ?>
					<div id="contact-info" style="margin-top:30px;">
						<strong>1-888-330-8483</strong>
					</div>
		<?php
				} else { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php	}
			} ?>
			<div class="border"><img src="<?php bloginfo('template_url'); ?>/images/border.png" alt="image" width="688" height="4" /></div>
		<div class="entry-content">
			<div class="content">
			<?php the_content();?>
			<?php if(is_page( '14' ) || is_page('hospice-care-contact-us')){?>
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/contactForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/contactForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p>
			<?php }elseif(is_page( '18' ) || is_page('hospice-care-set-an-appointment')){?>	
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/appointmentForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/appointmentForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p>	
			<!--?php }elseif(is_page( '20' ) || is_page('hospice-care-join-our-team')){?>	
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/employmentForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/employmentForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p-->
				<?php }elseif(is_page( '20' ) || is_page('hospice-care-become-a-volunteer')){?>	
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/volunteerForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/employmentForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p>
				<?php }elseif(is_page( '65' ) || is_page('hospice-care-send-your-referral')){?>	
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/referralForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/referralForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p>
			<?php }elseif(is_page( '103' ) || is_page('hospice-care-volunteer-form')){?>	
				<p><iframe id="myframe" src="<?php bloginfo('template_url'); ?>/forms/volunteerForm.php" width="100%" scrolling="no" frameborder="0"> Your browser does not support inline frames or is currently configured not to display inline frames. Content can be viewed at actual source page:<?php bloginfo('template_url'); ?>/forms/volunteerForm.php</iframe>
				<script type="text/javascript">
				//<![CDATA[ 
				document.getElementById('myframe').onload = function(){
				calcHeight();
				};
				//]]>
				</script>
				</p>
			<?php } ?>		
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</div><!-- .entry-content -->
	</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
