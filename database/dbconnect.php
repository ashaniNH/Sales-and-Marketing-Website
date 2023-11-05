<?php
	$servername="localhost";
	$username="root";
	$password="";
	$database="marketing";

	//Create connection
	$conn = new mysqli($servername,$username,$password,$database);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//public static function closeDb(){
		/* closeDb function close the database connection */
	//	mysql_close();
	//}
	
?>
