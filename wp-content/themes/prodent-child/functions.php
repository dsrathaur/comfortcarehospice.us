<?php
/**
 * Child-Theme functions and definitions
 */
function prodent_child_scripts() {
    wp_enqueue_style( 'prodent-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'prodent_child_scripts' );


add_action('wp_footer', 'custom_script');
function custom_script() {
?>
	<script type="text/javascript">
		
		jQuery(document).on("click",".sc_services_item_featured_top ",function(event) {
	       event.preventDefault();
	    });

		//Smooth scroll
        jQuery(document).ready(function($) {
            $(".smooth-scroll").click(function(event) {
			event.preventDefault();
		    $('html, body').animate({
		         scrollTop: $($.attr(this, 'href')).offset().top - 70
		    }, 1500);
		});
        });
	</script>
<?php }
?>