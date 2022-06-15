<?php

class Players extends Controller{
    function index(){
        $data["page_title"] = "About";

        $posts = $this->loadModel("football");
        $result = $posts->get_all();

        $data['posts'] = $result;

        $this->view("football/players", $data);
    }   
}