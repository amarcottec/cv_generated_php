<?php 

// connect to the database
	$conn = mysqli_connect('localhost', 'amarcotte', '1234', 'cv_generate');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
	

?>