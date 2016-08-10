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
          <a class="navbar-brand" href="index.html" id="mainTitle">NotiFree</a>
          <a href = "index.html"><div id="logo"><img src="ntfr-logo.png" id="mainLogo"/></div></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
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
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main area -->
    <div id="mainContent3">
      <div id="lwall"></div>
      <div id="rwall"></div>
		% for item in items:
			<div class="searchedItem">
			  <img class="searchedImg" src="{{item["image"]}}"/>
			  <h1 class="searchedWord">{{item["title"]}}</h1>
			  <p class="searchedDesc">{{item["description"]}}</p>
			  <p class="searchedLoc">{{item["location"]}}</p>  
			</div>
		% end
    </div>

    <script>
      function left () {document.getElementById("lwall").style.height = document.getElementById("mainContent3").style.height;}
      function right () {document.getElementById("rwall").style.height = document.getElementById("mainContent3").style.height;}
      function body () {
        var heighty = (document.getElementsByClassName("searchedItem").length) * 150;
        document.getElementById("mainContent3").style.height = heighty + "px";
        console.log(document.getElementsByClassName("searchedItem").length);
      }
      body()
    </script>



    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
