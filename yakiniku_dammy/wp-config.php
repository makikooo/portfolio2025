<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '2i0fb_kww34jy7' );

/** Database username */
define( 'DB_USER', '2i0fb_7xfv45h8' );

/** Database password */
define( 'DB_PASSWORD', '6r6/jDGR!T' );

/** Database hostname */
define( 'DB_HOST', 'mysql9.onamae.ne.jp' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'wjyx&:#c)`ofu>V*R*#A$tOq3/N]X6`YQGHaivp#X+KzINi@lL)#PUls{L,Xv-4~' );
define( 'SECURE_AUTH_KEY',   ':{)$yAwe>08GZ-Clv gNa_OK]zMLbyO8)j=FozN3.-cCs0c9dX$-QS:TMWf*yA`$' );
define( 'LOGGED_IN_KEY',     '1IAACTrC|Lp1zsulas,~AUj&x|C1mH(kReM/v8:T-oN)/$(sP)3$THqxw-{}ru:z' );
define( 'NONCE_KEY',         'l~gN3zv:t9do/AWg2~MXjOFat{|`,o|gtWsq+M4ejJ!P1izknOeiI+B|S`amq4tB' );
define( 'AUTH_SALT',         '{L=S(8fb6M65o<Il1:cion./RC`/, 9=JIEU@1kyX{(]8igF|TEHR0X]_,3XmjV(' );
define( 'SECURE_AUTH_SALT',  'p8yjz^G-OD[XN`839Yg:9&jnJB}po!@({hdDK}317jpCO]acWge6[F6lch|xR4X&' );
define( 'LOGGED_IN_SALT',    'au|ylGX]Y EGC0o.fsi.3H81FiG)DV9t9Z)T1YQxtfNH1ATv0`iA0<WI+C}C%Pfs' );
define( 'NONCE_SALT',        'l)6<t17Ciz-dm>2M{psyn$v?2o/M*=,?6~ ; rhAg/OAQ$)uB-b}5|XMTj~-[dV3' );
define( 'WP_CACHE_KEY_SALT', 'o 32[X>xHhUG&O4!$*/z{@g!{PJ-frn:nx0ZEI6R}T64k~XKIwz(H@U3s%Z3MGs@' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_LOGIN', true);
    define('FORCE_SSL_ADMIN', true);
}


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'RS_DASHBOARD_PLUGIN_SID', 'tSthFXaanMIw6TPJzUNsnv7OJVanECCadPxKPGAU-gfEbp6Gw41b8UIL2GbJuCg4cQySI6WIfHgqrge8KjxF6DAviiOqtoAqbFbfEsvsCRo.' );
define( 'RS_DASHBOARD_PLUGIN_DID', 'b-6fiNC54WZtBa_XPs3ezr7Atjn9aAsrsJ7iAHTzejgidR7p9QyxCyHPOkGvYq9YUUvwF86iBC-MfPLKaGCCZcuIDp_NDQjZAAixJa8JylU.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
