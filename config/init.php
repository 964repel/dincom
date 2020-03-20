<?php
define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/dinkom.local/core');
define("LIBS", ROOT . '/vendor/dinkom.local/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'studycenter');

//http://dinkom.local/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://dinkom.local/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
//http:/dinkom.local
$app_path = str_replace("/public/", '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . "/admin");

require_once ROOT . "/vendor/autoload.php";