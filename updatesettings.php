<?php
session_start();
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

$email = mysqli_real_escape_string($conn, $_POST["email"]);


$sql = "UPDATE `users` SET email = '". $email . "' WHERE username = '" . $_SESSION["username"] ."'";
echo $sql;
/*
if ($conn->query($sql) === TRUE) {
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
$conn->close();

?>
