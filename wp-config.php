<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'minhaloja');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'B0&lk1;@n}bHHf2axVY1);m;;3vdiU_.`Q14%Cce-&.?Yh1,k--r!YaC&%+4~TsX');
define('SECURE_AUTH_KEY',  '`L<[)LnNJ1OE jA)$L0px,HHi3+,TFUzG(c>P)#vO0Kg/L6LR1ozL2-i|=i)/ Zj');
define('LOGGED_IN_KEY',    ' t2[$u1abmwB&:J}QZCR@8+sx]KCxU}uYpXyKinJRC_9*nU|F!S-$<,@UDV*|FI)');
define('NONCE_KEY',        'Zab(V$(@LwG?Ltu-Cvh@,$=ct#JP5&#In{PF|i8#z+[3T|h&WNzbeZ0,!<N_ot}*');
define('AUTH_SALT',        'yY!]l11q}{#h&-^rsuG[)-wihw1m7:_4bVGLVv+diSl`60:Y>`jLtV5?>lS=m?oe');
define('SECURE_AUTH_SALT', '}gJdS7H,z9#7REg5D|s9QtAu-:>nBh-hUHT8H:bHeV_X-9_-oG7RWQr$tsW+/`Dw');
define('LOGGED_IN_SALT',   '*U(Kp}HyF<!jD/S2dT5|+hJ#{>nI}m-s4v:GN+|:Q!|?d-@.cjz%Pq<?Jbaq~I_*');
define('NONCE_SALT',       '&;TE|:^WHPirb8w1Hb*d<{Zy}[l&Cu[Z$`(XY5;C~}-($M)yr3H9jx+KvctvG<:6');


$table_prefix = 'wp_';





define('JETPACK_DEV_DEBUG', true); /* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
