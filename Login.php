<?php

    // define mysql server details
    $servername = "127.0.0.1";
    $dbusername = "notifree";
    $dbpassword = "prewired2016";
    $dbname     = "notifree";

    // connect to server, displaying message on error
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get the POST data, and escape it
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // generate the SELECT mysql query and run it
    $sql    = "SELECT * FROM `users` where username = '" . $username . "' and password = '" . $password . "'";
    $result = mysqli_query($conn, $sql);

    // check if the query executed successfully
    if ($result) {
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != 0) {
            // if the query executed successfully and produced a result, log the user in
            session_start();
            $_SESSION["username"] = $username;
            header("Location: /");
        } else {
            echo "not logged in";
        }
    } else {
        echo "MySQL Query Error";
    }
    $conn->close();

?>
