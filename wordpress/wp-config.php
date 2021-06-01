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
define( 'DB_NAME', 'dbcms_pagalilauan' );

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
define( 'AUTH_KEY',         '1aTmSZb[s/,r|VFVWdHn*MQ#(`y*8$B~8)9I6pQ4BJA<`RZiNR;;P.v|2)ZmU/Zu' );
define( 'SECURE_AUTH_KEY',  'cA;-BprIj?q{rvY>Q96Y|e>lHp}z1)1t6&!g>)5Y*asF#5OKWiOxbq_J!$G~=nS6' );
define( 'LOGGED_IN_KEY',    '7_T>wUHF*7y~s*/vi WTxbBwL3ww4@.zQF+yq?f<M@(V(+ccI1GjL)jkU>Y(BPR ' );
define( 'NONCE_KEY',        'n~lPS<4mF7GX@>`71#@H%4Bd!;]@];$9@19-]o;G~o4G8w@&s%I-rG3YY, wNK8N' );
define( 'AUTH_SALT',        '_Q[ENVN<EalmSmBWViKnWnQ_:6C=^yo;C&rmt)<P|}]aHk_hCsjrt)_^O)+htKdV' );
define( 'SECURE_AUTH_SALT', '4fgB kN9}$/3K_^A%5GTJ;N3`=C%S$ vHzXf0#tU$ntUMit+Vq::0i3Y0T-p~5i/' );
define( 'LOGGED_IN_SALT',   'BEW5yxndCJv9>)5A]G`b}dFR024!>Ux4E[$V^Ff]`8+jSU?XhQX8%y0Wt Fo S. ' );
define( 'NONCE_SALT',       'i$%D]bm_2I6E+?_K<__2kl8#Y]>&$(_7M)v.^QX[8L}R7Z5;>7$rM k|.@*?Zr0m' );

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
