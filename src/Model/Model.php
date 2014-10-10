<?php
/**
 * Description of Model
 *
 * @author abhilaasha
 */
class Model {
    
    public $dbInstance;
    public function __construct(){ 
        $this->dbInstance = DbUtil::getInstance();
    }
}
