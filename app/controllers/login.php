<?php

class Login extends Controller{
    function index($a = '', $b = '', $c = ''){
        
        $data["page_title"] = "login";
        
        // show(json_decode($_POST['test']));
        // $football = $this->loadModel('football');
        // show($football->generate_row_ID("coach"));
        // show($_POST);
        if(isset($_POST['email'])){
            $user = $this->loadModel('user');
            $user->signup($_POST);
        }elseif(isset($_POST['username'])){
            $user = $this->loadModel('user');
            $user->login($_POST);
        }

        $this->view("football/login", $data);
    }
}