<?php
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

   ?>
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

    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:0px;">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" id="mainTitle">NotiFree</a>
                <a href="index.php">
                    <div id="logo"><img src="ntfr-logo.png" id="mainLogo" /></div>
                </a>
            </div>
            <!-- navbar contains some PHP code to switch between login option and logout if you're already logged in -->
            <div id="navbar" class="navbar-collapse collapse">
                <?php
               
                    if( !isset($_SESSION["username"] ) ) {
                ?>
                    <!-- if the session is not set (and therefore no user is logged in), show the login form -->
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
                    <!-- if the session is set (and therefore a user is logged in), show the logout form -->
                    <div class="navbar-right">
                        <a href="settings.php">
                            <div id="logo"><img src="ntfr-settingssymbol.png" id="setLogo" /></div>
                        </a>
                        <span class="navbar-brand" href="index.php" id="mainTitle">Welcome <?php echo $_SESSION["username"]; ?></span>
                        <a href="Sign_Out.php" class="btn btn-info" role="button" style="margin-top:8px;">Sign Out</a>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>

    <!-- Main area -->
    <div id="mainContent4">
        <div id="lwall2" onLoad="left()"></div>
        <div id="rwall2" onLoad="right()"></div>
        <div class="container">
            <strong><h1 id="heading" style="font-size:300%">Account Settings</h1></strong>
                <p>
	            <form action="updatesettings.php" method="post">
	                <label class="setLab" for="changeMail" optional>Change your email:</label>
	                <input class="setting" id="changeMail" type="email" name="email" />
	                <br>
	                <label class="setLab" for="hoEm" optional>Minimum time between notifications (hours):</label>
	                <input class="setting" id="hoEm" type="number" min="0" max="24" />
	                <br>
	                <input class="setting2" type="submit" value="Change settings"/>
	            </form>
	        </p>
	        <p>
	            <div class="savedSearches">
	            	<h3>Saved Searches</h3>
	            	<table>
				<?php
					$sql = "SELECT * FROM `searches` WHERE username = '".$_SESSION["username"]."'";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result) ) {
				?>
				<tr>
			                <td>
			                	<label class="desc" for="unsubscribe"><?php echo $row["keywords"]; ?></label>	
			                </td>
			                <td>
				                <a href="removesave.php?id=<?php echo $row["id"]?>">
							<button type="button" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
					</td>
				</tr>
		                <?php
					}
				?>
			</table>
	            </div>
	        </p>
            </form>
        </div>
    </div>

    <script>
        function left() {
            document.getElementById("lwall2").style.height = document.getElementById("mainContent4").style.height;
        }

        function right() {
            document.getElementById("rwall2").style.height = document.getElementById("mainContent4").style.height;
        }
    </script>



    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
