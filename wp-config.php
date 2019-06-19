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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'F[n*!J9.i~+8KAazbXSWZGyvtS6V!26 >UNCM:t(>fz:DK05`lW?/hlTq5*@NOm+' );
define( 'SECURE_AUTH_KEY',  '_8pP.JNrbUNS)x[`hf;3N5z;7PrXygT%lo0<FJ@K>]:2B-,x.p4-F(G`!`G)e;w#' );
define( 'LOGGED_IN_KEY',    '3bgfgdhIDajyN6orY#<4O:XdQE5)XdKh#IoL}_}mr5Gf;Xm}w7XchMn490%|MF~T' );
define( 'NONCE_KEY',        'Rrb%1RiX2=6PPt*iEIb?.}28&$9BD2@yBXKk6t>Th!LmIi#y$>Q+C0~#HL}ugFhq' );
define( 'AUTH_SALT',        '`H&[M1^x>Fjn jb#JGtip$| t(V7K!S,&9&3.a Q`Yc-tzjnmUWzUV,t.=n7mN;f' );
define( 'SECURE_AUTH_SALT', ';KjG0lQ+_]Gm8G6K#YkU2<8g>iw6Y2M[1b7lNzBN^9n|=L0bp0u%,M=nT;WT o#8' );
define( 'LOGGED_IN_SALT',   'VdkIHbG@I7WY`8r;hB)yS+M&vUfMyZ_jl)?i}K@)>O^.:*d#dTf]#3sf;c>/mz&2' );
define( 'NONCE_SALT',       ']WL9Z`e4UMv^CF:!Hd2PH?Y$CSU0:g9N;l5%LM`->(RG}WU3[1lIV+<c[F4GJF!:' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
