<?php

class Players extends Controller{
    function index(){
        $data["page_title"] = "Players";

        $posts = $this->loadModel("football");
        $result = $posts->get_all_players();

        $data['players_list'] = $result;

        $this->view("football/players", $data);
    }   

    function playersOf($clubID = ''){

        $posts = $this->loadModel("football");

        show($clubID);
        $result = $posts->get_players_of_club($clubID);

        $data['players_list'] = $result;
        
        $data["page_title"] = "Players";
        $this->view("football/players", $data);
    }   
    
}