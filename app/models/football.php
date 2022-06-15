<?php

class Football{

    function get_all(){

        $querry = 'select * from player order by PlayerID asc limit 6';

        $DB = new Database();

        $data = $DB->read($querry);
        if(is_array($data)){
            
            return $data;
        }

        return false;
    }
}