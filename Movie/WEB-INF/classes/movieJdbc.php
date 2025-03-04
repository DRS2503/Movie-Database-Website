<?php
    //connection parameters
    $server = "localhost";
    $userName = "root";
    $pass = "";
    $db = "movies";
    //create connection
    $con=mysqli_connect($server,$userName,$pass,$db);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
	// Select data from movie table
	$sql = "SELECT * FROM movie";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
    // Output data of each row
    	echo "<h2>Movie Table</h2>";
    	echo "<table border='1'>";
    	echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Release Date</th><th>Length</th><th>Category ID</th><th>Rating ID</th></tr>";
    	while($row = $result->fetch_assoc()) {
        	echo "<tr><td>".$row["movieID"]."</td><td>".$row["title"]."</td><td>".$row["synopsis"]."</td><td>".$row["releaseDate"]."</td><td>".$row["length"]."</td><td>".$row["category"]."</td><td>".$row["rating"]."</td></tr>";
    	}
    	echo "</table>";
	} else {
    	echo "0 results";
	}

// Close connection
$con->close();
?>