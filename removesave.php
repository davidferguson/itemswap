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
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
   

    

    // generate the SELECT mysql query
    $sql = "DELETE FROM `searches` WHERE username = '".$_SESSION["username"]."' AND id = '".$id."'";

    //
    if ($conn->query($sql) === TRUE) {
        // if the query executed successfully, take the user back to the homepage
        header("Location: settings.php");
    } else {
        // if there was an error, tell the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>
