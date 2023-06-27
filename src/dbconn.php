<?php
    $servername = "localhost:4306";
	$username = "root";
	$password = "";
	$database = "formulaone";

	$connection = new mysqli($servername, $username, $password, $database);
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
?>