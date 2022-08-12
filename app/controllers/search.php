<?php

class Search extends Controller{
    function index($a = '', $b = '', $c = ''){
        
        // $football = $this->loadModel("football");

        // $result = $football->get_players_of_club($clubID);

        // $data['players_list'] = $result;
        
        $data["page_title"] = "Search";
        $this->view("football/search_players", $data);
    }   
}