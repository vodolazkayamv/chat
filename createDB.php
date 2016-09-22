<?php

	$servername = "localhost";
	$username = "finley";
	$password = "some_pass";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Create database
	$sql = "CREATE DATABASE chatDB";
	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . mysqli_error($conn);
	}

	$dbname = "chatDB";

	mysqli_close($conn);

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// sql to create table
	$sql = "CREATE TABLE AUTH (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP,
	UNIQUE (username)
	)";
	
	if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	// sql to create table
	$sql = "CREATE TABLE CHAT (
	id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	userID 	 INT(6) NOT NULL,
	message  LONGTEXT NOT NULL,
	reg_date TIMESTAMP
	)";
	
	if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}


	// sql to create table
	$sql = "CREATE TABLE BIGBROTHER (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	userID 	 INT(6) NOT NULL,
	lastUpdate TIMESTAMP,
	UNIQUE (userID)
	)";
	
	if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	mysqli_close($conn);

?>