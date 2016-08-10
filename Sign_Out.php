<?php

  // destroy the session, and take the user back to the home page
  session_start();
  session_destroy();
  header("Location: /");

?>
