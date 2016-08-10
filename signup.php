<?php

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
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["cpassword"]);

    // check that the passwords match, are at least 6 characters, and contain a number
    if ( $password != $confirm_password ) {
        echo "Passwords did not match";
        break;
    }
    
    if ( strlen($password) < 6 ) {
        echo "Password was not of minimum length";
        break;
    }

    if(1 != preg_match('~[0-9]~', $password)) {
        echo "Password must contain numbers";
        break;
    }

    // generate the SELECT mysql query
    $sql = "INSERT INTO users VALUES ('0', '" . $username . "', '" . $password . "', '" . $email . "')";

    //
    if ($conn->query($sql) === TRUE) {
        // if the query executed successfully, take the user back to the homepage
        header("Location: /");
    } else {
        // if there was an error, tell the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>
