<?php

// Deny user to access this file directly
defined('VG_ACCESS') or die('Access denied');

// TEMPLATE CONSTANTS:

// Current website template
// For any future website redesigns, create a folder with new template in same directory as 'default' and update the TEMPLATE const to refere to a new design
// Example: 'templates/newdesign/'
const TEMPLATE = 'templates/default/';

// Location of the admin panel template
const ADMIN_TEMPLATE = 'core/admin/views';

// SAFETY/SECURITY CONSTANTS:

// By changing this cookie version we can provoke all users to be logged out from the website
// This feature is useful when we have a major update to our website
// What do the numbers in a version typically represent:
// X.0.0 - Major revision (new UI, lots of new features, conceptual change, etc.)
// 0.X.0 - Minor revision (maybe a change to a search box, 1 feature added, collection of bug fixes)
// 0.0.X - Bug fix release
const COOKIE_VERSION = '1.0.0';

// Crypto key for our cookie file (PS: this is not a 'salt')
const CRYPT_KEY = '';

// For basic users we usually leave cookie time available for a long time (Example: 10 years)
// For admins we make it no more then 60 minutes
const COOKIE_TIME = 60;

// Here we set a duration for how long the user is blocked if he tried to log in with wrong password 
const BLOCK_TIME = 3;

// PAGE NAVIGATION CONSTANTS:

// Here we set to show 8 products per page
const QTY = 8;

// Here we set to show 3 page navigation options from each side of the current page in the navigation pan
const QTY_LINKS = 3;

// OTHER CONSTANTS:

// Location of the CSS and JS files for the admin panel
const ADMIN_CSS_JS = [
    'styles' => [],
    'scripts' => []
];

// Location of the CSS and JS files for user pages
const USER_CSS_JS = [
    'styles' => [],
    'scripts' => []
];

use core\base\exceptions\RouteException;

// Autoloader
function autoloadMainClasses($class_name){
    $class_name = str_replace('\\', '/', $class_name);
    
    // the @ sign prevents showing the errors generated by the 'include_once' function in case class not loaded
    if(!@include_once $class_name.'.php'){
        // Exception is something that happens different from what we anticipated but NOT an error
        throw new RouteException('Wrong conncetion class file name - '.$class_name);
    }
};

spl_autoload_register('autoloadMainClasses');