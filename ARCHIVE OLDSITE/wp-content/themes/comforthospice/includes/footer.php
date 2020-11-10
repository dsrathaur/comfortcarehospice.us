<!--footer-->
<div id="footer">
	<div id="footer-links">
		<?php wp_nav_menu( array( 'after' => '', 'container_class' => 'menu-header', 'theme_location' => 'secondary')); ?>
	</div>
	<div id="copy">&copy; Copyright <?php
  $start_year = '2013';
  $current_year = date('Y');
  $copyright = ($current_year == $start_year) ? $start_year : $start_year.' - '.$current_year;
  echo $copyright;
  ?>&nbsp;&nbsp;&bull;&nbsp;&nbsp;Comfort Care Hospice&nbsp;&nbsp;&bull;&nbsp;&nbsp;<a href="http://www.proweaver.com/health-care-custom-web-design" target="_blank" title=
  "Health Care Web Design - Health Care">Hospice Care Web Design:</a> <a href="http://www.proweaver.com" target="_blank" title="Proweaver - Custom Web Design">Proweaver</a>
	</div>
</div>
<!--end footer-->
<div style="width:200px; height:auto; overflow:hidden; clear:both; margin:0 auto; padding:5px 0px;">
	 <div style="float:left; width:auto; height:auto;">
	  <a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
	 </div>
	 <div style="float:right; width:auto; height:auto;">
	  <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
	 </div>
	</div>  
</div>
</div>
<!--end wrapper-->
<script type="text/javascript"> Cufon.now(); </script>
<?php wp_footer();?>
</body>
</html>
<!-- 
******************************************
******************************************
Author: Lea Pearl dela Torre
Date Created: April 01, 2013
Business Type: Hospice Care
******************************************
******************************************
-->
<?php exit; ?>