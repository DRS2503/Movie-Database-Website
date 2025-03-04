<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate if role_ID is set
    if (isset($_POST['roleID'])) {
        // Sanitize the input
        $role_ID = $_POST['roleID'];

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

        // Prepare SQL statement to delete role
        $sql = "DELETE FROM roles WHERE roleID = ?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $role_ID); // Assuming roleID is an integer

        // Execute the delete statement
        if ($stmt->execute() === TRUE) {
            echo "Role deleted successfully.";
        } else {
            echo "Error deleting role: " . $conn->error;
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Role ID is required.";
    }
}
?>


