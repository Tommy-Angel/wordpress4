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
define( 'DB_NAME', 'wordpress4' );

/** Database username */
define( 'DB_USER', 'wordpress4' );

/** Database password */
define( 'DB_PASSWORD', 'Yanisslek10' );

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
define( 'AUTH_KEY',         'k)z8>}LT|LC<1ewU ,}yI@s3oUZ7(y:0_ G15+`&}#[ZqQ)Eh0`eznu(T5o|L=&|' );
define( 'SECURE_AUTH_KEY',  'VEpqQaQO#di( po+oR<.]}}hC/nEqr&|]o;Yo/neF3_Yc9C^>JnG,(yhk<(~GdZ1' );
define( 'LOGGED_IN_KEY',    'p]M9<xg&XHoav[8k:J:VpRHVYg}REup)0wMbbQ);oR v:_D(;D!E8i>mjK_B4.b{' );
define( 'NONCE_KEY',        'y&jr*$<8ujs3:41.eQWeNjN^#E^sSWY E+3 m+n0NU;-3S)dp&Q;85(EKg}xTGIo' );
define( 'AUTH_SALT',        'VgrPD;f{Ojd*n$oZ<z94E;wmnEUyIapW{zt,FtRr/]<LN9<iJN~+sN}AE.wq2Spt' );
define( 'SECURE_AUTH_SALT', 'Ui )_N3-YNuLF;<m)3-YLKZM9gQ^y11`=o`D([76P)>l?8Ujx^/|F RjMO$!t.;^' );
define( 'LOGGED_IN_SALT',   'Ah!j=5ZnOv rCtE;f~!@i+B1D/if-oCM=UNM]ve+eDrr2Z%d?v q)e}M@p%G2hbC' );
define( 'NONCE_SALT',       '~QO1wQ/|Z>.^HEWz=dGxRqc,CxK;o|4zCbcB_%&?n5Asr_)itggr<|QKwV!DK_&=' );

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
