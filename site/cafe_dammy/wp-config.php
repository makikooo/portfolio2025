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
define( 'DB_NAME', '2i0fb_7358j4d4' );

/** Database username */
define( 'DB_USER', '2i0fb_485td8s3' );

/** Database password */
define( 'DB_PASSWORD', 'Jeu[A5337j!' );

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
define( 'AUTH_KEY',          '*cJ,eFA[~a5bkrQp^/6VPRh%j.`V@Z!8yFInSk)H3D$l@sPp(Cn6z#xnj^V?3`p1' );
define( 'SECURE_AUTH_KEY',   'TTwA9.U2SA~qJJ0nXf[&eOV)(KXw`oqa76ZN`3Dn]_h;=4s|43(GLuSpY]kVHZgc' );
define( 'LOGGED_IN_KEY',     '=nInjNQL;(3ikLwu]3ZR1worHYHo`]E?PAMk1fZRE5M;9]`.juS&*w;|$Jp`]T?Y' );
define( 'NONCE_KEY',         'yX8T5Am):KFlmzRCfgU~qkJ8%`&t$Q7G_pEld2clQ^4g1R32|5|@z8XdCralglVG' );
define( 'AUTH_SALT',         'W$:4~c#:>p&UvV2-` %{x{}<I4MRUF-uQ=n]vrVq_6P..bomHT3lW?Yj :)XcJrL' );
define( 'SECURE_AUTH_SALT',  ']Z`f*w(Kr>DOuu%Tpkok>LCPhK/YaRV9dUw>L/.&b0dIutmim*`<%^j5# <XZO5M' );
define( 'LOGGED_IN_SALT',    'jvG,_f2]/@LL0Q <%p/;8v_>x4mmsrNkKMT^!o_)sc?h8@)/ S.p]&mP-P4,S0fN' );
define( 'NONCE_SALT',        'pW1$rLN;Wp-p;_YL<tP29nS,j1IiDam(n{2{Whg6C<l}ReCrti:j=;LG#j(N[dn ' );
define( 'WP_CACHE_KEY_SALT', 'nT %+9H8^IF~-))$%oy/81rt^>Vi~$%y5Gb;WzwH_Y|J sTu UkwIHII%mAE)868' );


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

define( 'RS_DASHBOARD_PLUGIN_SID', 'd_j8MFqF3VdbonNvUr4IgiEt3n05w9xvd5XpJpGArc6V8gr7vwTh3HBlJqe_CROYCEN8Twmt8e8SW6W0S9AKbIhsBuWU4ADjmvS-ztg30aE.' );
define( 'RS_DASHBOARD_PLUGIN_DID', 'GLzNmo8FbyR18R4ok85IykJasTQP0Dz4M882C2IBDbTVzLcrT58d-Wf5aW3mH15mgFaO8-x5ImHlhIdYm12EkG_nR95g2fLUdgKRx3mB9zY.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
