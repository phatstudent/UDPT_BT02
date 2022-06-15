<?php

class Clubs extends Controller{
    function index(){
        $data["page_title"] = "Clubs";

        $posts = $this->loadModel("football");
        $result = $posts->get_all_clubs();

        $data['clubs_list'] = $result;

        $this->view("football/clubs", $data);
    }   
}