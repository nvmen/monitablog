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
define('DB_NAME', 'monitablog');

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
define('AUTH_KEY',         'i]D0E^QHa|SXk9@&74}+!IGkI(v;NYMd#6<{A^!>j8]yZpgXTbbwnbOf2~.jL[<}');
define('SECURE_AUTH_KEY',  'iz5@967z$UYsm]<7sl6>]zX#Cu[ T0hktpl]4KHY w]Lc<[m>JO#Je9ojB*Z]G.t');
define('LOGGED_IN_KEY',    'bLen0HD-|km*uL=XKJ)JMa4n#F~f Z%~%F{m|J?oB]^:%)D}$:T=I:}Q/(n[_ VP');
define('NONCE_KEY',        '8c7&DM9NmR|p%k>3lV,#J]yon@8W-n|g(SX[gfvm~qs:z(yR$|@b,=THX<|!tW7W');
define('AUTH_SALT',        '?e#ZcPus+?QrwFZSo:ezvp7TV`Q?O0TWWT1,fr<P.-@DtBJj?De|c+QR|uwNrLKF');
define('SECURE_AUTH_SALT', 'V c7{;|@Z`=!UT66bu :QMWzCd5nkSah(?*06s>4dc,4L*7;>|/ DuR<n3zmd5>d');
define('LOGGED_IN_SALT',   'J+G(VQtW(p`c@JVY1(wY>D]$//u :wF@^zNain1J&WrJ/ioLh^<}knw6l{&|VA74');
define('NONCE_SALT',       'Y+P(jE}^Xp;8R=S:SbOd_v)p%A))?$ {HXyRezd_l;Mzo[ Bx!lW3I<8|cd)`+p=');

/*Monita Custom config*/
define('JWT_AUTH_SECRET_KEY', 'iloveyouok');
define('JWT_AUTH_CORS_ENABLE', true);
define('FACEBOOK_APPID',       '321635654908147');
define('GET_PRICE_SOCIAL_URL',       'https://monita.vn/social');
define('CHECK_CAN_SHARE',       'https://www.monita.vn/canshare');
define('CHECK_PAYMENT_SHARE',       'https://www.monita.vn/canshare');
define('GET_TOKEN_LOGIN',       'http://localhost/monitablog/wp-json/jwt-auth/v1/token');
define('SAVE_TOKEN_LOGIN',       'http://127.0.0.1:8000/api/save-token'); // manager.letup.com.vn
define('TOKEN_VERIFY_MANAGER',       'O2oYPjiKE9JBxbi3vUZmrc1BqMaIyGLXfgxYIUgFoYMbVEegUls4Mx2KD4MBn6GG0R06iyKToKeV7jpxd6TKFaI47fAUzt3RVy5Dy2QRSJNaQamNfhFcuZ5EBVAVawtHkmlsynTCu0nx2g6PSR3WZPGZ0CaWdBKEyTLki5WpjtoBXhVNcifOC9ZACTTVtzo0S6yotYp8'); // manager.letup.com.vn




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
