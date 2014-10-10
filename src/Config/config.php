<?php
define('DB_NAME','DBNAME');
define('DB_USERNAME','USERNAME');
define('DB_PASSWORD','PASSWORD');
define('DB_HOST','DBHOST');

function __autoload($className){
    
    $regInput = array($className);
    if(preg_grep('/Model/',$regInput)){
        $fileName = "Model/$className.php";
    }
    
    if(preg_grep('/Controller/',$regInput)){
        $fileName = "Controller/$className.php";
    }
    
    if(preg_grep('/Util/',$regInput)){
        $fileName = "Util/$className.php";
    }
    
    if(!empty($fileName) && file_exists($fileName)){
        include_once($fileName);
    }
}