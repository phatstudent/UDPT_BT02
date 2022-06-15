<?php

class Football{

    function get_all_players(){

        $querry = 'select p.PlayerID, p.FullName, c.ClubName, p.Position, p.Nationality, p.Number 
        from player p join club c on p.ClubID = c.ClubID
        order by PlayerID asc ';

        $DB = new Database();

        $data = $DB->read($querry);
        if(is_array($data)){
            
            return $data;
        }

        return false;
    }

    function get_all_clubs(){

        $querry = 'select cb.ClubID, cb.ClubName, sm.SName, ch.CFullName 
        from club cb, stadium sm, coach ch
        where cb.StadiumID = sm.StadiumID and cb.CoachID = ch.CoachID
        order by ClubID asc';

        $DB = new Database();

        $data = $DB->read($querry);
        if(is_array($data)){
            
            return $data;
        }

        return false;
    }

    function get_players_of_club($clubID){

        $arr['clubID'] = $clubID;

        $querry = "select p.PlayerID, p.FullName, c.ClubName, p.Position, p.Nationality, p.Number, c.ClubID 
        from player p join club c on p.ClubID = c.ClubID
        where c.ClubID = :clubID
        order by PlayerID asc ";

        $DB = new Database();

        $data = $DB->read($querry, $arr);
        if(is_array($data)){
            
            return $data;
        }

        return false;
    }
}