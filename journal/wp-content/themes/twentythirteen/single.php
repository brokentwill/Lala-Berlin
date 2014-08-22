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
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-536ec8070153aa42"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery('.flexslider').flexslider({
				controlsContainer: ".image-gallery",
				prevText: "",
				nextText: "",
				animation: 'fade',
				smoothHeight: true,
				slideshow: false,
				// controlNav: false,
				directionNav: false,

			});
		});
		var addthis_config = {"data_track_addressbar":false};
	</script>
<?php get_footer('magento');?>