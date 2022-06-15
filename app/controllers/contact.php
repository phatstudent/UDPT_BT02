<?php

class Contact extends Controller{
    function index($a = '', $b = '', $c = ''){
        $data['page_title'] = "Contact Us";
        $this->view("minima/contact", $data);
    }
}