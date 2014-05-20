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
		<div class="control-panel-articles row">
			<div class="small-4 large-4 columns">
				<a href="<?php echo ( is_array($categorys) AND count($categorys) ) ? qtrans_convertURL(get_category_link( $categorys[0] ),mage_get_language()) : '#'; ?>" class="button disabledBtn btn-back"><?php echo __('Back')?></a>
			</div>
			<div class="small-4 large-4 columns text-align-center">
				<div class="share-button share-button-details"></div>
			</div>
			<div id="product-next-prev" class="small-4 large-4 columns text-align-right">
				<a href="<?php echo get_permalink( $previous_post->ID ); ?>" class="button disabledBtn btn-pre"><?php echo __('Prev')?></a>
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="button disabledBtn btn-next"><span></span><?php echo __('Next')?></a>
			</div>
		</div>
		<div class="left-right-5-percent std">
			<!-- title Articles -->
			<?php if ( is_single() ) : ?>
				<h5><?php echo qtrans_use(mage_get_language(),the_title(false)); ?></h5>

				<!-- Tags Articles -->
				<div class="entry-tags bottom-5-percent">
				<?php
				/*date time created post*/
				echo get_the_date("d M Y");
				/*Category */
				
				if ( $categorys AND is_array($categorys) AND count($categorys) )
				{
					echo ', '.__('Kategorie').': ';
					foreach ($categorys as $cate)
					{
						echo '<a href="'.qtrans_convertURL(get_category_link($cate), mage_get_language()).'">'.qtrans_use(mage_get_language(), $cate->name).'</a> ';
					}
				}
				echo ' '.the_tags(); ?>
				</div>
			<?php else : ?>
				<h5>
					<a href="<?php qtrans_convertURL(the_permalink(), mage_get_language()); ?>" rel="bookmark"><?php qtrans_use(mage_get_language(), the_title()); ?></a>
				</h5>
				
				<!-- Tags Articles -->
				<div class="entry-tags bottom-5-percent">
					<?php echo the_tags(); ?>
				</div>

			<?php endif; // is_single() ?>
		</div>
		<!-- Featuer Image -->
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail('full'); ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!-- Content articles -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else: ?>
	<div class="entry-content std padding-5-percent text-justify">
		<?php qtrans_use(mage_get_language(), the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' )) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

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
	<!-- Other Articles -->
	<?php
		$args = array(
			'cat'      => the_category_ID(false),
			'posts_per_page'    => '3'
		);
		$OtherArticles= new WP_Query( $args );
		if ( $OtherArticles AND is_array($OtherArticles->posts) AND count($OtherArticles->posts) )
		{
			echo '<div class="other-articles row">'.
						'<ul>'.
							'<li class="other-articles-title">'.__('Other articles').'</li>';
							foreach ($OtherArticles->posts as $article)
							{
								echo '<li class="medium-4 columns std">'.
										'<a href="'.$article->guid.'" title="'.qtrans_use(mage_get_language(), $article->post_title).'">'.get_the_post_thumbnail($article->ID, 'medium').'</a>'.
		            					'<h5>'.qtrans_use(mage_get_language(), $article->post_title).'</h5>'.
		            				'</li>';
							}
				echo 	'</ul>'.
					'</div>';
		}
	?>

</article><!-- #post -->
