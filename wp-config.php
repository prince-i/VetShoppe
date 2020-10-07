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
define( 'DB_NAME', 'shopdb' );

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
define( 'AUTH_KEY',         'WWP*>|Yc)a|C%4_&ol~1Ixj-$.={t71h~OpD,vw`@w.Zp)R7tW<g>~kX%{vrpRn5' );
define( 'SECURE_AUTH_KEY',  'rxa!d&..jH5.+eS,>w=s$3d^[,qvQii$`SI%f5bY-E~N_Fc?JjLIcYZaDcJ:vAGJ' );
define( 'LOGGED_IN_KEY',    'vDzGZ.ZZ1s)?*>`kI;?x6W6K$+l6C&72<;v ~hJBKdDB[dGVAWK6M4:yy8Jxo?,y' );
define( 'NONCE_KEY',        'N-&=1@-6{R~#rN11|~@49j7_K(yHR^OV$?Y|746VoHdeoWj:$|;j!b*pg:$M|*L7' );
define( 'AUTH_SALT',        'GC-E>X:S,BefM^/O[n9Z:8eAV9(dL+*>suj9/.O{+ggyMgZECVs]|)tmD.R#3_Q^' );
define( 'SECURE_AUTH_SALT', 'wY^TRCtLhDMZ3addSj]k?RuWW+s!f_?rxSA0j%G]*hJPFa]a@0,K]l:a<=0zjVRk' );
define( 'LOGGED_IN_SALT',   '6,xYsY9L1.orinTEUoVUVI&l*JU-2[o2V`z,^SL!?{GlFN68W;dkQdx>Z}Ihv#V.' );
define( 'NONCE_SALT',       '52[ri(+b]qQY>S}$i5@}2eS_)<XoE21|GP?{/.D(:*^2^[bLE!r#a7T[^+4DmG1h' );

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
