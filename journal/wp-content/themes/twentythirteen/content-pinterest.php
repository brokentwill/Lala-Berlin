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
$PinterestURL = get_post_custom($post['ID']);
if ( !empty($PinterestURL) AND isset($PinterestURL['wpcf-url_pinterest']) AND is_array($PinterestURL['wpcf-url_pinterest']) AND count($PinterestURL['wpcf-url_pinterest']) ) :
?>
<div class="pinterest-main large-6 columns home-list-posts">
    <div class="Pinterest-content">
        <a data-pin-do="embedBoard" href="<?php echo $PinterestURL['wpcf-url_pinterest'][0];?>  " data-pin-scale-width="115" data-pin-scale-height="120" data-pin-board-width="900"></a>
    </div>
</div>
<?php endif;?>