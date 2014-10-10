<?php
/**
 * Description of Team
 *
 * @author Saikumar K
 */
class TeamModel extends Model{
    
    /**
     * 
     */
    private $dbTable = 'teams';
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 
     * @param type $ipArray
     */
    public function getTeams($ipArray=array()){
        
        $ipArray['table'] = $this->dbTable;
        $teamsData = $this->dbInstance->getData($ipArray);
        return $teamsData;
    }
}
