<?php

require('autoload.php');

if(Input::exists('post')){
    $validate = new Validate();
    $validation = $validate->check($_POST, [
        'account_number' => [
            'display' => 'Account Number',
            'required' => true,
            'min' => 10,
            'max' => 12
        ]
    ]);

    if($validation->passed()){
        try{
            $customer = new Customer();
            $res = $customer->findBy('account_number', Input::get('account_number'));

            if($res){
                Session::put('customer', $res);
                Session::flash('success', 'Welcome, ' . $res->first_name . ' ' . $res->last_name . '!');
                Redirect::to('index.php?page=customer');
            }else{
                Session::flash('error', 'Account number does not exist!');
                Redirect::to('index.php?page=login');
            }
        }catch(Exception $e){
            Session::flash('error', 'Something went wrong!' . $e->getMessage());
            Redirect::to('index.php?page=login');
        }
    }else{
        Session::flash('error', $validation->errors()[0]);
        Redirect::to('index.php?page=login');
    }
}else{
    Session::flash('error', 'Something went wrong!');
    Redirect::to('index.php?page=login');
}