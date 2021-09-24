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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_stsymphorien' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'azerty' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3309' );

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
define( 'AUTH_KEY',         '<~8(x&R9vn[}R|_cDU/)?#,DW*HDiy`[@xNs7$j#1Q XsdheWgpjC7ORLJ>hF$p$' );
define( 'SECURE_AUTH_KEY',  '/HcB=Y7g)yg#e[.PV;Oz>)95f(O,w|h_;g^h2&_i4>x$FvKJaIm)seMzOo}GU!9%' );
define( 'LOGGED_IN_KEY',    'hXX_@B7)iM#32Gxm}sbLnRt,3-6X)RlsH58G6Wr&mE:8V,9T$(J_3H0/{<9N#6US' );
define( 'NONCE_KEY',        '(c%JTXuk0S9DM`rE{c|/MP24@qs5I<#2{+:pZH!|jevMx78l&*1l3Rh<Y0eU+VPw' );
define( 'AUTH_SALT',        'AV<wiuc%tvw3%k(K}.d~..%Ao3rUS!|$A*gl.KK~a>;7;ZN/gRBhm_LAf?#|G+`C' );
define( 'SECURE_AUTH_SALT', '<l*,,-[l4(=J6)+:ivESDthQnk)B@^c`R}<?DC#I}G)c_oEViE}5#2Q!ybK4jTqp' );
define( 'LOGGED_IN_SALT',   ')1ej5kpGBy>BQ^H,Z34Z+?N:^vHm(*)G&ToROzu$N;>g~uxa`GB.vddu^n#gXqwW' );
define( 'NONCE_SALT',       ']]0*8dPS {>|G+ eJi5[<JWNiS)0BpRN0;l#{kg`LH*Q=w>#M.Dgl$HO#lt]Y;Tz' );

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
