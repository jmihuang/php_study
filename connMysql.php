<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pwd  = "1234";
    $db_name = "test";
    $mysqli = new mysqli( $db_host,$db_user,$db_pwd, $db_name);

	/* check connection */
	if ($mysqli->connect_error) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$mysqli->set_charset("utf8");

 ?>