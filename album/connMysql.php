<?php
// ** 
    $db_host = "localhost";
    $db_user = "jmispace_album";
    $db_pwd =  "Jmi0313@space";
    $db_name = "jmispace_php";


	try{
    	$DB_con = new pdo( 
                    "mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_pwd,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     	$DB_con -> exec("SET CHARACTER SET utf8");
	}
	catch(PDOException $ex){
	    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
	}



?>