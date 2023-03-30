<?php

class Model{
    protected $db, $table, $fillable = [], $primaryKey = 'id';

    public function __construct($table){
        $this->db = Database::getInstance();
        $this->table = $table;
    }

    public function all(){
        return $this->db->query("SELECT * FROM {$this->table}")->results();
    }

    public function find($id){
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?", [$id])->first();
    }

    public function findBy($field, $value){
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$field} = ?", [$value])->first();
    }

    public function findAllBy($field, $value){
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$field} = ?", [$value])->results();
    }

    public function create($fields = []){
        $this->db->insert($this->table, $fields);
        return $this->db->lastInsertId();
    }

    public function update($id, $fields = []){
        $this->db->update($this->table, $id, $fields);

        if($this->db->count()){
            return true;
        }
    }

    public function delete($id){
        $this->db->delete($this->table, $id);

        if($this->db->count()){
            return true;
        }
    }

    public function save($fields = []){
        if(isset($fields[$this->primaryKey])){
            return $this->update($fields[$this->primaryKey], $fields);
        }else{
            return $this->create($fields);
        }
    }

    public function fill($fields = []){
        foreach($fields as $field => $value){
            if(in_array($field, $this->fillable)){
                $this->{$field} = $value;
            }
        }
    }

    public function __get($name){
        if(property_exists($this, $name)){
            return $this->{$name};
        }
    }

    public function __set($name, $value){
        if(property_exists($this, $name)){
            $this->{$name} = $value;
        }
    }

    public function __call($name, $arguments){
        if(method_exists($this->db, $name)){
            return call_user_func_array([$this->db, $name], $arguments);
        }
    }
}