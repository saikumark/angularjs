<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Player
 *
 * @author abhilaasha
 */
class PlayerModel extends Model{
    
    /**
     * 
     */
    private $dbTable = 'players';
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 
     * @param type $ipArray
     */
    public function getPlayers($ipArray=array()){
        
        $ipArray['table'] = $this->dbTable;
        $playerData = $this->dbInstance->getData($ipArray);
        return $playerData;
    }
}