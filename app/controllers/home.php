<?php

class Home extends Controller{
    function index($a = '', $b = '', $c = ''){
        $data["page_title"] = "home";

        $posts = $this->loadModel("posts");
        $result = $posts->get_all();

        $data['posts'] = $result;

        $this->view("football/index", $data);
    }
}