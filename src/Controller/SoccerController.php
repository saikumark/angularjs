<?php

/**
 * Description of SoccerController
 *
 * @author Saikumar K
 */
class SoccerController {
    
    /**
     * 
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 
     */
    public static function getTeams(){
        
        $teamObj = new TeamModel();
        $teams = $teamObj->getTeams();
        return $teams;
    }
    
    public static function getPlayers(){

        if(!empty($_GET['team']) && $_GET['team'] > 0){
            $teamId = $_GET['team'];
            
            $ipArray = array();
            $ipArray['where'] = " WHERE teamId=\"$teamId\"";
            
            $playerObj = new PlayerModel();
            $players = $playerObj->getPlayers($ipArray);
            return $players;
        }
    }

}
