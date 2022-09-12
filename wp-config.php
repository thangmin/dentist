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
define('FS_METHOD','direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dentist' );

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
define( 'AUTH_KEY',         '(rSg}C)LMq5iyrWF{DH*G,I+4Bv)?ZC^*0Jep:t PP@&m+X)e5WDm_v76TqlKIRR' );
define( 'SECURE_AUTH_KEY',  '&TFg5}GSzi6eq}E.dsz,x@|$*h&BZ8O|F$yB|^37C2_*NUX8a~XJZJa ?T,Dh_}p' );
define( 'LOGGED_IN_KEY',    'Uq};KIk;E aZ@!?udaQg 67rb9$j44XIN2ffv_V~S#6=zfw9(&SiT1jiub$q.tQd' );
define( 'NONCE_KEY',        'aXK35m9J$ZX%NE )fbX]1I*b$]ZZ4nYt[5rM;5>gIwMXQwya2G{/*hLIC+*PYAg$' );
define( 'AUTH_SALT',        'F>-iCl={Ksy_2GN#Y8T=,FIM2pM>PUG$, q#5MJedj2#=-%I<Y?#;MVSJ.sj[2E(' );
define( 'SECURE_AUTH_SALT', 'nmsVQZPWx^{U_GSA:VSUr7WRP*TamS<]T5n-v=8lQm*H-lGtKqT DyQ~zl>Q%+/_' );
define( 'LOGGED_IN_SALT',   '%i6(M{oCyC`w&3j)[2S@5nA}CNIO2d%7MKZT+/4 nFk9?Qad2XYlpM1ry?6E0JQG' );
define( 'NONCE_SALT',       'E@}Ju<|g&C.p@Nt )2*s6s#^B}{ip=D7e*c82QK<uqrWJl&N)k/2%81KZd[9N=gv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'm2t_';

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

