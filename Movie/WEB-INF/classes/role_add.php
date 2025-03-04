<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //connection parameters
    $server = "localhost";
    $userName = "root";
    $pass = "";
    $db = "movies";
    //create connection
    $conn=mysqli_connect($server,$userName,$pass,$db);
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO ROLES (roleID, role) VALUES (?, ?)");
    $stmt->bind_param("ss", $roleID, $roleName);

    // Set parameters
    $roleID = $_POST['roleID'];
    $roleName = $_POST['roleName'];

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
