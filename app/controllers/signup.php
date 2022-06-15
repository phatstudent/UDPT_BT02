<?php

class Signup extends Controller{
    function index($a = '', $b = '', $c = ''){

        $data["page_title"] = "signup";
        if(isset($_POST['email'])){
            $user = $this->loadModel('user');
            $user->signup($_POST);
        }elseif(isset($_POST['username'])){
            $user = $this->loadModel('user');
            $user->login($_POST);
        }

        $this->view("football/signup", $data);
    }
}