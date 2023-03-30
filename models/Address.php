<?php

class Address extends Model{
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address_name'
    ];

    public function __construct(){
        parent::__construct($this->table);
    }
}