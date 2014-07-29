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
	<div id="info" class="row large-11 cms-row-content">
<?php

	/* ------------------------- get meta ------------------------- */

	$args = array(
        'orderby' => 'post_date',
        'posts_per_page' => -1,
        'offset' => 0,
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'wpcf-slideshow-home-page'
            )
        )
    );
    $query = new WP_Query( $args );
    $posts_slideshow = array();

	if ( !empty($query) AND isset($query->posts) AND !empty($query->posts) AND is_array($query->posts) AND count($query->posts) )
	{
		$i = 0;
		foreach ($query->posts as $post)
		{
			$FacebockId = get_post_custom($post->ID);
			$unser = unserialize($FacebockId['wpcf-slideshow-home-page'][0]);
			$unser = array_values($unser);
			if ( !empty($unser) AND is_array($unser) AND count($unser) AND !empty($unser[0]) )
			{
				if ( has_post_thumbnail($post->ID) && ! post_password_required($post->ID) )
				{
					$posts_slideshow[] = array(
						'img'  => wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),
						'date' => date("d-m-Y", strtotime($post->post_date)),
						'link' => qtrans_convertURL(get_permalink($post->ID), mage_get_language()),
						'title' => qtrans_use(mage_get_language(),get_the_title($post->ID)),
						'subline' =>( ( !empty($FacebockId['wpcf-subline']) AND is_array($FacebockId['wpcf-subline']) AND count($FacebockId['wpcf-subline']) ) ? $FacebockId['wpcf-subline'][0] : '')
					);
				}
			if (++$i == 5) break;
			}
		}
	}
	/* ------------------------- Slideshow post new ------------------------- */

	if ( count($posts_slideshow) )
	{
		echo '
			<div class="home-page-posts-marked-slideshow">
				<div id="slider" class="flexslider">
			        <ul class="slides">';
			            foreach( $posts_slideshow as $slide )
			            {
		echo 				'<li>
			                    <a href="'.$slide['link'].'"><img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.$slide['img']).'&w=1275&h=700" /></a>
			                    <div class="posts-marked-slideshow-desc">
			                    	<div class="posts-marked-slideshow-desc-title">'.$slide['title'].'</div>
			                    	<div class="posts-marked-slideshow-desc-subline">'.$slide['subline'].'</div>
			                    	<div class="posts-marked-slideshow-desc-bottom">
			                    		<div class="posts-marked-bottom-view"><a href="'.$slide['link'].'">'.__('View post').'</a></div>
			                    		<div class="posts-marked-bottom-date">['.$slide['date'].']</div>
			                    	</div>
			                    </div>
			                </li>';
			            }
		echo '
			        </ul>
			    </div>
			</div>
		';
	}

	$args = array(
	    'posts_per_page' => 3,
	    'offset' => 0,
	    'category' => 0,
	    'orderby' => 'post_date',
	    'order' => 'DESC',
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true
	);

	$posts = wp_get_recent_posts($args);

	/* ------------------------- Post last new ------------------------- */

	if ( !empty($posts) AND is_array($posts) AND count($posts) )
	{

		echo '
		<div class="home-page-recent-articles home-page-recent-articles-top">
			<div class="row">';
		foreach ($posts as $post)
		{
			$caption = get_post_custom($post['ID']);
			$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';
			echo '
			<div class="small-12 medium-4 large-4 large-recent-articles columns">
				<div class="home-page-recent-articles-image">
					<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post['ID']) ).'&w=412&h=252').'" />
					<a class="a-view-more" href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'"><span>'.__('View').'</span></a>
				</div>
				<div class="home-page-recent-articles-description">
					<div class="title"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.qtrans_use(mage_get_language(),get_the_title($post['ID'])).'</a></div>
					<div class="description">'.$caption.'</div>
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

	/* ------------------------- Post Text Teaser top 1 ------------------------- */

	$args = array(
		'post_type' => 'post',
		'orderby' => 'post_date',
	    'order' => 'DESC',
	    'posts_per_page' => 2,
	    'offset' => 0,
		'meta_query' => array(
			array(
				'key' => 'wpcf-text-teaser',
				'value'   => 'a:0:{}',
				'compare' => '!='
			)
		)
	);
	$query_text_teaser = new WP_Query( $args );
	// echo '<pre>';print_r($query_text_teaser);exit;
	if ( !empty($query_text_teaser) AND !empty($query_text_teaser->posts) AND is_array($query_text_teaser->posts) AND count($query_text_teaser->posts) )
	{
		$post = $query_text_teaser->posts[0];
		$caption = get_post_custom($post->ID);
		$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';
		echo '
		<div class="home-page-text-teaser">
			<div class="home-page-text-teaser-title">'.qtrans_use(mage_get_language(), $post->post_title).'</div>
			<div class="home-page-text-teaser-description">'.$caption.'</div>
			<div class="home-page-text-teaser-bottom">
				<div class="bottom-view"><a href="'.qtrans_convertURL(get_permalink($post->ID), mage_get_language()).'">'.__('View post').'</a></div>
				<div class="bottom-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
			</div>
		</div>
		';
	}

	/* ------------------------- soundcloud or spotify player ------------------------- */

	$args = array(
		'post_type' => array('soundclouds', 'spotify'),
		'orderby' => 'post_date',
	    'order' => 'DESC',
	    'posts_per_page' => 3,
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
		echo '
			<div class="homepage-soundcloud-spotify-player">
				<div class="homepage-soundcloud-spotify-player-title">lala heavy rotation</div>
				<div class="row">';
			foreach ($query_soundcloud_spotify->posts as $ind => $post)
			{
				$Soundcloud_Spotify = get_post_custom($post->ID);
				if ( $post->post_type == 'spotify' )
				{
					echo '
						<div class="small-12 medium-4 large-4 large-soundcloud-spotify-player columns">
							<div class="soundcloud-spotify-player-iframe">
								<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252&w=252').'" />
								<a class="if-click-play icon-play-img" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" ></a>
							</div>
							<div class="soundcloud-spotify-player-bottom-play" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? 'display:none': '').'">
								<div class="title">'.( ( !empty($Soundcloud_Spotify['wpcf-title-spotify-song'][0]) AND !empty($Soundcloud_Spotify['wpcf-title-spotify-song']) ) ? $Soundcloud_Spotify['wpcf-title-spotify-song'][0] : '' ).'</div>
								<div class="decscription">'.( ( !empty($Soundcloud_Spotify['wpcf-description-spotify-song'][0]) AND !empty($Soundcloud_Spotify['wpcf-description-spotify-song']) ) ? $Soundcloud_Spotify['wpcf-description-spotify-song'][0] : '' ).'</div>
								<div class="play"><a class="if-click-play" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" >Play</a></div>
							</div>
							<div class="soundcloud-spotify-player-bottom-stop" style="display:none">
								<div class="play"><a class="if-click-stop" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="https://embed.spotify.com/?uri='.$Soundcloud_Spotify['wpcf-id-spotify-song'][0].'" data-img="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252').'" >Stop</a></div>
							</div>
							<div class="soundcloud-spotify-player-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
						</div>
						';
				}
				else
				{
					$embed = $Soundcloud_Spotify['wpcf-soundcloud-embed'][0];
					$embed = str_replace('"></iframe>', '', $embed);
					$embed = explode('src="', $embed);

					if ( !empty($embed) AND is_array($embed) AND count($embed) == 2 )
					{
						echo '
						<div class="small-12 medium-4 large-4 large-soundcloud-spotify-player columns">
							<div class="soundcloud-spotify-player-iframe">';
							if ( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) )
							{
						echo 	'<iframe id="iframe-'.($ind+1).'" class="iframe-soundcloud" scrolling="no" frameborder="no" src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'"></iframe>';
							}
							else
							{
						echo 	'<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252&w=252').'" /><a class="if-click-play icon-play-img" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'" ></a>';
							}
						echo '
							</div>
							<div class="soundcloud-spotify-player-bottom-play" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? 'display:none': '').'">
								<div class="title">'.( ( !empty($Soundcloud_Spotify['wpcf-soundcloud-title'][0]) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-title']) ) ? $Soundcloud_Spotify['wpcf-soundcloud-title'][0] : '' ).'</div>
								<div class="decscription">'.( ( !empty($Soundcloud_Spotify['wpcf-soundcloud-description'][0]) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-title']) ) ? $Soundcloud_Spotify['wpcf-soundcloud-description'][0] : '' ).'</div>
								<div class="play"><a class="if-click-play" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=false', 'auto_play=true', $embed[1]).'" >Play</a></div>
							</div>
							<div class="soundcloud-spotify-player-bottom-stop" style="'.(( !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay']) AND !empty($Soundcloud_Spotify['wpcf-soundcloud-autoplay'][0]) ) ? '': 'display:none').'">
								<div class="play"><a class="if-click-stop" href="javascript:;" data-id="iframe-'.($ind+1).'" data-src="'.str_replace('auto_play=true', 'auto_play=false', $embed[1]).'" data-img="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&h=252').'" >Stop</a></div>
							</div>
							<div class="soundcloud-spotify-player-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
						</div>
						';
					}
				}
			}
		echo '
				</div>
			</div>
		';
	}

	/* ------------------------- Post Text Teaser top 2 ------------------------- */

	if ( !empty($query_text_teaser) AND !empty($query_text_teaser->posts) AND is_array($query_text_teaser->posts) AND count($query_text_teaser->posts) ==2 )
	{
		$post = $query_text_teaser->posts[1];
		$caption = get_post_custom($post->ID);
		$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';
		echo '
		<div class="home-page-text-teaser">
			<div class="home-page-text-teaser-title">'.qtrans_use(mage_get_language(), $post->post_title).'</div>
			<div class="home-page-text-teaser-description">'.$caption.'</div>
			<div class="home-page-text-teaser-bottom">
				<div class="bottom-view"><a href="'.qtrans_convertURL(get_permalink($post->ID), mage_get_language()).'">'.__('View post').'</a></div>
				<div class="bottom-date">['.date("d-m-Y", strtotime($post->post_date)).']</div>
			</div>
		</div>
		';
	}

	$args = array(
	    'posts_per_page' => 3,
	    'offset' => 3,
	    'category' => 0,
	    'orderby' => 'post_date',
	    'order' => 'DESC',
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true
	);
	$posts = wp_get_recent_posts($args);

	/* ------------------------- Post last new ------------------------- */

	if ( !empty($posts) AND is_array($posts) AND count($posts) )
	{
		echo '
		<div class="home-page-recent-articles home-page-recent-articles-middle">
			<div class="row">';
		foreach ($posts as $post)
		{
			$caption = get_post_custom($post['ID']);
			$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';

			echo '
			<div class="small-12 medium-4 large-4 large-recent-articles columns">
				<div class="home-page-recent-articles-image">
					<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post['ID']) ).'&w=412&h=252').'" />
					<a class="a-view-more" href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'"><span>'.__('View').'</span></a>
				</div>
				<div class="home-page-recent-articles-description">
					<div class="title"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.qtrans_use(mage_get_language(),get_the_title($post['ID'])).'</a></div>
					<div class="description">'.$caption.'</div>
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

	/* ------------------------- Facebock ------------------------- */

	// File not exists

	if ( file_exists('cache_social.txt') )
	{
		$cache_social = file_get_contents('cache_social.txt');
		if ( empty($cache_social) )
		{
			$cache_social = (object) array();
		}
		else
		{
			$cache_social = json_decode($cache_social);
		}
	}
	// Open the file to get existing content

	$args = array(
		'post_type' => array('facebook', 'instagram', 'pinterest'),
		'orderby' => 'post_date',
	    'order' => 'DESC',
	    'posts_per_page' => 16,
	    'offset' => 0,
	    'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => array('wpcf-id_facebock', 'wpcf-id_instagram', 'wpcf-url_pinterest')
			)
		)
	);
	$cache_social_id = array_keys((array)$cache_social);
	// Query
	$query_Social = new WP_Query( $args );
	$check_social_new = false;
	/*echo '<pre>';
	print_r($query_Social);exit;*/
	// Check exists id post
	if ( !empty($query_Social) AND !empty($query_Social->posts) AND is_array($query_Social->posts) AND count($query_Social->posts) )
	{
		$datas_social = array();
		// data facebock
		foreach ($query_Social->posts as $ind => $Social)
		{
			if ( $Social->post_type == 'facebook' )
			{
				// Facebook
				$custom_type_facebock = get_post_custom($Social->ID);
				if ( !empty($custom_type_facebock) AND isset($custom_type_facebock['wpcf-id_facebock']) AND is_array($custom_type_facebock['wpcf-id_facebock']) AND count($custom_type_facebock['wpcf-id_facebock']) )
				{
					// cache exists id post facebock
					if ( !empty($cache_social) AND is_array($cache_social_id) AND count($cache_social_id) AND in_array('facebock_'.$custom_type_facebock['wpcf-id_facebock'][0], $cache_social_id) )
					{
						$datas_social['facebock_'.$custom_type_facebock['wpcf-id_facebock'][0]] = $cache_social->{'facebock_'.$custom_type_facebock['wpcf-id_facebock'][0]};
					}
					else
					{
						$query = "http://graph.facebook.com/".$custom_type_facebock['wpcf-id_facebock'][0];
						$ch = curl_init();
						curl_error($ch);
						curl_setopt($ch, CURLOPT_POST, 0);
						curl_setopt($ch,CURLOPT_URL,$query);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$json=curl_exec($ch);
						// curl_close($ch);
						$json = json_decode($json);

						if ( !empty($json) AND is_object($json) AND !empty($json->source) )
						{
							$thumbFB = $json->source;
							if ( !empty($thumbFB) )
							{
								$thumbFB = str_replace('https://', 'http://', $thumbFB);
								$imgResize = explode('/', $thumbFB);
								$imgResize = end($imgResize);

								$ch = curl_init();
								curl_setopt($ch, CURLOPT_POST, 0);
								curl_setopt($ch,CURLOPT_URL,$thumbFB);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								$sourcecode=curl_exec($ch);
								curl_close($ch);

								$savefile = fopen('wp-content/uploads/facebock/'.$imgResize, 'w');
								fwrite($savefile, $sourcecode);
								fclose($savefile);
								$check_social_new = true;
							}
							$datas_social['facebock_'.$custom_type_facebock['wpcf-id_facebock'][0]] = array(
								'link' => $json->link,
								'image' => 'wp-content/uploads/facebock/'.$imgResize,
								'title'=> $Social->post_title,
								'headline' => ( ( !empty($custom_type_facebock['wpcf-facebock-headline']) AND !empty($custom_type_facebock['wpcf-facebock-headline'][0]) ) ?  $custom_type_facebock['wpcf-facebock-headline'][0] : '')
							);
						}
					}
				}
			}
			// Instagram
			else if ( $Social->post_type == 'instagram' )
			{
				$custom_type_instagram = get_post_custom($Social->ID);
				if ( !empty($custom_type_instagram) AND isset($custom_type_instagram['wpcf-id_instagram']) AND is_array($custom_type_instagram['wpcf-id_instagram']) AND count($custom_type_instagram['wpcf-id_instagram']) )
				{
					// cache exists id post facebock
					if ( !empty($cache_social) AND is_array($cache_social_id) AND count($cache_social_id) AND in_array('instagram_'.$custom_type_instagram['wpcf-id_instagram'][0], $cache_social_id) )
					{
						$datas_social['instagram_'.$custom_type_instagram['wpcf-id_instagram'][0]] = $cache_social->{'instagram_'.$custom_type_instagram['wpcf-id_instagram'][0]};
					}
					else
					{
						$query = 'http://api.instagram.com/oembed?url=http://instagram.com/p/'.$custom_type_instagram['wpcf-id_instagram'][0].'/';
						$ch = curl_init();
						curl_error($ch);
						curl_setopt($ch, CURLOPT_POST, 0);
						curl_setopt($ch,CURLOPT_URL,$query);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$json=curl_exec($ch);
						// curl_close($ch);
						$json = json_decode($json);

						if ( !empty($json) AND !empty($json->type) AND $json->type =='photo' AND !empty($json->url) )
						{
							$thumbFB = $json->url;

							$thumbFB = str_replace('https://', 'http://', $thumbFB);
							$imgResize = explode('/', $thumbFB);
							$imgResize = end($imgResize);

							$ch = curl_init();
							curl_setopt($ch, CURLOPT_POST, 0);
							curl_setopt($ch,CURLOPT_URL,$thumbFB);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$sourcecode=curl_exec($ch);
							curl_close($ch);

							$savefile = fopen('wp-content/uploads/instagram/'.$imgResize, 'w');
							fwrite($savefile, $sourcecode);
							fclose($savefile);
							$check_social_new = true;
							$datas_social['instagram_'.$custom_type_instagram['wpcf-id_instagram'][0]] = array(
								'link' => 'http://instagram.com/p/'.$custom_type_instagram['wpcf-id_instagram'][0],
								'image' => 'wp-content/uploads/instagram/'.$imgResize,
								'title'=> $Social->post_title,
								'headline' => ( ( !empty($custom_type_instagram['wpcf-instagram-headline']) AND !empty($custom_type_instagram['wpcf-instagram-headline'][0]) ) ?  $custom_type_instagram['wpcf-instagram-headline'][0] : '')
							);
						}

					}
				}
			}else if ( $Social->post_type == 'pinterest' ){
				//pinterest
				$custom_type_pinterest = get_post_custom($Social->ID);
				if ( !empty($custom_type_pinterest) AND isset($custom_type_pinterest['wpcf-url_pinterest']) AND is_array($custom_type_pinterest['wpcf-url_pinterest']) AND count($custom_type_pinterest['wpcf-url_pinterest']) )
				{
					// cache exists id post facebock
					if ( !empty($cache_social) AND is_array($cache_social_id) AND count($cache_social_id) AND in_array('pinterest_'.$custom_type_pinterest['wpcf-url_pinterest'][0], $cache_social_id) )
					{
						$datas_social['pinterest_'.$custom_type_pinterest['wpcf-url_pinterest'][0]] = $cache_social->{'pinterest_'.$custom_type_pinterest['wpcf-url_pinterest'][0]};
					}
					else
					{
						$datas_social['pinterest_'.$custom_type_pinterest['wpcf-url_pinterest'][0]] = array(
							'image' => ( ( !empty($custom_type_pinterest['wpcf-image']) AND !empty($custom_type_pinterest['wpcf-image'][0]) ) ?  str_replace(get_site_url(),'',$custom_type_pinterest['wpcf-image'][0]) : ''),
							'title'=> $Social->post_title,
							'link' => ( ( !empty($custom_type_pinterest['wpcf-url_pinterest']) AND !empty($custom_type_pinterest['wpcf-url_pinterest'][0]) ) ?  $custom_type_pinterest['wpcf-url_pinterest'][0] : ''),
							'headline' => ''
						);
						$check_social_new = true;

					}
				}
			}
		}

		// save cache facebock
		if ( !isset($cache_social) )
		{
			$cache_social = array();
		}
		// exists post new
		if ( $check_social_new AND isset($datas_social) AND count($datas_social) )
		{
			$cache_social = $datas_social;
			file_put_contents("cache_social.txt", "");
			file_put_contents('cache_social.txt', json_encode((array)$cache_social));
			unset($datas_social);
		}

	}
	else
	{
		file_put_contents("cache_social.txt", "");
	}

	$datas_cache = file_get_contents('cache_social.txt');

	if ( empty($datas_cache) )
	{
		$datas_cache = array();
	}
	else
	{
		$datas_cache = (array)json_decode($datas_cache);
	}

	if ( !empty($datas_cache) AND is_array($datas_cache) AND count($datas_cache) )
	{
		$datas_cache = array_values($datas_cache);
		$options = get_option( 'sample_theme_options' );
		echo '
		<div class="home-page-facebocks">';
			// < 0 and > 5
			if ( count($datas_cache) <= 5 )
			{
			echo  '
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<div id="slider" class="flexslider">
				        <ul class="slides">';
				            foreach( $datas_cache as $slide )
				            {
				echo 				'<li>
					                    <img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.get_site_url().'/'.$slide->image).'&w=1345&h=525" />
					                    <div class="posts-facebocks-desc">
					                    	<div class="posts-facebocks-desc-headline">'.$options['introtext'].'</div>
					                    </div>
					                </li>';
				            }
			echo '
				        </ul>
				    </div>
				</div>
			</div>
			';
			}
			else
			{

				echo  '
				<div class="row">
					<div class="small-12 medium-8 large-8 columns home-page-facebocks-left">
						<div id="slider" class="flexslider">
					        <ul class="slides">';
					            foreach( $datas_cache as $ind => $slide )
					            {
					            	if ( $ind < 5 )
					            	{
					echo 				'<li>
						                    <img  src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.get_site_url().'/'.$slide->image).'&w=845&h=525" />
						                    <div class="posts-facebocks-desc">
						                    	<div class="posts-facebocks-desc-headline">'.$options['introtext'].'</div>
						                    </div>
						                </li>';
						                unset($datas_cache[$ind]);
					            	}
					            }
				echo '
					        </ul>
					    </div>
					</div>
				';
				if ( count($datas_cache) > 0 )
				{

					echo '
						<div class="small-12 medium-4 large-4 columns home-page-facebocks-right">';
						foreach ($datas_cache as $ind => $item)
						{
							if ( $ind > 4 AND $ind < 7 )
							{
								echo '
								<div class="hp-fb-right-item-'.$ind.'">
									<a href="'.$item->link.'">
										<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.get_site_url().'/'.$item->image).'&w=412&h=252" />
									</a>
								</div>
								';
								unset($datas_cache[$ind]);
							}
						}
						echo '
						</div>
					';
				}
				echo '</div>';
				/*End row*/
				reset($datas_cache);
				if ( count($datas_cache) > 0 )
				{

					echo '
					<div class="row home-page-facebocks-bottom">';
					foreach ($datas_cache as $ind => $item)
					{
						echo '
						<div class="small-12 medium-4 large-4 columns">
							<a href="'.$item->link.'">
								<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.get_site_url().'/'.$item->image).'&w=412&h=252" />
							</a>
						</div>
						';
						unset($datas_cache[$ind]);
					}
					echo '
					</div>
					';
				}
			}
		echo '
		</div>
		';
		unset($datas_social);
	}


	// Post last new bottom
	$args = array(
	    'posts_per_page' => 3,
	    'offset' => 6,
	    'category' => 0,
	    'orderby' => 'post_date',
	    'order' => 'DESC',
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true
	);
	$posts = wp_get_recent_posts($args);
	$date_last = date("Y-m-d H:i:s");
	if ( !empty($posts) AND is_array($posts) AND count($posts) )
	{
		echo '
		<div class="home-page-recent-articles home-page-recent-articles-bottom">
			<div class="row">';
		foreach ($posts as $key => $post)
		{
			$caption = get_post_custom($post['ID']);
			$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';

			echo '
			<div class="small-12 medium-4 large-4 large-recent-articles columns">
				<div class="home-page-recent-articles-image">
					<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post['ID']) ).'&w=412&h=252').'" />
					<a class="a-view-more" href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'"><span>'.__('View').'</span></a>
				</div>
				<div class="home-page-recent-articles-description">
					<div class="title"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.qtrans_use(mage_get_language(),get_the_title($post['ID'])).'</a></div>
					<div class="description">'.$caption.'</div>
					<div class="bottom">
						<div class="bottom-view"><a href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.__('View post').'</a></div>
						<div class="bottom-date">['.date("d-m-Y", strtotime($post['post_date'])).']</div>
					</div>
				</div>
			</div>';
			$date_last = $post['post_date'];
		}

		echo'
			</div>
		</div>';
		$args = array(
		    'posts_per_page' => 3,
		    'offset' => 0,
		    'category' => 0,
		    'orderby' => 'post_date',
		    'order' => 'DESC',
		    'post_type' => 'post',
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'date_query' => array(
				array(
					'column' => 'post_date',
					'before' => $date_last,
				)
			)
		);
		$posts = new WP_Query( $args );
		if ( !empty($posts->posts) AND is_array($posts->posts) AND count($posts->posts) )
		{
			echo '
			<div class="home-page-bottom-load-more"><a class="load-more" data-date="'.$date_last.'" href="javascript:;">'.__('Load more').'</a></div>
			';
		}

	}

?>
	</div>
</article><!-- #post -->