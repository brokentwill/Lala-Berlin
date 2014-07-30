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
<?php
   //          $args = array(
			//     'posts_per_page' => -1,
			//     'offset' => 0,
			//     'tag_id' => get_query_var('tag_id')
			// );
			// $posts = new WP_Query($args);

			/* ------------------------- Post last new ------------------------- */

			global $query_string;
			query_posts( $query_string . '&posts_per_page=-1' );

			if ( have_posts() ) :
				echo '
				<div class="home-page-recent-articles page-category">
					<div class="page-category-title">
						<!--<div class="category-label">'.__('Category').'</div>-->
						<div class="category-value">'.qtrans_use(mage_get_language(),single_cat_title( '', false )).'</div>
					</div>
					<div class="row">';
				while ( have_posts() ) : the_post();
					$caption = get_post_custom(get_the_ID());
					$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';
					echo '
					<div class="small-12 medium-4 large-4 large-recent-articles columns">
						<div class="home-page-recent-articles-image">
							<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ).'&w=412&h=252').'" />
							<a class="a-view-more" href="'.qtrans_convertURL(get_permalink(get_the_ID()), mage_get_language()).'"><span>'.__('View').'</span></a>
						</div>
						<div class="home-page-recent-articles-description">
							<div class="title"><a href="'.qtrans_convertURL(get_permalink(get_the_ID()), mage_get_language()).'">'.qtrans_use(mage_get_language(),get_the_title(get_the_ID())).'</a></div>
							<div class="description">'.$caption.'</div>
							<div class="bottom">
								<div class="bottom-view"><a href="'.qtrans_convertURL(get_permalink(get_the_ID()), mage_get_language()).'">'.__('View post').'</a></div>
								<div class="bottom-date">['.get_the_date("d-m-Y").']</div>
							</div>
						</div>
					</div>';
				endwhile;
				echo'
					</div>
				</div>
				';
			endif;
?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer('magento');?>