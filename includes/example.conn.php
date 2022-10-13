<?php
	$conn = new mysqli('hostname', 'username', 'password', 'database_name');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>