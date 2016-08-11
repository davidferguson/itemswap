<?php

    // proides a link between the PHP form, and the Python search backend

    $search = $_POST["search"];
    $location = $_POST["location"];

    if ( $_POST["savesearch"] ) {
        // we need to save this search in the database
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
        
        // escape the data for the database
        $search = mysqli_real_escape_string($conn, $search);
        $location = mysqli_real_escape_string($conn, $location);

        // generate the SELECT mysql query
        $sql = "INSERT INTO searches VALUES ('0', '" . $search . "', '" . $_SESSION["username"] . "', '" . $location . "', '" . time() . "')";

        // now run the query, and check the result
        if ($conn->query($sql) != TRUE) {
            // if there was an error, tell the user
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // now take the user to the result page
    header("Location: http://www.notifree.ml:8080/search/" . $search . "/" . $location . "/");

?>
