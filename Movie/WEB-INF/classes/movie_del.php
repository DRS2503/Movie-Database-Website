<?php
// Check if either movie ID or movie title is provided
if(isset($_GET['m_id']) || isset($_GET['m_title'])) {

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

    // Prepare the SQL query based on whether movie ID or title is provided
    if(isset($_GET['m_id'])) {
        $id = $_GET['m_id'];
        $sql = "DELETE FROM movie WHERE movieID = '$id'";
    } elseif(isset($_GET['m_title'])) {
        $title = $_GET['m_title'];
        $sql = "DELETE FROM movie WHERE title = '$title'";
    }

    // Execute the SQL querys
    if (mysqli_query($con, $sql)) {
        echo "Movie deleted successfully";
    } else {
        echo "Error deleting movie: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Please provide either movie ID or title to delete a movie.";
}
?>

