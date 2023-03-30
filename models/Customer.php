<?php

class Customer extends Model{
    protected $table = 'customers';
    protected $fillable = [
        'account_number',
        'first_name',
        'last_name',
        'city',
        'zip_code',
        'baranggay',
        'street_name',
    ];

    public function __construct(){
        parent::__construct($this->table);
    }
}