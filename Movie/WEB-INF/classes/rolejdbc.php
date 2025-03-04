<?php
    // Connection parameters
    $server = "localhost";
    $userName = "root";
    $pass = "";
    $db = "movies"; // Change this to your database name if it's not "movies"

    // Create connection
    $con = mysqli_connect($server, $userName, $pass, $db);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select data from roles table
    $sql = "SELECT * FROM roles";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<h2>Roles Table</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Role Name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["roleID"] . "</td><td>" . $row["role"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $con->close();
?>

