<?php

define( 'WP_CACHE', false ); 

## MySQL settings - You can get this info from your web host
define('DB_NAME', 'cpfgkrxntc');
define('DB_USER', 'cpfgkrxntc');
define('DB_PASSWORD', 'yVzkCRR3cK');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
## Authentication Unique Keys and Salts
define('AUTH_KEY',         'Fzj!Ck1ih&Ck,^S;!08sS9b&Q-zozopZ m2{|B/kBlx,RV&-[czE2H/74gk<@/d[');
define('SECURE_AUTH_KEY',  'c7ZD-T@i5`/-eH{?2kgDNd)3O:u9 ]; )*#JPm1?y~=DP~g&WsHJz*O7]40Ezy4I');
define('LOGGED_IN_KEY',    '!,~n}IUdTI-#Uh|gChdGUGb,HY7TH*=wn&ArKrj-QY)C(7UA B8b@2xH+R^A6::+');
define('NONCE_KEY',        'sFj:}XS+4qcZv&#]h`V+ ,l?o|Fd(-yz$HK.M#<{LTz+3v{Z5p.gGdR_*GX3rb4?');
define('AUTH_SALT',        '6kE)M-6A$}0)w(U&Z5E~*GffmzQxO+7=EDW%-brM<xj,eAVB|2!|{d@#=Gk!_{zd');
define('SECURE_AUTH_SALT', '0#W3*;voG<q<^C|tq|K@S4 vj&WRoLu$p!D~Hc$|@{|!w9gB#n;0kod$=iy-cV5|');
define('LOGGED_IN_SALT',   'uR0|-&?7/afU=H* PkG-efY>:X^5/i+b@Qo-zFctXU]t&+-*!XR8 Kz2b?g N{p`');
define('NONCE_SALT',       '3Rr5hi!m422d+S{8RU!&j,cl|:d-aqajLPOuZ`|gigjFS@V]p?PyzniNbgDWszeq');
$table_prefix  = 'masterWPhulla_';
## Debug
define('WP_DEBUG', false);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
## CRON JOB
// define('DISABLE_WP_CRON', true);
## WP Settings
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_POST_REVISIONS', 5 );
define( 'WP_AUTO_UPDATE_CORE', false );
define('FS_METHOD', 'direct');
## SSL
define('FORCE_SSL_ADMIN', true);
## Cloudways Fix for Remote IP Address
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $xffaddrs = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']); 
    $_SERVER['REMOTE_ADDR'] = $xffaddrs[0]; 
}
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');