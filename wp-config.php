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
define('DB_NAME', 'hoanlongcomputer');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'beT lqf3mTzW$/)B,)|8Z-ybaU>a9Uq=Bp+*B8{JUJBS{!:j~0}4U6sbOEyjmr9S');
define('SECURE_AUTH_KEY',  '/V5;x%Ue^DRCV{iZU{ ?a[2{6+RA3_Dq40[Ji9LW |l+@r(`HYEHCPS::t+fDTyj');
define('LOGGED_IN_KEY',    'A~YeiY^4C:C,*0Hh2>GJ|hIwis3nB ZT]_^! 4h`_FmiIdcDfVd]XY/VKw9mcAMU');
define('NONCE_KEY',        'zUwl&(:y.pnm@WR8pyWM[UqYl27?hHyBWW+65S;8-3!3R`_5{[@K|KXQ;u#[he#n');
define('AUTH_SALT',        'r=]wFaTwzmq<->HA,HBg)Z,B#|:%Q$^?$u[hIT>hQ)^<[Pt>|b3@H!)l-=9&++Jh');
define('SECURE_AUTH_SALT', 'vdoWn;o=X,zg/BgM<4ckHj-c//~S=-nHM-o5EM|9p_+xDU?1|-w`V{z^RH?|6g>!');
define('LOGGED_IN_SALT',   'Bm$T>*J17o?BuO4AsD5Y*{J~?Pntu(9=Wp+SDT^`whb/1-IW|n?U[%I!tIg2`  $');
define('NONCE_SALT',       '3ixT:wD5_.58P-=hP#7yjG`[/vur;YX_s n#@NAI!ESmT.:;{Ax^t E!nm!zo<kj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hl_';

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
