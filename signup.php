<?php

$servername = "localhost";
	$username = "finley";
	$password = "some_pass";

	$dbname = "chatDB";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//------------------------------------------------------------------------------
	// SIGN UP

	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO auth (username, password) VALUES (?, ?)");
	if ($stmt)
	{
		$stmt->bind_param("ss", $_POST['username'], $_POST['password']);

		// set parameters and execute
		if ($stmt->execute())
		{
			echo "Created new user profile successfully";			  
		}
		else
		{
			echo "Error: " . mysqli_error($conn);
		}
	
	}
	
	
	mysqli_close($conn);

?>