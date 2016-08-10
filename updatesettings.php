<?php

    // start the session - required to get username variable
    session_start();

    // define mysql server details
    $servername = "127.0.0.1";
    $dbusername = "notifree";
    $dbpassword = "prewired2016";
    $dbname = "notifree";

    // connect to server, displaying message on error
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get the POST data, and escape it
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // generate the UPDATE mysql query
    $sql = "UPDATE `users` SET email = '". $email . "' WHERE username = '" . $_SESSION["username"] ."'";

    if ($conn->query($sql) === TRUE) {
        // if the query executed successfully, take the user back to the settings page
        header("Location: settings.php");
    } else {
        // if there was an error, tell the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // close the database connection at the end
    $conn->close();

?>
