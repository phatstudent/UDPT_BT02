<?php

class Logout extends Controller{
    function index($a = '', $b = '', $c = ''){
        $user = $this->loadModel("user");
        $user->logout();
    }
}