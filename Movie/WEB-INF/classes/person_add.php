<?php
//connection parameters
$server = "localhost";
$userName = "root";
$pass = "";
$db = "movies";
//create connection
$con=mysqli_connect($server,$userName,$pass,$db);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $personID = $_POST["personID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $pay = $_POST["pay"];

    // Insert data into persons table
    $sql = "INSERT INTO persons (personID, firstName, lastName, pay) VALUES ('$personID', '$firstName', '$lastName', '$pay')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$result = mysqli_query($con,"SELECT * FROM persons;");

while($row = mysqli_fetch_array($result))
    {
        echo $row['personID'] . " " . $row['firstName'] . " " . $row['lastName'] . " " . $row['pay'];
        echo "<br>";
        }

// Close connection
$con->close();
?>