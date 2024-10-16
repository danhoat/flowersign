<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flower' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7H0ka_QyZyaFRvDOoHwU9ZF($d5SCAi!un/5;)w*O)|m.[].zs)-M|!^J(5:d;Y~' );
define( 'SECURE_AUTH_KEY',  'S44AtYlP%cX}_w,PHxj7Kp/q_8_l*(_^)k;ODpC@1Bk[^H4sO|ZHO^2d&YcfU-R#' );
define( 'LOGGED_IN_KEY',    'p>!vl&]~NWp4Q D$[H;m:1O_IF-G*bmdVQ5WzY+>@P!h7}51Azh <kWfNu}q%=M]' );
define( 'NONCE_KEY',        '%ViglP)G8P76t{)j,>iHa/K(CFh )GX![YSK_Y#+0vouvODuZT0yNB)E0i$nJK6W' );
define( 'AUTH_SALT',        '_4RA4ta3H oJ}{Z6 q6y9QeE5BDZ0`>O<|vD>B[ii/ehRsP#K*voi@+GC@.E cK<' );
define( 'SECURE_AUTH_SALT', '%awF3tBP~31n@y=Q{C.hsug;^IfSHleGQpt$j),jt9>6}lvwSwTLtlY$Yc4Pqnyu' );
define( 'LOGGED_IN_SALT',   'yORpAmZYtv<=)(<[8`*GU2OGLJHy~mbC?BMIZN[s|*/r9JkF8MLb]gaJxC#3`cj.' );
define( 'NONCE_SALT',       'g3^,qSiY7 }B>cggXwT==[{D7|c0Pj$nB5N+K,k8p]AmYb2h-D#fra(I^wRN9A_o' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
