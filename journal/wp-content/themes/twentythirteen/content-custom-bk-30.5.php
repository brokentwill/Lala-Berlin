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
<?php
$next_post = get_next_post();
$previous_post = get_previous_post();
$categorys = get_the_category(get_the_ID());

?>

<article id="info" <?php post_class(); ?>>
	<header class="entry-header">
		
		<div class="left-right-5-percent post-views-details std row">
			<div class="small-12 medium-6 large-6 columns">
				
				<!-- title Articles -->
				<?php if ( is_single() ) : ?>
					<h5><?php echo qtrans_use(mage_get_language(),the_title(false)); ?></h5>
					<?php 
					$post_type_desc = get_post_custom(get_the_ID(false));
					if ( !empty($post_type_desc) AND isset($post_type_desc['wpcf-post-description']) AND is_array($post_type_desc['wpcf-post-description']) AND count($post_type_desc['wpcf-post-description']) )
					{
						echo '
							<div class="post-type-description">
								'.$post_type_desc['wpcf-post-description'][0].'
							</div>
						';
					}
					?>
					<!-- Tags Articles -->
					<div class="entry-tags padding-bottom-50-px">
					<?php
					/*date time created post*/
					echo '['.get_the_date("d-m-Y").'] ';
					/*Category */
					$tags = get_the_tags();
					if ( $categorys AND is_array($categorys) AND count($categorys) )
					{
						echo '- [Category: ';
						foreach ($categorys as $cate)
						{
							echo '<a href="'.qtrans_convertURL(get_category_link($cate), mage_get_language()).'">'.qtrans_use(mage_get_language(), $cate->name).'</a> ';
						}
						echo ']'.(!empty($tags) ? '[' : '');
					}
					the_tags();
					if ( $tags )
					{
						echo ']';
					}
					?>
					</div>
				<?php else : ?>
					<h5>
						<a href="<?php qtrans_convertURL(the_permalink(), mage_get_language()); ?>" rel="bookmark"><?php qtrans_use(mage_get_language(), the_title()); ?></a>
					</h5>
					
					<!-- Tags Articles -->
					<div class="entry-tags padding-bottom-50-px">
						<?php echo the_tags(); ?>
					</div>

				<?php endif; // is_single() ?>
				
			</div>
			<div class="small-12 medium-6 large-6 columns top-follow-lalaberlin">
				<div class="follow-us-lalaberlin">
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_google_plusone_share"></a>
					<a class="addthis_button_pinterest_share"></a>
					<a class="addthis_button_tumblr"></a>
					</div>
					<!-- AddThis Button END -->
				</div>
			</div>
		</div>
		<!-- Featuer Image -->
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail padding-bottom-50-px">
				<?php echo '<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ).'&h=625').'" />' ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!-- Content articles -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else: ?>
	<div class="entry-content post-view-details-content std text-justify">
		<?php qtrans_use(mage_get_language(), the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' )) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<!-- Flexi single post -->
	<?php 
		$flexible_Single_post = get_field('single_post');
		if ( is_array($flexible_Single_post) AND count($flexible_Single_post) )
		{
			foreach ($flexible_Single_post as $single_post)
			{
				/* --- Slideshow --- */
				$images = $single_post['single-post-slideshow'];
				if( $images )
				{
					echo '
					<div class="image-gallery-single-post row">
					    <div id="slider" class="flexslider">
					        <ul class="slides">';
					foreach( $images as $image )
					{
						echo '
								<li>
				                    <img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.$image['url'].'&w=1129&h=700').'" alt="'.$image['alt'].'" />
				                    <p>'.$image['caption'].'</p>
				                </li>
						';
					}
				    echo '				            
					        </ul>
					    </div>
					</div>
					';
				}

				/* --- single_post_qa --- */
				$single_post_qa = $single_post['single_post_qa'];
				if ( !empty($single_post_qa) )
				{
					echo '
					<div class="repeater-articles single_post_qa_repeater_articles std padding-5-percent text-justify">
						<ul>';
			           	foreach( $single_post_qa as $repeater )
			           	{
			           		echo '
			                <li>
			                	<p class="single-label">'.$repeater['label'].'</p>
			                    <p class="single-value">'.$repeater['value'].'</p>
			                </li>';
			           	}
			           	echo '
			            </ul>
					</div>';
				}

				/* --- Description --- */
				$single_post_desc = $single_post['single_post_description'];
				if ( !empty($single_post_desc) )
				{
					echo '
					<div class="single_post_description text-justify">
						<div class="single_post_border_top"></div>
						<div class="single_post_content">
						'.$single_post_desc.'
						</div>
						<div class="single_post_border_bottom"></div>
					</div>';
				}

				/* --- single_post_qa_2 --- */
				$single_post_qa_2 = $single_post['single_post_qa_2'];
				if ( !empty($single_post_qa_2) )
				{
					echo '
					<div class="repeater-articles single_post_qa_repeater_articles std padding-5-percent text-justify">
						<ul>';
			           	foreach( $single_post_qa_2 as $repeater )
			           	{
			           		echo '
			                <li>
			                	<p class="single-label">'.$repeater['label'].'</p>
			                    <p class="single-value">'.$repeater['value'].'</p>
			                </li>';
			           	}
			           	echo '
			            </ul>
					</div>';
				}

				/* --- single_post_qa_2 --- */
				$single_post_list_image = $single_post['single_post_list_image'];
				if ( !empty($single_post_list_image) )
				{
					echo '
					<div class="single-post-gallery-feature">
						<ul class="row">';
			           	foreach( $single_post_list_image as $image )
			           	{
			           		echo '
			                <li class="medium-4 columns">
			                	<img class="th" src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.$image['sizes']['thumbnail'].'&w=425&h=375').'" alt="'.$image['alt'].'" />
			                </li>';
			           	}
			           	echo '
			            </ul>
					</div>';
				}

				/* --- External Links --- */
				$ExternalLinks = $single_post['single_post_external_links'];
				if ( $ExternalLinks )
				{
					echo '<div class="single_post-external row padding-5-percent">'.
							'<h4 class="single_post-external-title">'.__('External Links').'</h4>'.
							'<ul>';
					foreach ($ExternalLinks as $ind => $link)
					{
						echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['single_post_link'].'</li>';
					}
					echo 	'</ul>'.
						'</div>';
				}				

			}
		}
	?>


	

	<!-- flexible_content_gallery -->
	<?php 
		$flexibleContentGallerys = get_field('flexible_content_gallery');
		if ( is_array($flexibleContentGallerys) AND count($flexibleContentGallerys) ) :
			foreach ($flexibleContentGallerys as $flexible) :
	?>

				<!-- Image Gallery -->
				<?php 
					$images = $flexible['image_gallery'];
					if( $images ):
				?>
					<div class="image-gallery row">
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $images as $image ): ?>
					                <li>
					                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					                    <p><?php echo $image['caption']; ?></p>
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					</div>
				<?php endif; ?>

				<!-- Repeater Articles -->
				<?php 
					$repeaters = $flexible['repeater'];
					if( $repeaters ):
				?>
					<div class="repeater-articles std padding-5-percent text-justify">
						<ul>
			            <?php foreach( $repeaters as $repeater ): ?>
			                <li>
			                	<p><strong><?php echo $repeater['title'];?></strong></p>
			                    <p><?php echo $repeater['content']; ?></p>
			                </li>
			            <?php endforeach; ?>
			            </ul>
					</div>
				<?php endif; ?>

				<!-- Gallery Feature -->
				<!-- Repeater Articles -->
				<?php 
					$GalleryFeature = $flexible['gallery_feature'];
					if( $GalleryFeature ):
				?>
					<div class="gallery-feature">
						<ul class="row">
			            <?php foreach( $GalleryFeature as $gallery ): ?>
			                <li class="medium-4 columns">
			                    <img class="th" src="<?php echo $gallery['sizes']['thumbnail']; ?>" alt="<?php echo $gallery['alt']; ?>" />
			                </li>
			            <?php endforeach; ?>
			            </ul>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$ExternalLinks = $flexible['external_links'];
					if ( $ExternalLinks )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($ExternalLinks as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link_external'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

		<?php endforeach?>
	<?php endif?>

	<!-- flexible_spotifiy_playlist -->
	<?php 
		$flexible_spotifiy_playlist = get_field('flexible_spotifiy_playlist');
		if ( is_array($flexible_spotifiy_playlist) AND count($flexible_spotifiy_playlist) ) :
			foreach ($flexible_spotifiy_playlist as $song) :
	?>
				<!-- Repeater Articles -->
				<?php 
					$spotifiy_playlist = $song['spotifiy_playlist'];
					if( $spotifiy_playlist ):
				?>
					<div class="spotifiy-playlist">
						<ul class="row">
			            <?php foreach( $spotifiy_playlist as $gallery ): ?>
			                <li class="medium-4 columns">
			                    <img class="th" src="<?php echo $gallery['sizes']['thumbnail']; ?>" alt="<?php echo $gallery['alt']; ?>" />
			                </li>
			            <?php endforeach; ?>
			            </ul>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$ExternalLinks = $song['external_links'];
					if ( $ExternalLinks )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($ExternalLinks as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>
		<?php endforeach?>
	<?php endif?>

	<?php 
		$flexible_soundcloud_player = get_field('flexible_soundcloud_player');
		if ( is_array($flexible_soundcloud_player) AND count($flexible_soundcloud_player) ) :
			foreach ($flexible_soundcloud_player as $soundc_play):
	?>
				<!-- Repeater Articles -->
				<?php 
					$SoundcloudPlayer = $soundc_play['soundcloud_player'];
					if( $SoundcloudPlayer ):
				?>
					<div class="soundcloud-player row">
						<div class="large-11">
							<?php echo $SoundcloudPlayer;?>
						</div>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$ExternalLinks = $soundc_play['external_links'];
					if ( $ExternalLinks )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($ExternalLinks as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

	<?php 	endforeach?>
	<?php endif?>

	<!-- flexible_contact_recommendations -->
	<?php 
		$flexible_contact_recommendations = get_field('flexible_contact_recommendations');
		if ( is_array($flexible_contact_recommendations) AND count($flexible_contact_recommendations) ) :
			foreach ($flexible_contact_recommendations as $contact_recommendation):
	?>
				<!-- Repeater Articles -->
				<?php 
					$Recommendation = $contact_recommendation['recommendation'];
					
					if( $Recommendation ):
						foreach ($Recommendation as $item):
				?>
					<div class="recommendation-group row">
						<div class="large-11" style="margin-left:auto;margin-right:auto">
							<div class="recommendation-group-title">
								<h5><strong><?php echo $item['label'];?></strong></h5>
							</div>
							<div class="recommendation-group-content">
								<?php echo $item['content'];?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				<?php endif;?>

				<!-- Image Gallery -->
				<?php 
					$images = $contact_recommendation['gallerys'];
					if( $images ):
				?>
					<div class="image-gallery row">
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $images as $image ): ?>
					                <li>
					                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					                    <p><?php echo $image['caption']; ?></p>
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					</div>
				<?php endif; ?>

				<!-- Contact -->
				<?php 
					$address = $contact_recommendation['address'];
					if( $address ):
				?>
					<div class="recommendation-address row">
						<div class="large-11">
						<?php foreach ($address as $addre) :?>
							<div class="group-recommendation-address">
							    <div class="recommendation-address-title"><h5><strong><?php echo __($addre['label']);?></strong></h5></div>
							    <div class="recommendation-address-content">
							    	<?php echo $addre['content'];?>
							    </div>
							</div>
						<?php endforeach;?>
						</div>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$ExternalLinks = $contact_recommendation['external_links'];
					if ( $ExternalLinks )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($ExternalLinks as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

	<?php 	endforeach?>
	<?php endif?>

	<!-- flexible_content_details -->
	<?php 
		$flexible_content_details = get_field('flexible_content_details');
		if ( is_array($flexible_content_details) AND count($flexible_content_details) ) :
			foreach ($flexible_content_details as $content_details):
	?>
				<!-- repeater_qa -->
				<?php 
					$Repeater_Qa = $content_details['repeater_qa'];
					
					if( $Repeater_Qa ):
						foreach ($Repeater_Qa as $item):
				?>
					<div class="recommendation-group row">
						<div class="large-11" style="margin-left:auto;margin-right:auto">
							<div class="recommendation-group-title">
								<h5><strong><?php echo $item['label'];?></strong></h5>
							</div>
							<div class="recommendation-group-content">
								<?php echo $item['content'];?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				<?php endif;?>

				<!-- external_links_1 -->
				<?php 
					$External_Links_1 = $content_details['external_links_1'];
					if ( $External_Links_1 )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<ul>';
						foreach ($External_Links_1 as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

				<!-- Image Gallery -->
				<?php 
					$images = $content_details['image_gallery'];
					if( $images ):
				?>
					<div class="image-gallery row">
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $images as $image ): ?>
					                <li>
					                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					                    <p><?php echo $image['caption']; ?></p>
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					</div>
				<?php endif; ?>

				<!-- Contact -->
				<?php 
					$caption = $content_details['caption'];
					if( $caption ):
				?>
					<div class="recommendation-address row">
						<div class="large-11">
						<?php foreach ($caption as $addre) :?>
							<div class="group-recommendation-address">
							    <div class="recommendation-address-title"><h5><strong><?php echo __($addre['label']);?></strong></h5></div>
							    <div class="recommendation-address-content">
							    	<?php echo $addre['content'];?>
							    </div>
							</div>
						<?php endforeach;?>
						</div>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$External_Links_2 = $content_details['external_links_2'];
					if ( $External_Links_2 )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($External_Links_2 as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

	<?php 	endforeach?>
	<?php endif?>

	<!-- flexible_iamge_gallery_list -->
	<?php 
		$flexible_iamge_gallery_list = get_field('flexible_iamge_gallery_list');
		if ( is_array($flexible_iamge_gallery_list) AND count($flexible_iamge_gallery_list) ) :
			foreach ($flexible_iamge_gallery_list as $gallery_list):
	?>
				<!-- Image Gallery -->
				<?php 
					$GalleryFeature = $gallery_list['gallery_iamge'];
					if( $GalleryFeature ):
				?>
					<div class="gallery-feature">
						<ul class="row">
			            <?php foreach( $GalleryFeature as $gallery ): ?>
			                <li class="medium-4 columns">
			                    <img class="th" src="<?php echo $gallery['sizes']['thumbnail']; ?>" alt="<?php echo $gallery['alt']; ?>" />
			                </li>
			            <?php endforeach; ?>
			            </ul>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$External_Links = $gallery_list['external_links'];
					if ( $External_Links )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($External_Links as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

	<?php 	endforeach?>
	<?php endif?>

	<!-- flexible_products -->
	<?php 
		$flexible_products = get_field('flexible_products');
		if ( is_array($flexible_products) AND count($flexible_products) ) :
			foreach ($flexible_products as $products):
	?>

				<!-- Image Gallery -->
				<?php 
					$GalleryFeature = $products['caption'];
					if( $GalleryFeature ):
				?>
		            <?php foreach( $GalleryFeature as $gallery ): ?>
		                <div class="recommendation-group row">
							<div class="large-11" style="margin-left:auto;margin-right:auto">
								<div class="recommendation-group-title">
									<h5><strong><?php echo $gallery['label'];?></strong></h5>
								</div>
								<div class="recommendation-group-content">
									<?php echo $gallery['content'];?>
								</div>
							</div>
						</div>
		            <?php endforeach; ?>
				<?php endif; ?>

				<!-- product -->
				<?php 
					$Product = $products['product'];
					if( $Product ):
				?>
					<div class="gallery-feature">
						<ul class="row">
			            <?php foreach( $Product as $item ): ?>
			                <li class="medium-4 columns">
			                	<div class="group-product">
			                		<div class="product-image">
			                			<img class="th" src="<?php echo $item['image']['sizes']['thumbnail']; ?>" alt="<?php echo $item['name']; ?>" />
			                		</div>
			                		<div class="product-caption">
			                			<div class="product-caption-name"><?php echo $item['name'];?></div>
			                			<div class="product-caption-pice"><?php echo $item['pice'];?></div>
			                		</div>
			                	</div>
			                </li>
			            <?php endforeach; ?>
			            </ul>
					</div>
				<?php endif; ?>

				<!-- Image Gallery -->
				<?php 
					$GalleryFeature = $products['image_gallery'];
					if( $GalleryFeature ):
				?>
					<div class="image-gallery row">
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $GalleryFeature as $image ): ?>
					                <li>
					                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					                    <p><?php echo $image['caption']; ?></p>
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					</div>
				<?php endif; ?>

				<!-- External Links -->
				<?php
					$External_Links = $products['external_links'];
					if ( $External_Links )
					{
						echo '<div class="external-links row padding-5-percent">'.
								'<h4 class="link-external-title">'.__('External Links').'</h4>'.
								'<ul>';
						foreach ($External_Links as $ind => $link)
						{
							echo 	'<li class="'.( $ind != 0 ? 'li-link-external': '').'">'.$link['link'].'</li>';
						}
						echo 	'</ul>'.
							'</div>';
					}
				?>

	<?php 	endforeach?>
	<?php endif?>

	<div class="control-panel-articles row">
		<div class="small-12 medium-4 large-4 columns control-back-to-view">
			<a href="<?php echo ( is_array($categorys) AND count($categorys) ) ? qtrans_convertURL(get_category_link( $categorys[0] ),mage_get_language()) : '#'; ?>" class="disabledBtn btn-back"><?php echo __('Back to overview')?></a>
		</div>
		<div class="small-12 medium-4 large-4 columns text-align-center control-panel-articles-middle">
			<a href="<?php echo get_permalink( $previous_post->ID ); ?>" class=" disabledBtn btn-pre"><?php echo __('Prev')?></a>
			<a href="<?php echo get_permalink( $next_post->ID ); ?>" class=" disabledBtn btn-next"><span></span><?php echo __('Next')?></a>
		</div>
		<div  class="small-12 medium-4 large-4 columns text-align-right">
			<div class="follow-us-lalaberlin">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_google_plusone_share"></a>
					<a class="addthis_button_pinterest_share"></a>
					<a class="addthis_button_tumblr"></a>
				</div>
					<!-- AddThis Button END -->

			</div>
		</div>
	</div>

	<!-- Other Articles -->
	<?php
		$args = array(
		    'posts_per_page' => 3,
		    'offset' => 0,
		    'category' => the_category_ID(false),
		    'orderby' => 'post_date',
		    'order' => 'DESC',
		    'post_type' => 'post',
		    'post_status' => 'publish',
		    'suppress_filters' => true
		);
		$posts = wp_get_recent_posts($args);
		
		if ( !empty($posts) AND is_array($posts) AND count($posts) )
		{
			echo '
			<div class="other-articles-related-posts home-page-recent-articles">
				<div class="other-articles-title">'.__('Related Posts').'</div>
				<div class="row">';
			foreach ($posts as $post)
			{
				$caption = explode(' ', qtrans_use(mage_get_language(), $post['post_content']));

				echo '
				<div class="small-12 medium-4 large-4 large-recent-articles columns">
					<div class="home-page-recent-articles-image">
						<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post['ID']) ).'&w=412&h=252').'" />
						<a class="a-view-more" href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.__('View').'</a>
					</div>
					<div class="home-page-recent-articles-description">
						<div class="title"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.qtrans_use(mage_get_language(),get_the_title($post['ID'])).'</a></div>
						<div class="description">'.strip_tags(implode(' ',array_slice($caption,0,10))).'</div>
						<div class="bottom">
							<div class="bottom-view"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.__('View post').'</a></div>
							<div class="bottom-date">['.date("d-m-Y", strtotime($post['post_date'])).']</div>
						</div>
					</div>
				</div>';
			}
					
			echo'
				</div>
			</div>
			';
		}
	?>

</article><!-- #post -->
