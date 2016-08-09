<?php

$email = mysql_real_escape($_POST["email"]);
$username = mysql_real_escape($_POST["username"]);
$password = mysql_real_escape($_POST["password"]);
$confirm_password = mysql_real_escape($_POST["cpassword"]);

if ( $password != $confirm_password ) {
echo "Passwords did not match";
break;
}

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

$sql = "INSERT INTO users VALUES ('0', '" . $username . "', '" . $password . "', '" . $email . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
