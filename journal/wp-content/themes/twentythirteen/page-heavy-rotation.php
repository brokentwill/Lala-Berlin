<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 * Template Name: Heavy Rotation Template
 */

get_header('magento'); ?>
        <div class="main-container col1-layout heavy-rotation">
            <div class="main">
<?php
   //          $args = array(
			//     'posts_per_page' => -1,
			//     'offset' => 0,
			//     'tag_id' => get_query_var('tag_id')
			// );
			// $posts = new WP_Query($args);

			/* ------------------------- Post last new ------------------------- */



			$args = array(
		'post_type' => array('soundclouds', 'spotify'),
		'orderby' => 'post_date',
	    'order' => 'DESC',
	    'posts_per_page' => -1,
	    'offset' => 0,
		'meta_query' => array(
			array(
				'key' => array('wpcf-soundcloud-embed', 'wpcf-id-spotify-song')
			)
		)
	);
	$query_soundcloud_spotify = new WP_Query( $args );

	if ( !empty($query_soundcloud_spotify) AND !empty($query_soundcloud_spotify->posts) AND is_array($query_soundcloud_spotify->posts) AND count($query_soundcloud_spotify->posts) )
	{
		echo '<div class="homepage-soundcloud-spotify-player page-category"><div class="homepage-soundcloud-spotify-player-title">'.get_the_title().'</div>';
		echo '<div class="row">';
		foreach ($query_soundcloud_spotify->posts as $ind => $post) {

			$Soundcloud_Spotify = get_post_custom($post->ID);
			if ( $post->post_type == 'spotify' ) {
					echo '<div class="small-12 medium-4 large-4 large-soundcloud-spotify-player large-recent-articles columns">
									<div class="soundcloud-spotify-player-iframe">
										<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=413&w=413').'" />
										<a class="if-click-play icon-play-img" href="javascript:;" data-class="iframe-spotify" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" ></a>
									</div>
									<div class="soundcloud-spotify-player-bottom-play" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? 'display:none': '').'">
										<div class="title">'.( ( !empty($Soundcloud_Spotify['wpcf-title-spotify-song'][0]) AND !empty($Soundcloud_Spotify['wpcf-title-spotify-song']) ) ? $Soundcloud_Spotify['wpcf-title-spotify-song'][0] : '' ).'</div>
										<div class="decscription">'.( ( !empty($Soundcloud_Spotify['wpcf-description-spotify-song'][0]) AND !empty($Soundcloud_Spotify['wpcf-description-spotify-song']) ) ? $Soundcloud_Spotify['wpcf-description-spotify-song'][0] : '' ).'</div>
										<div class="play"><a class="if-click-play" href="javascript:;" data-class="iframe-spotify" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" >Play</a></div>
									</div>
									<div class="soundcloud-spotify-player-bottom-stop" style="display:none">
										<div class="play"><a class="if-click-stop" href="javascript:;" data-class="iframe-spotify" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" data-img="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252').'" >Stop</a></div>
									</div>
									<div class="soundcloud-spotify-player-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
								</div>';
				} else {
					$embed = $Soundcloud_Spotify['wpcf-soundcloud-embed'][0];
					$embed = str_replace('"></iframe>', '', $embed);
					$embed = explode('src="', $embed);

					if ( !empty($embed) AND is_array($embed) AND count($embed) == 2 ) {
						echo '<div class="small-12 medium-4 large-4 large-soundcloud-spotify-player large-recent-articles columns">
										<div class="soundcloud-spotify-player-iframe">';
										if ( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ){
											echo 	'<iframe id="iframe-'.($ind+1).'" class="iframe-soundcloud" scrolling="no" frameborder="no" src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'"></iframe>';
										} else {
											echo 	'<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=413&w=413').'" /><a class="if-click-play icon-play-img" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'" ></a>
											<a class="if-click-play" href="javascript:;" data-class="iframe-soundcloud" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'" >Play</a>';
										}
										echo '</div>
							<div class="soundcloud-spotify-player-bottom-play" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? 'display:none': '').'">
								<div class="title">'.( ( !empty($Soundcloud_Spotify['wpcf-soundcloud-title'][0]) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-title']) ) ? $Soundcloud_Spotify['wpcf-soundcloud-title'][0] : '' ).'</div>
								<div class="decscription">'.( ( !empty($Soundcloud_Spotify['wpcf-soundcloud-description'][0]) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-title']) ) ? $Soundcloud_Spotify['wpcf-soundcloud-description'][0] : '' ).'</div>
								<div class="play"><a class="if-click-play" href="javascript:;" data-class="iframe-soundcloud" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'" >Play</a></div>
							</div>
							<div class="soundcloud-spotify-player-bottom-stop" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? '': 'display:none').'">
								<div class="play"><a class="if-click-stop" href="javascript:;" data-class="iframe-soundcloud" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=true', 'auto_play=false', $embed[1]).'" data-img="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252').'" >Stop</a></div>
							</div>
							<div class="soundcloud-spotify-player-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
						</div>
						';
					}
				}

			}
		echo '</div>';echo '</div>';
	}
?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer('magento');?>