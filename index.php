<?php

// Allow user to run this code if VG_ACCESS defined
// VG abbreviates as 'Volume Group' or 'Virtual Gateway'
define('VG_ACCESS', true);

// Telling browser in which coding the content should be viewed
// header('Content-Type:text/html:charset=utf-8');

// Start session on server side which will be running untill the browser is opened
session_start();

// Config file has settings for quick deployment on any server
require_once 'config.php';

// Internal settings store fundamental settings like routes to the templates, security, etc.
require_once 'core/base/settings/internal_settings.php';

use core\base\controllers\RouteController;
use core\base\exceptions\RouteException;

try{
    
    RouteController::getInstance()->route();
    
}catch(RouteException $e){
    exit($e->getMessage());
}