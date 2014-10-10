<?php
/**
 * Description of DbUtil
 *
 * @author Saikumar K
 */
class DbUtil {

    private static $dbInstance;
    public function __construct(){
        self::connectDb();
    }
    
    public function __clone() {
       throw new Exception("Can't clone a singleton");
    }
    
    public static function getInstance(){
        if(self::$dbInstance == null){
            self::$dbInstance = new DbUtil();
        }
        return self::$dbInstance;
    }
    
    private static function connectDb(){
	self::$dbInstance=mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	if(!self::$dbInstance){
		die('Could not connect: '.mysql_error());
	}
	mysql_select_db(DB_NAME,self::$dbInstance);
    }

    public function getData($inputArray){

        $finalArray = array();
	if(!empty($inputArray['table'])){
	
            if(!empty($inputArray['fields'])){
                    $fieldsStr = implode(",",$inputArray['fields']);
            }
            else{
                    $fieldStr = " * ";
            }

            $query = "SELECT ".$fieldStr." FROM ".$inputArray['table'];

            if(!empty($inputArray['where'])){
                    $query.= " ".$inputArray['where'];
            }

            if(!empty($inputArray['group'])){
                    $query.=" ".$inputArray['group'];
            }

            if(!empty($inputArray['order'])){
                    $query.=" ".$inputArray['order'];
               }
               //echo $query;
            $return = mysql_query($query);

            while($row=mysql_fetch_assoc($return))	{
                    $finalArray[] = $row;
            }

            return $finalArray;	
	}
    }

}