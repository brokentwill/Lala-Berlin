<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div class="main-container col1-layout">
        <div class="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header row">
				<div class="large-11 top-list-category">
					<?php echo get_the_category_list(); ?>
				</div>
			</header><!-- .archive-header -->
			<?php
			$Slideshow = array();
			$category_posts = get_posts(array('category'=>the_category_ID(FALSE)));
			foreach ($category_posts as $post)
			{
				if ( get_field('slideshow_category', $post->ID) )
				{
					$caption = explode(' ', qtrans_use(mage_get_language(), $post->post_content));
					$Slideshow[] = array(
										'title'=>qtrans_use(mage_get_language(), $post->post_title),
										'caption'=>strip_tags(implode(' ',array_slice($caption,0,10))),
										'image'=>get_the_post_thumbnail($post->ID),
										'link' => qtrans_convertURL(get_permalink($post->ID), mage_get_language())
									);
					unset($caption);
				}
			}
			unset($category_posts);
			if ( is_array($Slideshow) AND count($Slideshow) ):
			?>
			<div class="category-slideshow-gallery row">
			    <div id="slider" class="category-slideshow large-11">
			        <ul class="slides">
			            <?php foreach( $Slideshow as $image ): ?>
			                <li class="slide-item">
			                    <?php echo $image['image']; ?>
			                    <div class="info-slider">
				                    <div class="item-title"><h5><?php echo $image['title']; ?></h5></div>
				                    <div class="item-caption"><?php echo $image['caption']; ?></div>
				                    <div class="item-bottom"><a href="<?php echo $image['link'];?>" class="button disabledBtn btn-read-move"><?php echo __('Read more'); ?></a></div>
			                    </div>
			                </li>
			            <?php endforeach; ?>
			        </ul>
			    </div>
			</div>
			<?php endif?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>				
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/flexslider.css" media="all" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery('.category-slideshow').flexslider({
				controlsContainer: ".category-slideshow-gallery",
				prevText: "", //String: Set the text for the "previous" directionNav item
				nextText: ""
			});
		});
	</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>