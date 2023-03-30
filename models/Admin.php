<?php

class Admin extends Model{
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'password'
    ];

    public function __construct(){
        parent::__construct($this->table);
    }

    public function login($username, $password){
        $res = $this->findBy('username', $username);
        if($res){
            if($password === $res->password){
                Session::put('admin', $res->id);
                return true;
            }
        }
        return false;
    }
}