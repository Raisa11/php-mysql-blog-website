<?php
	
	$db = mysqli_connect("localhost", "root", "", "ssm");

	if ( $db ){
		// echo "Database Connection Established";
	}
	else{
		die( "Database Connection Failed" );
	}

?>