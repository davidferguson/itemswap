<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>NotiFree</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php" id="mainTitle">NotiFree</a>
          <a href = "index.php"><div id="logo"><img src="ntfr-logo.png" id="mainLogo"/></div></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
    <?php
    session_start();
    if( !isset($_SESSION["username"] ) ) {
    ?>  
    
          <form class="navbar-form navbar-right" action="Login.php" method="post">
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" name="username">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a href="Sign_up.html" class="btn btn-info" role="button">Sign up</a>
          </form>
      <?php
    } else {
      ?>
      <div class="navbar-right">
       <span class="navbar-brand" href="index.html" id="mainTitle">Welcome <?php echo $_SESSION["username"]; ?></span>
            <a href="Sign_Out.php" class="btn btn-info" role="button" style="margin-top:8px;">Sign Out</a>
      </div>
      <?php
    }
      ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main area -->
    <div id="mainContent4">
      <div id="lwall2" onLoad="left()"></div>
      <div id="rwall2" onLoad="right()"></div>
      <div class="container">
        <strong><h1 id="heading" style="font-size:300%">Account Settings</h1></strong>
        <form action="updatesettings.php" method="post">
          <label class="setLab" for="changeMail" optional>Change your email:</label>
          <input class="setting" id="changeMail" type="email" name="email"/>
          <br>
          <label class="setLab" for="hoEm" optional>Minimum time between notifications (hours):</label>
          <input class="setting" id="hoEm" type="number" min="0" max="24"/>
          <br>
          <div class="savedSearches">
            <label class="desc" for="unsubscribe">Thing 1 (I have no imagination)</label>
            <label class="desc" for="unsubscribe">Unsubscribe</label>
            <input class="checker" id="unsubscribe" type="checkbox"/>
            <br>
            <label class="desc" for="unsubscribe">Thing 2</label>
            <label class="desc" for="unsubscribe">Unsubscribe</label>
            <input class="checker" id="unsubscribe" type="checkbox"/>
            <br>
            <label class="desc" for="unsubscribe">Thing 3</label>
            <label class="desc" for="unsubscribe">Unsubscribe</label>
            <input class="checker" id="unsubscribe" type="checkbox"/>
            <br>
            <label class="desc" for="unsubscribe">Thing 4</label>
            <label class="desc" for="unsubscribe">Unsubscribe</label>
            <input class="checker" id="unsubscribe" type="checkbox"/>
            <br>
          </div>
          <input class="setting2" type="submit"/>
        </form>
      </div>
    </div>

    <script>
      function left () {document.getElementById("lwall2").style.height = document.getElementById("mainContent4").style.height;}
      function right () {document.getElementById("rwall2").style.height = document.getElementById("mainContent4").style.height;}
    </script>



    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
