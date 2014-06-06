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
$SpotifyId = get_post_custom($post['ID']);
if ( !empty($SpotifyId) AND isset($SpotifyId['wpcf-id_spotify']) AND is_array($SpotifyId['wpcf-id_spotify']) AND count($SpotifyId['wpcf-id_spotify']) ) :
?>
<div class="spotify-main large-4 columns home-list-posts">
    <div class="spotify-content">
        	<iframe id="ifr-spotify" width="100%" height="500px" src="https://embed.spotify.com/?uri=<?php echo $SpotifyId['wpcf-id_spotify'][0];?>" frameborder="0" allowtransparency="true"></iframe>
    </div>
</div>
<?php endif;?>