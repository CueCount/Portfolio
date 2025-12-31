<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{e|2WYkY<8*7iR|G[.d:r~*jH6/RhE6?oSJHCP>8)g:!vd7j},zm;Bs+kjV1Z{gG' );
define( 'SECURE_AUTH_KEY',  '|,suWQpe;pcXiZ*b#Vf*`w9WGQ/+B)|cg|`^Q@o(^PvB2LAM{JOnZii G2C,61*o' );
define( 'LOGGED_IN_KEY',    'OIJJ6g6PsFEL|in7Vc( BpDRwX!J>3/86#u<}sWh9_:xZPG;Lhq}is7r555[XTB:' );
define( 'NONCE_KEY',        '`dbSg.Am?V{I7sTI8!L BW}dY:(!OHX2|yCVrcvsjvz2hm5>ukB~tq9MI;){@..E' );
define( 'AUTH_SALT',        'EpU03iCl!/1/{8-.5bz!UlLZy-{Tk0WgJW$ab9ZAb^1QT{:r/E|j;K)#38%O,:=D' );
define( 'SECURE_AUTH_SALT', 's?omNpOzG5. $laxMNA%I)`QX,;t:+k8TKtNA%T:rNIptCsAp(~B/6*l@6|A.[Vw' );
define( 'LOGGED_IN_SALT',   'Cc*1gj})[1!BzNa^V=ZRvDJ(bRuYH!lca^~cvVNNq:!-}v#]ylq 0>%jD[~I,ct]' );
define( 'NONCE_SALT',       'bpO6gZ]`PN8#TZjM<}3,AWV3S}$J !on:zDPbUQG4ngDw`,|h&Qxiu:6g$6N@/RY' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
