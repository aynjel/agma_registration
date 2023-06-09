<?php

class Input{
    public static function exists($type = 'post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? true : false;
            break;
            case 'get':
                return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }

    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }else if(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }

    public static function set($item, $value){
        if(isset($_POST[$item])){
            $_POST[$item] = $value;
        }else if(isset($_GET[$item])){
            $_GET[$item] = $value;
        }
    }

    public static function all(){
        $data = [];
        foreach($_POST as $key => $value){
            $data[$key] = $value;
        }
        foreach($_GET as $key => $value){
            $data[$key] = $value;
        }
        return $data;
    }
}