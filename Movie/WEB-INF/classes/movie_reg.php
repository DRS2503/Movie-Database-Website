<?php
//Html parameters
$m_id = $_POST['m_id'];
$m_title = $_POST['m_title'];
$m_date = $_POST['m_date'];
$m_synopsis = $_POST['m_synopsis'];
$m_length = $_POST['m_length'];
$m_rating = $_POST['rating_id'];
$m_cat = $_POST['cat_id'];



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
//example insert statement to add a new mascot
mysqli_query($con,"INSERT INTO movie(movieID, title, releaseDate, synopsis, rating, length, category) VALUES ('$m_id', '$m_title', '$m_date', '$m_synopsis', '$m_rating', '$m_length', '$m_cat')");


//example SELECT stament to show the results of the mascots table
$result = mysqli_query($con,"SELECT * FROM movie;");

while($row = mysqli_fetch_array($result))
    {
        echo $row['movieID'] . " " . $row['title'] . " " . $row['releaseDate'] . " " . $row['synopsis'] . " " . $row['rating'] . " " . $row['length'] . " " . $row['category'];
        echo "<br>";
        }
        mysqli_close($con);




?>
