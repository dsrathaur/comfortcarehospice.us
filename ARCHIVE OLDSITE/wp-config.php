<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'comforthospice050213');

/** MySQL database username */
define('DB_USER', 'comfort');

/** MySQL database password */
define('DB_PASSWORD', 'dbVer@13');

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
define('AUTH_KEY',         '0Ky|a}8nDBMEb3DjY-:6OwTdCX=bE{:+K &-|/hzL*cSDl#!!U=9VQSZ=EZ-% :?');
define('SECURE_AUTH_KEY',  '#@g9K@$,3zW=umMGvf~p)eDIr-isqDD]D&4V4LTp@2^[KS(T=s/aeElub>?(j9/r');
define('LOGGED_IN_KEY',    'm~? f00-QcbpUJaSq1aBqlV50l|^*QB/&8Vn#|eg=M[#>x,}Y_|F80+wUwke*3[F');
define('NONCE_KEY',        '+9/PS<5O*8#qaqEXi$yS9 M`6@*FR<Ys+aN{9J`8RE$6|ozi->k`DPX7ETg+/fX,');
define('AUTH_SALT',        '?Z-h-c=bW~SM+*?j}sXbTRH*oO0(h|I3hM[z|o!KQ.o,[3j2m;q/v5[SBcx{IQiy');
define('SECURE_AUTH_SALT', '#O<+MYyRDxzs}KhXL_n^h#$L.L{,THX~ Rug8k p)-w?kV|C(uz<C7JN?!U+Vj^&');
define('LOGGED_IN_SALT',   '}/WEH+{9:^{PQ)U_!-+o(/,&~,[O+*B{C@NuT4l-lssu|-C6 !!sf`}s}vIu|BiB');
define('NONCE_SALT',       '?n#A0-I;a5r^b{1~@HI~(DL_(z~#Av6PPU&0L:4*wwI5Biy-+ql_4LWptFyN(j,I');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'comforthospice_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
