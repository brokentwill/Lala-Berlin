<?php
	/** Load WordPress Bootstrap */
	require_once 'wp-load.php';
	if ( !empty($_POST) AND !empty($_POST['loadmore']) AND !empty($_POST['date_last']) )
	{

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
					'before' => $_POST['date_last'],
				)
			)
		);
		$posts = wp_get_recent_posts($args);

		if ( !empty($posts) AND is_array($posts) AND count($posts) )
		{
			$json = array('status'=>true, 'html'=>'');
			foreach ($posts as $post)
			{
				$caption = get_post_custom($post['ID']);
				$caption = ( isset($caption['wpcf-post-description']) AND !empty($caption['wpcf-post-description']) AND is_array($caption['wpcf-post-description']) AND count($caption['wpcf-post-description']) ) ? $caption['wpcf-post-description'][0] : '';

				$json['html'] .= '
				<div class="small-12 medium-4 large-4 columns">
					<div class="home-page-recent-articles-image">
						<img src="'.(dirname(get_site_url()).'/lib/timthumb.php?src='.wp_get_attachment_url( get_post_thumbnail_id($post['ID']) ).'&w=412&h=252').'" />
						<a class="a-view-more" href="'.qtrans_convertURL(get_permalink($post['ID']), mage_get_language()).'">'.__('View').'</a>
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
				$_POST['date_last'] = $post['post_date'];
			}
			$json['date_last'] = $_POST['date_last'];
			exit(json_encode($json));
		}
		else
		{
			exit(json_encode(array('status'=>false)));
		}
	}
	else
	{
		header('Location: '.get_site_url());
	}
?>