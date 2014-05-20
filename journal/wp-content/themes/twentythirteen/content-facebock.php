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

$FacebockId = types_render_field('id_facebock');
// response is of the format "access_token=AAAC..."
$access_token = 'CAAJHqBlgGtoBAIg1apEXBnOZAEiFNoNnFYQonGxBIZAqYsJDXWYMtSIZA949ZAfvVuXtoofvjbMtvcWlkN6tIj8LZAIoCX1Rn56U678idxX1WUZCjH5CdNYB2sYZCwD5JZBZCeqpzvDWBunu2DjhtYuY0ZCvhDlsn0qQamZBRzIZAmpwFyiGUItHg6FG';


$query = "https://graph.facebook.com/fql?q=".urlencode("SELECT post_id, app_id, attachment, source_id, created_time, message FROM stream WHERE post_id = '".$FacebockId."' ORDER BY created_time DESC LIMIT 0, 1")."&access_token=" . $access_token;
$json = file_get_contents($query);
$json = json_decode($json);
/*echo '<pre>';
print_r($json);exit;*/
if ( !empty($json) AND is_object($json) AND isset($json->data) AND $datas = $json->data AND is_array($datas) AND count($datas) ) :
?>
<div class="facebock-main">
	<div class="left-right-5-percent std">
		<div class="facebock-title"><?php echo the_title()?></div>
		<div class="entry-tags bottom-5-percent"></div>
	</div>
	<div class="facebock-content">
	<?php
	$Gallerys = array();
	$attachment = isset($datas[0]->attachment) ?  $datas[0]->attachment : '';
	$medias = ( !empty($attachment) and $attachment->media ) ? $attachment->media : array();
	if ( is_array($medias) AND count($medias) )
	{
		foreach ($medias as $media)
		{
			$img = ($media->type == 'photo') ? $media->src : '';
			if ( !empty($img) )
			{
				$imgResize = explode('/', $img);
				$imgResize = end($imgResize);
				$imgFull = str_replace('_s.', '_n.', $imgResize);
				$img = str_replace($imgResize, $imgFull, $img);
				$Gallerys[] = $img;
			}
		}
	}
	?>
	<?php if ( count($Gallerys) ) : ?>
		<div class="facebock-images">
		<?php if ( count($Gallerys) > 1 ) : ?>
			    <div class="flexslider" id="slider">
			        <ul class="slides">
			        <?php foreach ($Gallerys as $gallery) : ?>
			        	<li >
			        		<img src="<?php echo $gallery;?>" >
			        	</li>
			        <?php endforeach;?>
			        </ul>
			    </div>
				<ul class="flex-direction-nav">
					<li><a href="#" class="flex-prev"></a></li>
					<li><a href="#" class="flex-next"></a></li>
				</ul>
		<?php else: ?>
			<img src="<?php echo $Gallerys[0];?>" />
		<?php endif;?>
		</div>
	<?php endif;?>
		
		<?php if ( isset($datas[0]->message) AND !empty($datas[0]->message) ) : ?>
		<div class="facebock-content entry-content std padding-5-percent text-justify">
			<?php echo $datas[0]->message;?>	
		</div>
		<?php endif;?>
	</div>
</div>
<?php endif;?>