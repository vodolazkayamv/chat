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
	// LOGIN

	// prepare and bind
	$stmt = $conn->prepare("SELECT id FROM auth WHERE username = ? AND password = ?");
	if ($stmt)
	{
		$stmt->bind_param("ss", $_POST['username'], $_POST['password']);

		// set parameters and execute
		if ($stmt->execute())
		{
			$stmt->bind_result($userID);
			while ($row = $stmt->fetch()) {
				echo $userID;			  
			}	
		}
		else
		{
			echo "<br> <br> Error: " . "<br>" . mysqli_error($conn);
		}
	
	}
	
	
	mysqli_close($conn);

?>