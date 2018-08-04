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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_skillsfarm');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'T*(B.a4p0JLFY8lCsOFuBA7G_9v]S=_^8Jy4?}vGq@5,OeLx>qnA@lNFTXJJ)Egy');
define('SECURE_AUTH_KEY',  'N*s34Ht$NbfSJd#7K+ss9Jv#O@)OtF.N.%~F{P~Ci7SVd?kP_luz)(xkJ6zb?,.t');
define('LOGGED_IN_KEY',    '(i`T:(bX?Gz5RlvPx0dg;EU0X|ThL*-V>LpVzUvBV{~x)W^/+F?=?pxHn{]e6?6v');
define('NONCE_KEY',        'X#0&.:KQo8-m%>gJX4:I@k>TLYJOiQc|WE-kK%HU}m:9o-52jWJ4?I,ou?DqaxD1');
define('AUTH_SALT',        'Bn&%qI5Q ,b[/9Ah~#4MB1[XS^zEl}%$JI-@Z*cfid-I6Fw^,;4K}B=u/>44OMga');
define('SECURE_AUTH_SALT', 'L VQ[/l9a8AA_GSN)F4Cc:<QiexC/bMCG|=r^R*+|PKRI3QMbL8A4aSz3y$~wvAQ');
define('LOGGED_IN_SALT',   '{%=Fi8s11s&MI.-U++[(q`U>9o`wIEY:j%dC~U!aew@>W~txvEkV-oZd:1T(6d3t');
define('NONCE_SALT',       'WLLSId+qq%uO%QSmhKZ|e`^&Ki#X_DZ||/Uy4e(,vUq8B6t#EGL%5rhTKl1!AM-l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
