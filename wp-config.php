<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ffl_database');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'l$0Fsa`;H 2DR6KhVXnQTf(hvLp|Moa&XLi9X[!yxk;!?{w2;!=cMfb^]S&;/j67');
define('SECURE_AUTH_KEY',  'lC0MrZS/<y:|Z7{7{0Ces=#|;<,UwCl(}`|6<gd9$E4<;xev@h?:DDkn~HbX?GEn');
define('LOGGED_IN_KEY',    'ipFV +/ONt5!!Z=0zx(l-v83jm1*eh(Ndb[`|@~xzm9F=?MVf(8nIjQR6W9u{C%p');
define('NONCE_KEY',        ')~$Lqko2ZryP$3Y(~}]gem3FQE}CHH;hD|V9`v4LT_h*Ejz=.@t~+8ys?fLXA%wT');
define('AUTH_SALT',        '&W)]_dfT27CFU)nw<9PXEV;k)zgK$1_<PIx$4ZORSYT(|wMmB+ZHC-&M1b83ceX{');
define('SECURE_AUTH_SALT', 'E^SjN;eG%k(H/JCXp?dzkB W*5=y7o1X5vbK&|Roq5hq/(PVpvfMs`379,aGdW[<');
define('LOGGED_IN_SALT',   'EI--KMyMLG=Xx;THZ)c)cT+fao^5D>Kqn1,H]dpO/)8BsfCCuC-JN?*K8_,-XVLJ');
define('NONCE_SALT',       '[Ht.*pc?w<Y2Z-0*r1]}9!]Bh=^7^!9M mzp84hsoyKt-OAm_@@D+|v(&9Zzz>Kx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
