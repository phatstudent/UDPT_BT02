<?php

class Football
{

    function get_all_players()
    {

        $querry = 'select p.PlayerID, p.FullName, c.ClubName, p.Position, p.Nationality, p.Number 
        from player p join club c on p.ClubID = c.ClubID
        order by PlayerID asc ';

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function get_all_clubs()
    {

        $querry = 'select cb.ClubID, cb.ClubName, sm.SName, ch.CFullName 
        from club cb, stadium sm, coach ch
        where cb.StadiumID = sm.StadiumID and cb.CoachID = ch.CoachID
        order by ClubID asc';

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function get_all_stadiums()
    {

        $querry = 'select * from stadium';

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function get_all_coachs()
    {

        $querry = 'select * from coach';

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function get_players_of_club($clubID)
    {

        $arr['clubID'] = $clubID;

        $querry = "select p.PlayerID, p.FullName, c.ClubName, p.Position, p.Nationality, p.Number, c.ClubID 
        from player p join club c on p.ClubID = c.ClubID
        where c.ClubID = :clubID
        order by PlayerID asc ";

        $DB = new Database();

        $data = $DB->read($querry, $arr);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }


    function get_ClubID_with_name($name)
    {

        $querry = "select ClubID 
        from club
        where ClubName = '$name'
        limit 1";

        $DB = new Database();

        $data = $DB->read($querry);

        // show($data);

        // show($data[0]->ClubID);

        if (is_array($data)) {
            return $data[0]->ClubID;
        }

        return $data;
    }

    function add_one_player($POST)
    {

        $DB = new Database();

        $_SESSION['error'] = "";
        if (isset($POST['added_player_FullName']) && $POST['added_player_FullName'] != '') {

            $arr['PlayerID'] = $this->generate_row_ID("player") + 1; 
            $arr["FullName"] = $POST['added_player_FullName'];
            $arr['ClubID'] = $this->get_ClubID_with_name($POST['added_player_ClubName']); //need to select
            $arr['Position'] = $POST['added_player_Position'];
            $arr['Nationality'] = $POST['added_player_Nationality'];
            $arr['Number'] = $POST['added_player_Number'];

            show($arr);

            $querry = "insert into player (PlayerID,FullName,ClubID,Position,Nationality,Number) values (:PlayerID,:FullName,:ClubID,:Position,:Nationality,:Number)";


            $data = $DB->write($querry, $arr);

            if ($data) {
                header("Location:" . ROOT . "players");
                die;
            }
        } else {
            $_SESSION['error'] = "please enter a valid information of player";
        }
    }

    function generate_row_ID($table)
    {

        $tableID = ucfirst($table) . "ID";

        $querry = "select max($tableID) as maxID from $table";

        $DB = new Database();

        $data = $DB->read($querry);

        return $data[0]->maxID;
    }

    function add_one_club($POST)
    {

        $DB = new Database();

        $_SESSION['error'] = "";
        if (isset($POST['added_club_ClubName']) && $POST['added_club_ClubName'] != '') {

            $arr['ClubID'] = $this->generate_row_ID("club") + 1; 
            $arr['ClubName'] = $POST['added_club_ClubName'];
            $arr['Shortname'] = $POST['added_club_Shortname'];
            $arr['StadiumID'] = $POST['added_club_StadiumID'];
            $arr['CoachID'] = $POST['added_club_CoachID'];

            $querry = "insert into club (ClubID,ClubName,Shortname,StadiumID,CoachID) values (:ClubID,:ClubName,:Shortname,:StadiumID,:CoachID)";

            $data = $DB->write($querry, $arr);

            if ($data) {
                header("Location:" . ROOT . "clubs");
                die;
            }
        } else {
            $_SESSION['error'] = "please enter a valid information of player";
        }
    }
}
