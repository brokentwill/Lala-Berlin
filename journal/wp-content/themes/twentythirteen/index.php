<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
// Your Magento Mage.php
// Mage Enabler WordPress plugin users may
// skip these lines
get_header('magento'); ?>
        <div class="main-container col1-layout">
            <div class="main">
			<?php 
			get_template_part('content', get_post_format() );
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
    <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({
                controlsContainer: ".image-gallery",
                prevText: "", //String: Set the text for the "previous" directionNav item
                nextText: ""
            });
        });
    </script>
<?php get_footer('magento');?>