<?php

class User{
    function login($POST){

        $DB = new Database();


        $_SESSION['error'] ="";
        if(isset($POST['username']) && isset($POST['password'])){

            $arr['name'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $querry = "select * from user where name = :name && password = :password limit 1";

            $data = $DB->read($querry, $arr);
            
            if(is_array($data)){
                //logged in
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->name;
                // $_SESSION['user_url'] = $data[0]->url_address;

                header("Location:". ROOT . "home");
                die;
            }else{
                $_SESSION['error'] = "wrong username or password";
            }
        }else{
            $_SESSION['error'] = "please enter a valid username and password";
        }

    }

    function signup($POST){
        
        $DB = new Database();

        $_SESSION['error'] ="";
        if(isset($POST['username']) && isset($POST['password'])){

            $arr['name'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['status'] = 1;
            // $arr['email'] = $POST['email'];
            // $arr['email'] = $POST['email'];
            // $arr['url_address'] = get_random_string_max(50);
            // $arr['date'] = date("Y-m-d H:i:s");

            $querry = "insert into user (name,password,status) values (:name,:password,:status)";

            $data = $DB->write($querry, $arr);

            if($data){
                header("Location:". ROOT . "login");
                die;
            }

        }else{
            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function check_logged_in(){

        $DB = new Database();

        if(isset($_SESSION['user_name'])){

            $arr['name'] = $_SESSION['user_name'];
            // $arr['user_url'] = $_SESSION['user_url'];

            $querry = "select * from user where name = :name limit 1";
            $data = $DB->read($querry, $arr);
            if(is_array($data)){
                //logged in
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->name;
                // $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }

        return false;

    }

    function logout(){

        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);

        header("Location:". ROOT ."home");
    }

}