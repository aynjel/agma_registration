<?php

require('../autoload.php');

if(!isset($_GET['id']) || !isset($_GET['action']) || !isset($_GET['table'])) {
    header('Location: index.php?page=customers');
    exit;
}

$id = $_GET['id'];
$table = $_GET['table'];

if($_GET['action'] == 'delete') {
    switch($table) {
        case 'customers':
            $customer = new Customer();
            $customer->delete($id);
            Session::flash('success', 'Successfully deleted.');
            Redirect::to('index.php?page=customers');
            break;
        default:
            Redirect::to('index.php?page=customers');
            exit;
    }
}else{
    header('Location: index.php?page=customers');
    exit;
}