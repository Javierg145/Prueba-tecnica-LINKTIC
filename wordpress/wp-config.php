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
define( 'DB_NAME', 'basewordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'LOGHy<Jep._R$VyRz.dJ<GoTg:Nb<eFEM<ri]5|81Ih^EBc]9xcRTY&+|W8WFJMF' );
define( 'SECURE_AUTH_KEY',  '6b&k>h|}Y;u ;xtru&|}{G%`*K9t<`FRXbcw+ tB3T-.C0@( s0{ipO ?P)B[J;C' );
define( 'LOGGED_IN_KEY',    ',ZrF4hw0kA[MDB_kgijJcmk6*AC^p%tVFI?C%&5q5+@:XDTh!N5<3<r3z17*e?jN' );
define( 'NONCE_KEY',        '@5mgDHmhCE},+tn?jfSsQVMpkQ>xsC=gmT:=)]C/Xa~ hI.xr==;t5mX]rbc*n3v' );
define( 'AUTH_SALT',        '%T4UPb&]%{WnZ0:Nu]d$Th}NGuF:c%_)=A%J00i[kDt|W__1kCuYdnv/<@2h|.U{' );
define( 'SECURE_AUTH_SALT', 'T$)=7oZXEt3onn2L5<,[!+SGV[/v,sheBc.EMmfv{I:k +:!0HO,6__Wk`x:.3<j' );
define( 'LOGGED_IN_SALT',   '#9,}uB3S EHt4%6 IDr(wOcr@Cy}*r#4w(_k{VqwI y~d{M4#_fn078+)s.8B1).' );
define( 'NONCE_SALT',       'r!.mA`m==+X2Qg=Y@]jV$E?1^MzF;2hoZs ZrxQ;[H0b3RoG}QOSwt}JBL:dS2IW' );

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
