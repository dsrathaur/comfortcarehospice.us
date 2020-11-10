<!--left-->
<div class="col-a">	
	<div class="bgleft">
		<div class="bgleftpadding">
			<div class="left-tabs">
				<div class="tab-doctor">
					<a href="hospice-care-request-consultation">Request Consultation</a>
				</div>
			</div>
			<?php if(!is_page('hospice-care-our-location')): ?>
			<div class="image"><div class="btnleft"><a href="hospice-care-our-location">View Our Location</a></div></div>
			<?php endif; ?>
			<div class="contacts">
				<ul>
				  <?php
				  if ( ! dynamic_sidebar( 'contact-details' ) ) : ?>
				  <?php endif; // end primary widget area ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--end left-->