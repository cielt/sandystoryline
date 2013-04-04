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

define('DB_NAME', 'storyline');



/** MySQL database username */

define('DB_USER', 'storyline');



/** MySQL database password */

define('DB_PASSWORD', 'Sandy2013!');



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

define('AUTH_KEY',         'ePWISNhFHY00VGRleEJOm0RjEJ727Xq97oXf4JpjcenIHNW8Zhrcr0D1ucxVlSzv');

define('SECURE_AUTH_KEY',  'pAU0OLrcud4C7MB1deqVWbH0kG39waWcIgEG8S6ixdV7tfEqzwr0mH0vwCAGJYcV');

define('LOGGED_IN_KEY',    'CNK4kgzN6i95yYmGUIsuHKo0fkQZYqmx9bwbRJMovZNCHZ8QBmdzOvhG8IRGVFR3');

define('NONCE_KEY',        'zGbFhTpMjQNObYuGTX8KMUfz2lfp1p8Tzz9ZpR3sACo79xyyioBkFRl46p0huqAD');

define('AUTH_SALT',        'bOwR1V5DopQlr5iCjPaPNzXBFiHzUXpu2yL0ZU1NlYKe1rAbaMdhZcLVxoWN4jlk');

define('SECURE_AUTH_SALT', 'QB7QXKVcRg2F8O1CiUGkeGj3Gr56OEu45uPfP5Uj5Z7RLikR2Lr3W6NcysdS8vRR');

define('LOGGED_IN_SALT',   'Q8jcdoKph9kavHsY7OOxdKIb9XRhhU2XV9TJxBjx3x05W43jiuR38GqqeZFQmTe9');

define('NONCE_SALT',       '1eO3FVpP3LMgJmFMziEzyinWF8RR0THZwPD7Td2linffI9wdQi2wWG78wGfNKjT7');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';



/**

 * WordPress Localized Language, defaults to English.

 *

 * Change this to localize WordPress. A corresponding MO file for the chosen

 * language must be installed to wp-content/languages. For example, install

 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German

 * language support.

 */

define('WPLANG', '');



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
