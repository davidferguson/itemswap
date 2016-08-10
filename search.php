<?php

$search = $_POST["search"];
$location = $_POST["location"];

header("Location: http://www.notifree.ml:8080/search/" . $search . "/" . $location . "/");

?>
