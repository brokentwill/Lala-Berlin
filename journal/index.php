<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

require_once (dirname(dirname(__FILE__))."/app/Mage.php");
umask(0);
Mage::app(Mage::app()->getStore()->getCode());
Mage::getSingleton('core/translate')->init(Mage::app()->getLocale()->getLocaleCode(), true);

/* ----- Load Lib Facebock ----- */
require_once('libs/facebock/src/facebook.php');


/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
