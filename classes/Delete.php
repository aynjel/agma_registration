<?php

class Delete{
    private $db;
    
    public function __construct(){
        $this->db = new Database();
    }
    
    public function delete($table, $id){
        $this->db->query("DELETE FROM {$table} WHERE id = {$id}");

        if($this->db->execute()){
            Session::flash('success', 'Successfully deleted.');
            Redirect::to('customers.php');
        } else {
            Session::flash('error', 'Something went wrong.');
            Redirect::to('customers.php');
        }
    }
}