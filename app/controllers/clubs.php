<?php

class Clubs extends Controller{
    function index(){
        $data["page_title"] = "Clubs";

        $posts = $this->loadModel("football");
        $result = $posts->get_all_clubs();

        $data['clubs_list'] = $result;

        $this->view("football/clubs", $data);
    }   

    function AddClub(){

        $data["page_title"] = "Add Club";

        $football = $this->loadModel("football");

        $result = $football->get_all_stadiums();
        $data["option_stadiums_list"] = $result;

        $result = $football->get_all_coachs();
        $data["option_coachs_list"] = $result;

        // show($_POST['added_club_StadiumID']);

        if(isset($_POST['added_club_ClubName'])){
            $football->add_one_club($_POST);
        }
        
        $this->view("football/add_club", $data);
        
    }   

    function DeLeteClub($ClubID=''){

        $football = $this->loadModel("football");
        $football->delete_one_club($ClubID);
        
    }   
}