<?php
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
define('SITE_NAME', 'BareMVC');