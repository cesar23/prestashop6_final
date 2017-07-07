<?php

//-----local
define('_DB_SERVER_', 'localhost');
define('_DB_NAME_', 'prestashop6_final2');
define('_DB_USER_', 'root');
define('_DB_PASSWD_', '');
define('_DB_PREFIX_', 'ps_');

/*
//-------para hostinger
define('_DB_SERVER_', 'localhost');
define('_DB_NAME_', 'u439799884_peluc');
define('_DB_USER_', 'u439799884_peluc');
define('_DB_PASSWD_', 'cesar203');
define('_DB_PREFIX_', 'ps_');

*/


//--- openshift

/*
define('_DB_SERVER_',  getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('_DB_NAME_', getenv('OPENSHIFT_GEAR_NAME'));
define('_DB_USER_', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('_DB_PASSWD_', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('_DB_PREFIX_', 'ps_');
*/

/*
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

echo DB_HOST."<br>";
echo DB_PORT."<br>";
echo DB_USER."<br>";
echo DB_PASS."<br>";
echo DB_NAME."<br>";
*/




define('_MYSQL_ENGINE_', 'InnoDB');
define('_PS_CACHING_SYSTEM_', 'CacheMemcache');
define('_PS_CACHE_ENABLED_', '0');
define('_COOKIE_KEY_', 'eyyeEnv1BOuzmCj3jx5MMDg2L1WU8oR3a7jQLwRUp0BqxMTGYqSVx3eN');
define('_COOKIE_IV_', 'vgXRIqAP');
define('_PS_CREATION_DATE_', '2017-05-28');
if (!defined('_PS_VERSION_'))
	define('_PS_VERSION_', '1.6.1.13');
define('_RIJNDAEL_KEY_', 'uuS148caPTCGOVfaNqhyvDQqmZ1rrD3o');
define('_RIJNDAEL_IV_', 'F9e837Gm4a0zTMLzJW6mHQ==');
