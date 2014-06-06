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
global $wpdb;
$access_token = '';
$results = $wpdb->get_results("SELECT token FROM wp_token WHERE id = 1");
if ( !empty($results) AND is_array($results) AND count($results) )
{
	$access_token = $results[0]->token;
}
$FacebockId = isset($post) ? get_post_custom($post['ID']) : get_post_custom(get_the_ID(false)) ;
if ( !empty($FacebockId) AND isset($FacebockId['wpcf-id_facebock']) AND is_array($FacebockId['wpcf-id_facebock']) AND count($FacebockId['wpcf-id_facebock']) )
{
	$query = "https://graph.facebook.com/fql?q=".urlencode("SELECT post_id, app_id, attachment, source_id, created_time, message FROM stream WHERE post_id = '".$FacebockId['wpcf-id_facebock'][0]."' ORDER BY created_time DESC LIMIT 0, 1")."&access_token=" . $access_token;
	$json = file_get_contents($query);
	$json = json_decode($json);
	if ( !empty($json) AND is_object($json) AND isset($json->data) AND $datas = $json->data AND is_array($datas) AND count($datas) )
	{
		$attachment = isset($datas[0]->attachment) ?  $datas[0]->attachment : '';
		$medias = ( !empty($attachment) and $attachment->media ) ? $attachment->media : array();
		if ( is_array($medias) AND count($medias) )
		{
			$medias = $medias[0];
			$thumbFB = ($medias->type == 'photo') ? $medias->src : '';
			if ( !empty($thumbFB) )
			{
				$imgResize = explode('/', $thumbFB);
				$imgResize = end($imgResize);
				$imgFull = str_replace('_s.', '_n.', $imgResize);
				$thumbFB = str_replace($imgResize, $imgFull, $thumbFB);
				echo '
					<div class="facebock-main large-6 columns home-list-posts">
						<div class="facebook-title">'.the_title().'</div>
						<div class="facebock-content">
							<img src="'.$thumbFB.'" alt="" />
						</div>
					</div>';
			}
		}
		
	}
}
?>