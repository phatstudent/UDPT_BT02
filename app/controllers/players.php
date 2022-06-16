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

        $result = $posts->get_players_of_club($clubID);

        $data['players_list'] = $result;
        
        $data["page_title"] = "Players";
        $this->view("football/players", $data);
    }   

    function AddPlayers(){

        $data["page_title"] = "Add Player";
        if(isset($_POST['added_player_id'])){
            $user = $this->loadModel('football');
            $user->add_one_player($_POST);
        }
        
        $this->view("football/add_player", $data);

        // header(('location:'.ROOT."players"));
        // die;
    }   
    
}