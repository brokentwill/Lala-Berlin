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

$PinterestURL = types_render_field('url_pinterest');
if ( !empty($PinterestURL) ) :
?>
<div class="pinterest-main">
    <div class="left-right-5-percent std">
        <div class="Pinterest-title"><?php echo the_title()?></div>
        <div class="entry-tags bottom-5-percent"></div>
    </div>
    <div class="Pinterest-content">
        <div class="Pinterest-content entry-content std padding-5-percent text-justify">
            <a data-pin-do="embedBoard" href="<?php echo $PinterestURL;?>  " data-pin-scale-width="115" data-pin-scale-height="120" data-pin-board-width="900"></a>
        </div>
    </div>
</div>
<?php endif;?>