<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'bachatdost_db' );

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
define( 'AUTH_KEY',         'G~IiD3occPY;|oD0e8%J|!D[<)5tRFV=t@6GSIpMhau@V|>`;Pt(OA)udcorh~qG' );
define( 'SECURE_AUTH_KEY',  'aP%|<?d&q%5s[qQu6Td9#3p4hVE&K38Sdn:OUV,$8eK>Y{h[.7I+YWWQG5$(F[Td' );
define( 'LOGGED_IN_KEY',    '1,n%B0C3L?]SRWxe VoP2kC6Z<`RTldf&(VKFZhY.l@iiMH?*86lX^OwrhJi{/t;' );
define( 'NONCE_KEY',        '65W@fIARXN4Ic]0_G)iSxIB8sT.K[`KM;X9O}LBv>=vP5%RE+X=EAr~xO5Bw%W(c' );
define( 'AUTH_SALT',        'xV87?JiFO{EkC^|/=_U;qeSLWZe}H8]qsBw7sw%l8{8iQp9L<wO#B7mc=1T@%8et' );
define( 'SECURE_AUTH_SALT', 'ilV1{/}Dz`xzR(x`eF|JGX0!xSaxcRxBy#fmwI-3lE[!;$AN~va=Erj{R P]D?K]' );
define( 'LOGGED_IN_SALT',   '9AC*V~@.{~5HLXaUx,_7A!O#.)D9_g}8CjxsBtSD:[AN%|F!Aa2q&>{uYY1-K6eO' );
define( 'NONCE_SALT',       '*+0ZuVb-6OzXv-[q$3@!dU~St+YO`r{j6+z.-l;?#AZsxNoFega6TPsZ@k=#;f91' );

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
