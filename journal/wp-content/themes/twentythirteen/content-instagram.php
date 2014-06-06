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
$instagramId = get_post_custom($post['ID']);
if ( !empty($instagramId) AND isset($instagramId['wpcf-id_instagram']) AND is_array($instagramId['wpcf-id_instagram']) AND count($instagramId['wpcf-id_instagram']) ) :
?>
<div class="instagram-main large-4 columns home-list-posts">
    <div class="instagram-content">
        <a href="http://instagr.am/p/<?php echo $instagramId['wpcf-id_instagram'][0]?>/"><img src="http://instagr.am/p/<?php echo $instagramId['wpcf-id_instagram'][0]?>/media/?size=l" /></a>
    </div>
</div>
<?php endif;?>