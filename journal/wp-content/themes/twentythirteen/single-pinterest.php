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
				<?php get_template_part( 'content-pinterest', get_post_format() ); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
<?php get_footer('magento');?>