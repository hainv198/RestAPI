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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rest_api' );

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
define( 'AUTH_KEY',         '9rXD#)t6Y~YN@l)/Rrl7.80)t7G161S?Ny!l*~#F=RxNV1sGSm8^.> mo[~<-7/!' );
define( 'SECURE_AUTH_KEY',  'nrCZGrJu<K{$$GI(pwDW h[U GwW.]<D^Yhyn4/_zH?W/_n3M[SThs/ $W_==8C8' );
define( 'LOGGED_IN_KEY',    '4m+|MR {1I{dg.TiG()`@1xvzdUV/7{reK,a7Wmt9#04$BS@iv>+IfA6!G?7smj$' );
define( 'NONCE_KEY',        'H#ba05`_wTOC wQB>.JSB%_Eq0{UR!)46>Gs,J!;Z.gMhn(.k3sH&2S;~gEI]HFU' );
define( 'AUTH_SALT',        '_SU:0S+hQ~cAm~I_)AnjcJwsp$)|HJLt2:xWKgG8dr{$TF|`a801g:!;cm$~LsOk' );
define( 'SECURE_AUTH_SALT', '6c|}?(H|lE_1ony 2tlxAN2-o6yr_N/3Tzy{5AzJ$Y plHi~xwp)!z|I=Wj5k79a' );
define( 'LOGGED_IN_SALT',   '&vG.^L>^cAH2^kf3}D9d>2`psBIHz]A`|I3yEFeoOU<[xi?[SBP}m9#r78 |V&CR' );
define( 'NONCE_SALT',       'Y!@49r{uxfjM9)meKnibdHs,IZF>zqEx)<rJp[NgSsE8J>7^})k=s<7=P(sXoVrH' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
