<?php

class Players extends Controller{
    function index(){
        $data["page_title"] = "Players";


        $football = $this->loadModel("football");

        $result = $football->get_all_players();
        $data['players_list'] = $result;

        $data["selected_club_list"] = $football->get_all_clubs();

        //update player
        if(isset($_POST['submit'])){
            show($_POST);
            $football->update_one_player($_POST);
        }


        $this->view("football/players", $data);
    }   

    function playersOf($clubID = ''){

        $football = $this->loadModel("football");

        $result = $football->get_players_of_club($clubID);

        $data['players_list'] = $result;

        $data["selected_club_list"] = $football->get_all_clubs();

        //update player
        if(isset($_POST['submit'])){
            show($_POST);
            $football->update_one_player($_POST);
        }
        
        $data["page_title"] = "Players";
        $this->view("football/players", $data);
    }   

    function AddPlayer(){

        $football = $this->loadModel("football");

        $result = $football->get_all_clubs();

        $data["page_title"] = "Add Player";
        $data["selected_club_list"] = $result;

        if(isset($_POST['added_player_FullName'])){
            // $football = $this->loadModel('football');
            $football->add_one_player($_POST);
        }
        
        $this->view("football/add_player", $data);
        
    }   

    function DeLetePlayer($PlayerID=''){

        $football = $this->loadModel("football");
        $football->delete_one_player($PlayerID);
        
    }   

    
}