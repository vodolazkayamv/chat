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
	// CHECK ONLINE
	$t=time();

	$stmt = $conn->prepare("INSERT INTO bigbrother (userID) VALUES (?)");
	$stmt->bind_param("s", $userID);

	// set parameters and execute
	$userID = $_POST['userID'];

	if ($stmt->execute())
	{
		//echo "created success";
	}
	else
	{
		//echo "<br> <br> Error: " . "<br>" . mysqli_error($conn);
		//echo "<br><br>";

		$stmt = $conn->prepare("DELETE FROM bigbrother WHERE userID=?");
		$stmt->bind_param("s", $userID);

		// set parameters and execute
		$userID = $_POST['userID'];

		if ($stmt->execute())
		{
			//echo "deleted success";
			
			$stmt = $conn->prepare("INSERT INTO bigbrother (userID) VALUES (?)");
			$stmt->bind_param("s", $userID);

			// set parameters and execute
			$userID = $_POST['userID'];

			if ($stmt->execute())
			{
				//echo "created success";
			}
		}
	}

//INTERVAL '200 6:10:7' DAY(3) TO SECOND
// DELETE EXPIRED ONLINES
	$sql = "DELETE FROM bigbrother WHERE lastUpdate < NOW() - interval 10 second";
if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
} else {
    //echo "Error deleting record: " . $conn->error;
}

	$sql = "SELECT auth.username from auth JOIN bigbrother WHERE auth.id = bigbrother.userID";
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