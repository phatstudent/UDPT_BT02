<?php

class Posts{

    function get_all(){

        $querry = 'select * from images order by id desc limit 12';

        $DB = new Database();

        $data = $DB->read($querry);
        if(is_array($data)){
            
            return $data;
        }

        return false;
    }
}