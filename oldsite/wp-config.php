<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dbcomfortcareh16');

/** MySQL database username */
define('DB_USER', 'ucfhc16');

/** MySQL database password */
define('DB_PASSWORD', 'dB@ks3z!k7Q@v3dL');

/** MySQL hostname */
define('DB_HOST', 'comfortcarehospiceus.ipagemysql.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'sYI<w,p4L&f|5wV&_BiMD|5|T}b9x-rj-[HXh746W4J7H|7y~fYD(+ws_qMJe%MI');
define('SECURE_AUTH_KEY',  'dfAbs69uO);H/[rX}LN:srH$#xUVAZm0a|p21,Bi[4#BWy0Ag]sw 7fqJ?S|Ud<7');
define('LOGGED_IN_KEY',    '%-LJ];C5/u-<MOgeO}@X2] :% l][n+9$Hg.mm:<ktx.K+ %1Qf-Q]3&/0<9-xdB');
define('NONCE_KEY',        '!}Z*Eiv1,*<.j0ar==#gR!bRJUzL|4q;vTx={<n6_v+RejCH-mWZ~SnZ?mgT-A++');
define('AUTH_SALT',        '14fi:QX/o-%@Nc+Y5fvU.R~&i3~lmR`ZX{*WrD-,RF1g9>3~*k[}CL^q!$r@oC|v');
define('SECURE_AUTH_SALT', 'G,Zebtp}?}4~iyE!mri;V0^8oc,wc||s?2rCx%p0D+rz8aVPY|#[6QMC|r?FiAA{');
define('LOGGED_IN_SALT',   'AJzFFc:|z(!6]+`WC,z]0$ZOB1<&PfX&]EjFLY~%T5>_?B;xgIAO?~{PR93/Z=-}');
define('NONCE_SALT',       '4v!&|j^ 1M>@xCI&H]Vo!/`rzbeI#AJAjP,kXJ|=F:X+Ji6HMOU+lf#VXt|3--I5');
 
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'comfortcarehospice_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
