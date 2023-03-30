<?php

spl_autoload_register('autoload');

function autoload($class)
{
    if (file_exists('../classes/' . $class . '.php')) {
        require_once '../classes/' . $class . '.php';
    }elseif (file_exists('classes/' . $class . '.php')) {
        require_once 'classes/' . $class . '.php';
    }elseif (file_exists('../models/' . $class . '.php')) {
        require_once '../models/' . $class . '.php';
    }elseif (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    }else{
        die('Class ' . $class . ' not found');
    }
}

session_start();