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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nordica' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'UGb0&VHWFb?>jElfTAJUC.h{!clVM+6H_erjq<0l!HU,H6O6`;nfE~&WlA[$VaLT' );
define( 'SECURE_AUTH_KEY',  '<JdEJtUin:ozsSIu?DXB~?IAETkq.I0=h!Rvhe3<i!;sz-r0cQ(V/A,YqUN8_)^q' );
define( 'LOGGED_IN_KEY',    'N$s(fh06dyO6|{PSvp_bC[8h{m{>12*mFQN?Nips+aGJRfglz4)}o9oiwJmJJF{v' );
define( 'NONCE_KEY',        '`Px],KsH4ndso?eb@m_J0<77JAOpgjBgU6?EBk23bLs|B64TzK>cWS3B?Ux^NA@}' );
define( 'AUTH_SALT',        'Q yu6@[ ><mKY2HZ#1P%_y%0&U^pIVoc|H2j!.sa$XyKyw72+B?yMHw$SobNS.HV' );
define( 'SECURE_AUTH_SALT', '&oN+vye~h_BUR)A;+Kb/DeKPg=U=:+bMT)vEz%fy-  *+1vX0k#RQZoqZ2ya`-P1' );
define( 'LOGGED_IN_SALT',   '&9xq$)HaES:+6>,`rWrQBI]P s~qeSd$%bG3YauocxMy-2Hyt=)>zkpb/8[jV$%/' );
define( 'NONCE_SALT',       '$c]++}bUQl^nw%WB;`H<Xx03mMGbO^Wi8JFfHL*b9FJ3t))gB{[AxE*i$,Vh`7nE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
