<?php

namespace core\base\controllers;

use core\base\settings\Settings;

use core\base\settings\ShopSettings;

class RouteController{
    static private $_instance;
    public $hair = 'Blonde';

    private function __clone(){}

    // Singleton pattern
    // We use the singleton pattern in order to restrict the number of instances that can be created from a resource consuming class to only one
    // Resource consuming classes are classes that might slow down our website or cost money (Example: DB connection)
    // So, in all of these cases, it is a good idea to restrict the number of objects that we create from the expensive class to only one
    // In case with MySQL server, this will reduce the load on it
    // More can be found here: https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php
    static public function getInstance(){
        // Makes this class object same to all instances of this class including it's parameters
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        return self::$_instance = new self;
    }

    private function __construct(){
        $s = Settings::getInstance('routes');
        $s1 = ShopSettings::getInstance('routes');
        exit();
    }
}