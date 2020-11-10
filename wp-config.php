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
define( 'DB_NAME', 'comfortnew' );

/** MySQL database username */
define( 'DB_USER', 'comfortnew' );

/** MySQL database password */
define( 'DB_PASSWORD', 'B0CvLS1eW!ndHd2x' );

/** MySQL hostname */
define( 'DB_HOST', 'comfortcarehospiceus.ipagemysql.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISALLOW_FILE_EDIT', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^tfx|Gf((U%-JJO:*b3pm2&)NcIgD*skd7p]6pQ[|b%Kb0_|1I}2E-AKO7&-J>;K');
define('SECURE_AUTH_KEY',  'j3_Rcb$MW?=q=y*JH<v=xm5KTjWa+_pZm}u*Wc4KQ-7ozb0OxC!k8}nkOymz$ wX');
define('LOGGED_IN_KEY',    'HV-5Zw[j/};FevxVMNtFpm+2.-{%7J-W=lG!a3pB^F|`Y#ny>@E3tNF{Dc1ZB&@[');
define('NONCE_KEY',        'e6Z ~E#}W/gAMG7b{h4pPSA58|$o,44zTnji2y^_)2 %^W0-AKim[)n>rpw_+Uf}');
define('AUTH_SALT',        '9@2}#[b?*7-W$mJ|+|y=7=#]a7]CO]z90-2BZuui0ylO?v:y]f@4pHYYKN3|~ytO');
define('SECURE_AUTH_SALT', '2+An^.CH@3#IgU%e@zL..)Z^CL<:5#3b:4|@wje#:rs,3$<hljHHp_zgZP0s^ Hi');
define('LOGGED_IN_SALT',   'q+neeG%+xF%@;bpF/iyv,o[byo:V?D$|w`dT3.D2/hm5P^ +@*gEvObEdQY2v/So');
define('NONCE_SALT',       '63uJDu1UafOF{e$R>GD-WuNWX-bvbOABU{Q?iC(YmaqZg1#-:UG[FaY?}$}`Q7r/');

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

