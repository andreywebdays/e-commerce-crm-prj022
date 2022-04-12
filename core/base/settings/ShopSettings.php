<?php

namespace core\base\settings;

use core\base\settings\Settings;

class ShopSettings{
    
    static private $_instance;

    private $baseSettings;

    private $routes = [
        'admin' => [
            'name' => 'sudo'
        ],
        'vasya' => [
            'name' => 'vasya'
        ]
    ];
    
    private $templateArr = [
        'text' => ['price', 'short'],
        'textarea' => ['goods_content']
    ];

    static public function get($property){
        return self::getInstance()->$property;
    }

    // Singleton pattern
    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        self::$_instance = new self;
        self::$_instance->baseSettings = Settings::getInstance();
        $baseProperties = self::$_instance->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance;
    }
    
    private function __construct(){}

    private function __clone(){}

    protected function setProperty($properties){
        if($properties){
            foreach($properties as $name => $property){
                $this->$name = $property;
            }
        }
    }

}