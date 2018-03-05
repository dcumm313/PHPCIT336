<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost", "root", "root", "sports");
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	 
	// Attempt select query execution
	$sql = "SELECT * FROM athletes";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table>";
	            echo "<tr>";
					echo "<th>player_number</th>";
	                echo "<th>first_name</th>";
	                echo "<th>last_name</th>";
	                echo "<th>gender</th>";
	            echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
					echo "<td>" . $row['player_number'] . "</td>";
	                echo "<td>" . $row['first_name'] . "</td>";
	                echo "<td>" . $row['last_name'] . "</td>";
	                echo "<td>" . $row['gender'] . "</td>";
	            echo "</tr>";
	        }
	        echo "</table>";
	        // Close result set
	        mysqli_free_result($result);
	    } else{
	        echo "No records matching your query were found.";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	// attempt insert query execution
$sql = "INSERT INTO athletes (player_number, first_name, last_name, gender) VALUES ('32','Wormy', 'VonWormenstein', 'male')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "UPDATE athletes SET gender='Female' WHERE player_number=32";

if (mysqli_query($link, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($link);
}
	 
	// Close connection
	mysqli_close($link);
	?>
