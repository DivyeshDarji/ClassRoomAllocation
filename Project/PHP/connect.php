<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_projects";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



/*
$sql = "INSERT INTO account (username,password)
VALUES ('".$_POST["username"]."','".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/


?>


