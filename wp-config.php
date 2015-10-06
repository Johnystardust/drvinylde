<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demosite_wp4');

/** MySQL database username */
define('DB_USER', 'demosite_wp4');

/** MySQL database password */
define('DB_PASSWORD', 'Z^RdRk[QkC71](8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'j86wkwBAfr41Oj9KHlu8byNbQiu6iLgJwaMZzWqIwr2DnP8YA3agzeM8M9tWUTfD');
define('SECURE_AUTH_KEY',  'k71uq8z2gAg9quB7FPJQlufePMTK42xdNQNfzVsmFe0NeEtBEU0m2O3XuPoxowyx');
define('LOGGED_IN_KEY',    'p7LbPDe33rieYvbf78RbCtuY03Q6yeD1pirpO6jTV1jSSYckHaIkRDJgAuizqMmk');
define('NONCE_KEY',        'MNSyUzPCe4gZVmK8qfc3VsVhwStjtjvr75F8BThkHn7ZKNMIsTDaplODl5inpWxN');
define('AUTH_SALT',        'kONqgo0sjGQ2fIavu8Oh5GAyjgMbkM1lzcx6sosE50ybgwlL2GyVFEs03CyRqu1G');
define('SECURE_AUTH_SALT', 'TvOgBAi5Pu8r7csBLciZb1Blw26rSkzLHMM4LzlujF0QPm6W1X67KKv6NfAQ0Qrh');
define('LOGGED_IN_SALT',   'hQW5ViETyaHr8wgwkOyHIcCsp7Mt3gsAPQ3aQ4Qz3mQzShRzyAoPNZrkwzhl70lj');
define('NONCE_SALT',       'gZjFRRKZtlwTrL9azSn9YLqW5nXW3LDjNWsXligAJ29NFzzaMidGDVMaJNc6z8HU');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
