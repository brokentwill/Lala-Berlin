<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
if(class_exists('Mage')){
    // Instantiate session and generate needed cookie
    Mage::getSingleton('core/session', array('name' => 'frontend'));
    $Block = Mage::getSingleton('core/layout');

    // Start pulling the blocks
    $head = $Block->createBlock('page/html_head')->setData('template', 'lalaberlin/page/html/header.phtml');
    // Add default css
    // Magento adds the default skin directory
    // 'skin/frontend/default/default' before 'css/styles.css'
    // making it look like the URL below:
    // http://localhost/magento/skin/frontend/default/default/css/styles.css
    $head->addCss('css/widgets.css');
    $head->addCss('aw_blog/css/style.css');

    $head->addCss('outofstocknotification/outofstocknotification.css');
    $head->addCss('css/easybanner.css');
    $head->addCss('my_igallery/css/prettyPhoto.css');
    $head->addCss('my_igallery/css/styles.css');
    $head->addCss('css/normalize.css');
    $head->addCss('css/foundation.css');
    $head->addCss('css/clickdummy.css');
    $head->addCss('css/screen.css');
    $head->addCss('css/custom.css');
    $head->addCss('css/polyfill.object-fit.css');
    $head->addCss('css/journal.css');
    $head->addCss('css/journal.css');

    // $head->addCss('css/styles.css');
    // Add Prototype JS file
    // Note that it automatically adds the 'js' directory at the beginning
    // making it look like the URL below:
    // http://localhost/magento/js/prototype/prototype.js

    $head->addJs('my_igallery/jquery.js');
    $head->addJs('my_igallery/jquery.noconflict.js');
    $head->addJs('prototype/prototype.js');
    $head->addJs('lib/ccard.js');
    $head->addJs('prototype/validation.js');
    $head->addJs('scriptaculous/builder.js');
    $head->addJs('scriptaculous/effects.js');
    $head->addJs('scriptaculous/dragdrop.js');
    $head->addJs('scriptaculous/controls.js');
    $head->addJs('scriptaculous/slider.js');
    $head->addJs('varien/js.js');
    $head->addJs('varien/form.js');
    $head->addJs('varien/menu.js');
    $head->addJs('mage/translate.js');
    $head->addJs('mage/cookies.js');
    $head->addJs('outofstocknotification/outofstocknotification.js');
    $head->addJs('my_igallery/jquery.prettyPhoto.js');
    $head->addJs('jquery.masonry.js');
    $head->addJs('jquery.fitvids.js');
    $head->addJs('polyfill.object-fit.min.js');

    $head->addItem('skin_js','js/CSSPlugin.min.js');
    $head->addItem('skin_js','js/EasePack.min.js');
    $head->addItem('skin_js','js/TweenLite.min.js');
    $head->addItem('skin_js','js/modernizr.min.js');
    $head->addItem('skin_js','js/clickdummy.min.js');
    $head->addItem('skin_js','js/jquery-scrolltofixed-min.js');
    $head->addItem('skin_js','js/ob_custom.js');

   /* $head->addItem('skin_js','js/foundation.min.js');
    $head->addItem('skin_js','js/foundation.tab.js');*/

    // $head->addCss('css/styles.css');
    // Add Prototype JS file
    // Note that it automatically adds the 'js' directory at the beginning
    // making it look like the URL below:
    // http://localhost/magento/js/prototype/prototype.js
    $head->addJs('prototype/prototype.js');
    $head->addJs('js/site.js');

    // Get the header's HTML
    $header = $Block->createBlock('page/html_header');
    $header->setTemplate('page/html/header.phtml');

    // Add children
    $topCart = $Block->createBlock('checkout/cart_sidebar')->setTemplate('checkout/cart/top_cart.phtml');
    $header->setChild('topCart', $topCart);

}
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" href="<?php echo Mage::helper('core/url')->getHomeUrl();?>/media/favicon/default/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo Mage::helper('core/url')->getHomeUrl();?>/media/favicon/default/favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php echo (class_exists('Mage')) ? $head->getCssJsHtml() : '' ;?>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/journal.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/flexslider.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/custom.css" media="all" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/site.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/share.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/share.js"></script>
    <script type="text/javascript" src="<?php echo plugins_url('wp-slimstat/wp-slimstat.js') ?>"></script>

    <script type="text/javascript">
    //<![CDATA[
        var _gaq = _gaq || [];

    _gaq.push(['_setAccount', 'UA-27455711-1']);

    _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    //]]>
    </script>
</head>

<body >
    <div class="wrapper">
        <div class="page custom-wp">
        <?php echo (class_exists('Mage')) ? $header->toHTML() : '' ; ?>
            <div class="subnavigation-wp-lalaberlin">
                <ul class="post-categories row">
                <?php // ...for 'wp_list_categories'
                    if(is_single()) {
                        $category = get_the_category();
                        $class .= $category[0]->cat_ID;
                    }
                ?>
                <?php wp_list_categories('title_li=&current_category='.$class); ?>
                </ul>
            </div>