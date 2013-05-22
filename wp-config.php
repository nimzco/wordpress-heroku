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

// ** Heroku Postgres settings - from Heroku Environment ** //
//$db = parse_url('postgres://fjmcknhiqejynw:5SRGmTDyEYpKmRg-TYmwW4VDbM@ec2-54-225-112-205.compute-1.amazonaws.com:5432/d7heui2l2fqq2f');
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

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
define('AUTH_KEY',         '>xiS,jq(&^aX}%Hv6J0_E/B+ZxD=SfUmIuK>|f(6N%(|1n-WQRhb|KBz?hX/y=z&');
define('SECURE_AUTH_KEY',  'VWVoT:G,m76OuOHQ3;Q%9~VdiC3<`<x-uee!ll]x1/%IYpG8a?NLrDFKf*|@zqei');
define('LOGGED_IN_KEY',    '!moqPh5ik$Wo/nwJxAp;ow&)-//jWnbZ>4[oo0;a_+)`{I8GRXr/OBz^d53gpVV-');
define('NONCE_KEY',        'm<,6Hyg6px}ThLtnzs8Hhke:%)mts^-[p+Q||Sx]fU}U&f:H!@ / l{$;:U1N^i[');
define('AUTH_SALT',        'oK3u#hko4#6:+%&Tn{3b_&-pzN{#_qeI)^x^-}FmJh~fC]/Ss_Q$7#0gS[j=OvCU');
define('SECURE_AUTH_SALT', 'pT3ubkojDIw5|{0|!+aw5rS?j%F%g7BB/8lnFH&D/*,QD #_MIyqx+T[kLy-.O+c');
define('LOGGED_IN_SALT',   '<aE@Tq14l,p994DMd0>~_N/Z=opG!G>(yea%>nB;#wl9WMxnt7Ze1q|r_gCoY_em');
define('NONCE_SALT',       'T[eNl@s`MXxi5Vp>jI?#KLxCtIKD~JRs}P}/.wse-k*I31N)IeqD*tzt9:`}qBwz');


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
define('WPLANG', 'fr_FR');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
