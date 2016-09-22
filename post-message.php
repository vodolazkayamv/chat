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
// POST MESSAGE TO DB

	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO CHAT (userID, message) VALUES (?, ?)");
	$stmt->bind_param("ss", $userID, $message);

	// set parameters and execute
	$userID = $_POST['userID'];
	$message = $_POST['message'];

	if ($stmt->execute())
	{
		echo "created success";
	}
	else
	{
		echo "<br> <br> Error: " . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

?>