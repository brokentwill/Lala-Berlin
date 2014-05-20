<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('magento'); ?>
        <div class="main-container col1-layout">
            <div class="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-custom', get_post_format() ); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/flexslider.css" media="all" />
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