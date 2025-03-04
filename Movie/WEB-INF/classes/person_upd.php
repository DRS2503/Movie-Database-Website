<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate if personID is set
    if (isset($_POST['personID'])) {
        // Sanitize the input
        $personID = $_POST['personID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $pay = $_POST['pay'];

        // Connect to MySQL database
        //connection parameters
        $server = "localhost";
        $userName = "root";
        $pass = "";
        $db = "movies";
        //create connection
        $conn=mysqli_connect($server,$userName,$pass,$db);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL statement to update person
        $sql = "UPDATE persons SET firstName=?, lastName=?, pay=? WHERE personID=?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $firstName, $lastName, $pay, $personID); // Assuming personID is an integer

        // Execute the update statement
        if ($stmt->execute() === TRUE) {
            echo "Person updated successfully.";
        } else {
            echo "Error updating person: " . $conn->error;
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Person ID is required.";
    }
}
?>



