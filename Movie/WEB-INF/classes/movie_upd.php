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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $m_id = $_GET["m_id"];
    $m_title = $_GET["m_title"];
    $m_synopsis = $_GET["m_synopsis"];
    $m_date = $_GET["m_date"];
    $m_length = $_GET["m_length"];
    $cat_id = $_GET["cat_id"];
    $rating_id = $_GET["rating_id"];

    // Update query
    $sql = "UPDATE movie SET title='$m_title', synopsis='$m_synopsis', releaseDate='$m_date', length='$m_length', category='$cat_id', rating='$rating_id' WHERE movieID ='$m_id'";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

// Close connection
$con->close();
?>
