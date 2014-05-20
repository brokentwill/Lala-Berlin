<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_lala');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_w:BM%S-Q+O:Z{n?2(?~r=_Cg-}B{|W-0?|^YF[eq[PuS)a!. =EHfL;<uF,~7H5');
define('SECURE_AUTH_KEY',  '})l|U,9^TpI>ghC)iy+as?WZ-fEqX[ADM%Jc>8v= | a@<=9m:yqo{1vVhCO!cSq');
define('LOGGED_IN_KEY',    '*H8q$u`ph*VaqkP|x65.A-Yxjp``S9$ Hlf#[P,eB y{>Pq5/+4C=k@ue:$T+[dM');
define('NONCE_KEY',        'gB}Fo{<]-(+8x7@Nh&]6lK(][!4*RlLO_-}h)?xc&Byc&a3*7`JY0hh+gnZsgfpk');
define('AUTH_SALT',        'Q<a9Uu7<J*rUBq`>X (,8c=&gUfa.@7u>@HK2{Bp~A:!Ua>AHC8Ve?Q!l9QtqYT?');
define('SECURE_AUTH_SALT', '=C;2+`?_XWpaNoPvVe} #i|G;z,4D=@VSz40J mu*y{F5.a23Y/[di**N}T}>{.v');
define('LOGGED_IN_SALT',   '`D/{ykZwLL]_c+IU,5}y*[@A&YYt-NZXhZC?mXT4&vSuQ+~eIguq~c^8.?`( gM+');
define('NONCE_SALT',       ']]$]+s$/qFh`JRH+|73#cRFt0xfVT_gtVmSDao5+BB}-2@Lh,P;`)>0C4b/YUeng');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
