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
define('DB_NAME', 'ds2017');

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
define('AUTH_KEY',         '<X{VooCc|^UHB )&GV4>VS<0EO~];8I>QG0ngNP2`{2RZ8SZ>qKY&sYCTFnK9D(y');
define('SECURE_AUTH_KEY',  'Jx8CVY,E>pgy)!f_^(~XV({,#yhxY%4^dxCFkTx ^DJMCV<;#J@-pkUQ+teK&$x9');
define('LOGGED_IN_KEY',    'qfLdPuP6O9R0)KPY~wzuy18ayo$0hg19q$v9e}gBk9ad{Cj5Q(%yHPJ4F[InC#|;');
define('NONCE_KEY',        'XlM,kN&<av;So4t (BddD-@F4W?6rS&D!a>K2|M+w<J^2VY}Gvl}-DVYyyn^CVZ0');
define('AUTH_SALT',        'wT;xVdrawVqkH0l[bRwV[81j2p9sCOiU?uk EO ~xQB_g4lI^>.y}?|Xa?%tB~+e');
define('SECURE_AUTH_SALT', 'B52Ho)%/11)ca_8:tc1$XD$ueL$*6FYMik>LJQywpSgn5B%_;G{Yiu#4t sNK|&=');
define('LOGGED_IN_SALT',   'Ipe$h$OQN}a4*P4;/&O-`~iz3St=v}rD%T,YDL5&5>.QQ8ZX0.VT6c<_PqK!_yO:');
define('NONCE_SALT',       'iB7_h]yGiitRH9l_#1J)P-j*o0/BQWTcS:/{@l-27tAIegTUZ]sXKMw(5B?RE$t;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dS_';

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
