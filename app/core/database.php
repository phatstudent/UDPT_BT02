<?php

class Database{
    public function db_connect(){
        try{
            $string = DB_TYPE .":host=". DB_HOST .";dbname=". DB_NAME .";";
            $db = new PDO($string,DB_USER,DB_PASS);
            return $db;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function read($querry, $data = []){
        $DB = $this->db_connect();
        $stm = $DB->prepare($querry);

        if(count($data) == 0){
            $stm = $DB->query($querry);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check){
            $data =  $stm->fetchAll(PDO::FETCH_OBJ);

            if(is_array($data) && count($data) > 0){
                return $data;
            }

            return false;

        }else{
            return false;
        }
    }

    public function write($querry, $data = []){
        $DB = $this->db_connect();
        $stm = $DB->prepare($querry);

        if(count($data) == 0){
            $stm = $DB->query($querry);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check){
            return true;
        }else{
            return false;
        }
    }
}