<?php
/**
 * DB PARAMS
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'hydra');
define('DB_NAME', 'employees');

define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
define('SITE_NAME', 'BareMVC');