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
define('DB_NAME', 'hb2_hair');

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
define('AUTH_KEY', 'Wl/3qqpb33htEShZdfsUtlnhxg1jZqhEhNNxG/PQB+F8sYjxV51XwNlTkG8nOVbO');
define('SECURE_AUTH_KEY', 'piFcxH630OMeVl4qWomn/UiAWRcZObg2Qa2nDrSgwRQ1APlmnPN7d5YHIgk6Q0Oh');
define('LOGGED_IN_KEY', '2sM+G20CUTcv/mAmW+e3EzCDxDFOOch8sWDbqRqljmGrvzbeFtl50m1xb6Jl2t+y');
define('NONCE_KEY', '6kjF2wHQeqKRV+xvbMId4+NPhAOV69Zur7z1X15dIFWmoqXVChHHJyaQ+A9ehosP');
define('AUTH_SALT', 'A1eGHG3y1+tdZ8Tr/kVLv4zlcVGSsteARmu6b33sNxW4JBlnc3qCKje28mVckd0f');
define('SECURE_AUTH_SALT', 'HLBOHPWcjnz+CYPWYALp9K9M/P/gDJBPLeFxba7+rv0MeMcQ9kHf+KS8+stBl/5K');
define('LOGGED_IN_SALT', 'V0txtyC3HU0/X7dqrKsp5WSORLHuSxVvCBSwVQJNUocIXHbreHysG3x8MLx3x9Jo');
define('NONCE_SALT', 'WODjTARL28S/HK0I4sLfXcqyV6V1uzSuH9ZcDuFzRQ1WqnnF/yNbMqUEPN12uDwK');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'wpsol365_';

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
