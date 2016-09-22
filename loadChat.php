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
	// RETRIEVE DATA

	//fetch table rows from mysql db
    $sql = "SELECT auth.username, chat.message, chat.reg_date from auth JOIN chat WHERE auth.id = chat.userID";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
	
	//create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }

	echo json_encode($emparray);

    mysqli_close($conn);

?>