<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $role_id = $_POST['role_id'];
    $new_role_name = $_POST['new_role_name'];
    
    // Prepare SQL statement
    $sql = "UPDATE roles SET role ='$new_role_name' WHERE roleID=$role_id";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "Role updated successfully";
    } else {
        echo "Error updating role: " . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>




