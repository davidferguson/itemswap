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

$email = mysqli_real_escape_string($conn, $_POST["email"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$confirm_password = mysqli_real_escape_string($conn, $_POST["cpassword"]);

if ( $password != $confirm_password ) {
echo "Passwords did not match";
break;
}


echo strlen($password);
if ( strlen($password) < 6 ) {
echo "Password was not of minimum length";
break;
}

if(1 != preg_match('~[0-9]~', $password)) {
echo "Password must contain numbers";
break;
}

$sql = "INSERT INTO users VALUES ('0', '" . $username . "', '" . $password . "', '" . $email . "')";

if ($conn->query($sql) === TRUE) {
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
