<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate if person_ID is set
    if (isset($_POST['person_ID'])) {
        // Sanitize the input
        $person_ID = $_POST['person_ID'];

        // Connect to MySQL database
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

        // Prepare SQL statement to delete person
        $sql = "DELETE FROM persons WHERE personID = ?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $person_ID); // Assuming personID is an integer

        // Execute the delete statement
        if ($stmt->execute() === TRUE) {
            echo "Person deleted successfully.";
        } else {
            echo "Error deleting person: " . $conn->error;
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Person ID is required.";
    }
}
?>
