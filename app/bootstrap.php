<?php
/**
 * This file will require all that we need and want to include
 * in our application.
 */

/**
 * Load config File
 */
require_once 'config/config.php';

/**
 * AutoLoad Core - Libraries
 */
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});