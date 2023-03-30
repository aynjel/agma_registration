<?php

require('autoload.php');

if(Input::exists('post')){
    $validate = new Validate();
    $validation = $validate->check($_POST, [
        'first_name' => [
            'display' => 'First Name',
            'required' => true,
            'min' => 2,
            'max' => 50
        ],
        'last_name' => [
            'display' => 'Last Name',
            'required' => true,
            'min' => 2,
            'max' => 50
        ],
        'city' => [
            'display' => 'City',
            'required' => true
        ],
        'baranggay' => [
            'display' => 'Baranggay',
            'required' => true
        ],
        'sitio' => [
            'display' => 'Sitio',
            'required' => true
        ]
    ]);

    if($validation->passed()){
        try{
            $customer = new Customer();
            $res = $customer->create([
                'account_number' => strtoupper(Input::get('account_number')),
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'city' => Input::get('city'),
                'baranggay' => Input::get('baranggay'),
                'sitio' => Input::get('sitio')
            ]);

            if($res){
                Session::flash('success', 'Customer has been added successfully!');
                Redirect::to('index.php?page=registration');
            }else{
                Session::flash('error', 'Something went wrong!');
                Redirect::to('index.php?page=registration');
            }
        }catch(Exception $e){
            Session::flash('error', 'Something went wrong!' . $e->getMessage());
            Redirect::to('index.php?page=registration');
        }
    }else{
        Session::flash('error', $validation->errors()[0]);
        Redirect::to('index.php?page=registration');
    }
}else{
    Session::flash('error', 'Something went wrong!');
    Redirect::to('index.php?page=registration');
}