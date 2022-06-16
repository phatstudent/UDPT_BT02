<?php

class User{
    function login($POST){

        $DB = new Database();


        $_SESSION['error'] ="";
        if(isset($POST['username']) && isset($POST['password'])){

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $querry = "select * from users where username = :username && password = :password limit 1";

            $data = $DB->read($querry, $arr);
            
            if(is_array($data)){
                //logged in
                $_SESSION['user_id'] = $data[0]->id;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

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

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['email'] = $POST['email'];
            $arr['url_address'] = get_random_string_max(50);
            $arr['date'] = date("Y-m-d H:i:s");

            $querry = "insert into users (username,password,email,url_address,date) values (:username,:password,:email,:url_address,:date)";

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

        if(isset($_SESSION['user_url'])){

            $arr['user_url'] = $_SESSION['user_url'];

            $querry = "select * from users where url_address = :user_url limit 1";
            $data = $DB->read($querry, $arr);
            if(is_array($data)){
                //logged in
                $_SESSION['user_id'] = $data[0]->id;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }

        return false;

    }

    function logout(){

        unset($_SESSION['user_name']);
        unset($_SESSION['user_url']);

        header("Location:". ROOT ."home");
    }

}