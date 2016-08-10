<?php

$servername = "127.0.0.1";
$dbusername = "notifree";
$dbpassword = "prewired2016";
$dbname = "notifree";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);


$sql = "SELECT * FROM `users` where username = '".$username."' and password = '".$password."'";
/*
if ($conn->query($sql) === TRUE) {
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
echo $sql;
$conn->close();

?>
