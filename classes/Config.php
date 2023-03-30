<?php

class Config{
    private static $config = [
        'mysql' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db' => 'agma_db'
        ],
        'email' => [
            'host' => 'smtp.gmail.com',
            'username' => 'sample@gmail.com',
            'password' => 'sample',
            'port' => 587,
            'secure' => 'tls'
        ],
        'url' => [
            'base' => 'http://localhost/rg/'
        ],
        'session' => [
            'admin' => 'admin_id',
            'student' => 'student_id'
        ],
        'remember' => [
            'admin' => 'admin',
            'student' => 'student'
        ],
        'website' => [
            'name' => 'Agma',
            'title' => 'Agma',
            'description' => 'Agma - Registration and Identification',
            'keywords' => 'Agma, Registration, Identification, Anggi',
            'author' => 'Anggi'
        ],
        'admin' => [
            'username' => 'admin',
            'password' => 'admin'
        ],
        'pages' => [
            'registration' => 'registration',
            'login' => 'login',
            'dashboard' => 'dashboard',
            'profile' => 'profile',
            'identify' => 'identify',
            'customer' => 'customer',
            'address' => 'address',
            'dashboard' => 'dashboard',
            'create-address' => 'create-address',
            'customers' => 'customers',
        ]
    ];
    
    public static function get($path = null){
        if($path){
            $config = self::$config;
            $path = explode('/', $path);
            
            foreach($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            
            return $config;
        }
        
        return false;
    }
}