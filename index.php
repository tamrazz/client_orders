<?php

use Src\Router;

if (!file_exists('vendor/autoload.php')) {
    die('Autolader not ran.');
}

require_once('vendor/autoload.php');

Router::getInstance()->resolve();
