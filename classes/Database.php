<?php

class Database{
    private static $instance = null;
    private $pdo, $query, $error = false, $results, $count = 0, $lastInsertId = null;

    private function __construct(){
        try{
            $this->pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function query($sql, $params = []){
        $this->error = false;

        if($this->query = $this->pdo->prepare($sql)){
            $i = 1;

            if(count($params)){
                foreach($params as $param){
                    $this->query->bindValue($i, $param);
                    $i++;
                }
            }

            if($this->query->execute()){
                $this->results = $this->query->fetchAll();
                $this->count = $this->query->rowCount();
                $this->lastInsertId = $this->pdo->lastInsertId();
            }else{
                $this->error = true;
            }
        }

        return $this;
    }

    // get results
    public function results(){
        return $this->results;
    }

    // get first result
    public function first(){
        if($this->count){
            return $this->results()[0];
        }
    }

    // get count
    public function count(){
        return $this->count;
    }

    // get error
    public function error(){
        return $this->error;
    }

    // get last insert id
    public function lastInsertId(){
        return $this->lastInsertId;
    }

    // insert data
    public function insert($table, $fields = []){
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach($fields as $field => $value){
            $fieldString .= '`' . $field . '`,';
            $valueString .= '?,';
            $values[] = $value;
        }

        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');

        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";

        if(!$this->query($sql, $values)->error()){
            return true;
        }

        return false;
    }

    // update data
    public function update($table, $id, $fields = []){
        $fieldString = '';
        $values = [];

        foreach($fields as $field => $value){
            $fieldString .= ' ' . $field . ' = ?,';
            $values[] = $value;
        }

        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString, ',');

        $sql = "UPDATE {$table} SET {$fieldString} WHERE id = {$id}";

        if(!$this->query($sql, $values)->error()){
            return true;
        }

        return false;
    }

    // delete data
    public function delete($table, $id){
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        $this->query($sql);

        if(!$this->error()){
            return true;
        }
    }
}