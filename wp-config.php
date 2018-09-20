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
define('DB_NAME', 'pow');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'VUw_[.?z1NVG&yfZC-E%E|r)n3kb@Nk >[HSRoEvs|f7mg)4KLVW4i_<a:e(4AcA');
define('SECURE_AUTH_KEY',  'oXDFZRgRO=sp#=S_TwAj:_~;3MvZz*hO)zwYqh9g$?:U![.(9W1lw_es/gpPS=z[');
define('LOGGED_IN_KEY',    'S!~poE:D$<7,pJ09PjjXv9[ >Yw1xh^jt2-Z&bnEiow3~RQ}jK2a!|[! al]_H!8');
define('NONCE_KEY',        '{Fjp&6=[@>YD6uzv_5g~WY/IuKgVP]p?^z&HY?/(*YP1$;uGC~+Qk=a*,&zXeS<q');
define('AUTH_SALT',        '|AiEQzBvE*ugsa&)XUy8$`[I8sexsWX,R`~6%[EdM*r+a).1P9xF;^!`W ,K;|Nt');
define('SECURE_AUTH_SALT', '2R@79U&c3z2kPoc8zY44D$RCqwiS6<*616[ {UD9(V 9_^:rO9b9;&hPD`2|nd+2');
define('LOGGED_IN_SALT',   '`a5pxKhSb|?7lpk]aR|ZU9f89Scmf6`Q()gS>Zk #9-&Dtx25HBrG?J`zpSwYbLb');
define('NONCE_SALT',       'PW5W0+ypwwsa/>`KzSzcl(K9O;wk3_]!*cnOvAmMN2~&aHP2Y8.f^T24PJxH<QHU');

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
