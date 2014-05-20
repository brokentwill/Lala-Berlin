<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<article>
	<div id="info" class="row" style="padding-bottom:10px;">
<?php
$posts = wp_get_recent_posts();
	if ( $posts ) :
		foreach ($posts as $post) :
?>
		<div class="large-11 home-list-posts">
	  		<div class="large-8 columns">
	  			<div class="share-button home-page-button-share"></div>
	  			<?php echo get_the_post_thumbnail($post['ID'], 'large');; ?>
	  		</div>
			<div class="large-4 columns">
				<div class="group-item">
					<div class="item-title"><h5><?php echo qtrans_use(mage_get_language(), $post['post_title']);?></h5></div>
					<div class="item-caption">
						<?php
						$caption = explode(' ', qtrans_use(mage_get_language(), $post['post_content']));
						echo strip_tags(implode(' ',array_slice($caption,0,20)));
						?>
					</div>
					<div class="item-bottom"><a href="<?php echo qtrans_convertURL(get_permalink($post['ID']), mage_get_language());?>" class="button disabledBtn btn-read-move"><?php echo __('Read more'); ?></a></div>
				</div>
			</div>			
		</div>
<?php
		endforeach;
	endif;
?>	
	</div>
</article><!-- #post -->
