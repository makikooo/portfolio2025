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
define( 'DB_NAME', '2i0fb_6f4hr7w4' );

/** Database username */
define( 'DB_USER', '2i0fb_35m4s847' );

/** Database password */
define( 'DB_PASSWORD', '5y+A3~StHU' );

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
define( 'AUTH_KEY',          '[N|m7OmV8ZdtYIh%4{S]w=gK@1I:]w*Ku_W^9VWXeBtM<e[-Dh|T<u~f<Vp;vMW~' );
define( 'SECURE_AUTH_KEY',   ' Fj`9y1+8Mqn-IzqZOv<$%!2GU#}U$` :@S7Fx]g_;n?)[|>bn`OKx0d@q}RJ*)e' );
define( 'LOGGED_IN_KEY',     '%<dHQKO6NK,DHi3oHV^D#Terp)p:0<)x`5J1CoZUcuJ& %&rio2vJnbgb-;kbuj;' );
define( 'NONCE_KEY',         '<QK+>AY5~><[Q$1q5cmAJWo+Wxag3M*iJ @dp[::gO!`)AIud)Kewb`kMQpdZ;%`' );
define( 'AUTH_SALT',         'pO%J&>?<X cdyaJ^(O-$):K+?a`}jN3BQq]gxZ@i%o3dMiK c}5VH!7_A-yA<B76' );
define( 'SECURE_AUTH_SALT',  'J4.idtzG&5^R?.jH*xh`9L{FMxZP6k#>`/]ry@w|1NX~hJw}P}j9>ERmI!X tV10' );
define( 'LOGGED_IN_SALT',    '+PjYIup$m|;ooO]mus$-wWX~K<6qJu]G^vz9P}GYm~bsOJubM9|@d#~EoupzG;R`' );
define( 'NONCE_SALT',        '0a#$!TY3{k9R(9V mM+FBYMkQ$|FZi_u_(y.3oz-+r2Bu^0lLp7W*2Tpx1(6oJ!<' );
define( 'WP_CACHE_KEY_SALT', 'q^uJaXPP8@MlwRI,xIos=G(:b`zvw>K;s]8|FB>J4,dOgaS3[~dIh}3#Zwz92 e~' );


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

define( 'RS_DASHBOARD_PLUGIN_SID', 'UR55k1SZ4I3UaYfYor-7fOMUgI9OqciY_cYz-qmqfN7b2SMB1erENtaQKy1UJjtoHz8L_vYczQy86GjJ-z3_twdm-ZO513AYZHceiwRnJbM.' );
define( 'RS_DASHBOARD_PLUGIN_DID', 'sQKCeF3IZEGV79e1dhCBfwDzhhb9mVblG9j0Z8ztzX9y5MejWX686Arqlt5P39FWpZvW3D9t369GWJ_pOyfNAG_uMr37NO3qvI0r6bx2yLU.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
