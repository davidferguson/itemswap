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
                    session_start();
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
                        <span class="navbar-brand" href="index.php" id="welcomeTitle">Welcome <?php echo $_SESSION["username"]; ?></span>
                        <a href="Sign_Out.php" class="btn btn-info" role="button" style="margin-top:8px;">Sign Out</a>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>

    <!-- Main area -->
    <div id="mainContent" style="margin-top: -16px;">
        <div class="container">
            <!-- search form - contains search box, location chooser and submit button -->
            <form action="search.php" method="post">
                <input id="search" type="search" placeholder="Search for items" name="search">
                <input id="initSearch" type="submit" value="Search">
                <select id="localeSet" name="location">
                    <option value="United Kingdom" disabled selected>Select your location</option>
                    <option value="renfrew">Renfrew Scotland</option>
                    <option value="AberdeenUK">Aberdeen</option>
                    <option value="AberdeenshireWestFreecycle">Aberdeenshire West, Upper Donside & Upper Deeside</option>
                    <option value="AirdrieUK">Airdrie</option>
                    <option value="ArbroathUK">Arbroath</option>
                    <option value="freecycleayr">Ayr</option>
                    <option value="BathgateFreecycle">Bathgate</option>
                    <option value="BerwickshireUK">Berwickshire</option>
                    <option value="freecyclefifecentral">Central Fife</option>
                    <option value="freecycleclacks">Clackmannanshire</option>
                    <option value="cumbernauld-freecycle">Cumbernauld</option>
                    <option value="Dumbarton">Dumbarton</option>
                    <option value="Dumfries-GallowayFreecycle">Dumfries & Galloway</option>
                    <option value="freecycledundee">Dundee</option>
                    <option value="DunoonUK">Dunoon</option>
                    <option value="edunbartonfreecycle">East Dunbartonshire</option>
                    <option value="EastFifeUK">East Fife</option>
                    <option value="EastLothianUK">East Lothian</option>
                    <option value="Easter-RossFreecycle">Easter-Ross</option>
                    <option value="FreecycleEdinburgh">Edinburgh</option>
                    <option value="Ellon">Ellon</option>
                    <option value="FalkirkUK">Falkirk</option>
                    <option value="Galashiels_Freecycle">Galashiels / Selkirk</option>
                    <option value="GlasgowUK">Glasgow</option>
                    <option value="freecyclegrangemouth">Grangemouth</option>
                    <option value="GreenockUK">Greenock</option>
                    <option value="HamiltonLarkhall">Hamilton Larkhall</option>
                    <option value="helensburgh-freecycle">Helensburgh</option>
                    <option value="HuntlyUK">Huntly</option>
                    <option value="InvernessUK">Inverness and the Highland Region</option>
                    <option value="IrvineUK">Irvine</option>
                    <option value="IsleOfBute">Isle of Bute</option>
                    <option value="KilmarnockUK">Kilmarnock</option>
                    <option value="KintyreUK">Kintyre</option>
                    <option value="KirriemuirUK">Kirriemuir</option>
                    <option value="LanarkUK">Lanark</option>
                    <option value="freecyclelinlithgow">Linlithgow</option>
                    <option value="LivingstonUK">Livingston</option>
                    <option value="Freecycle-Midlothian">Midlothian</option>
                    <option value="montrose">Montrose</option>
                    <option value="morayfreecycle">Moray</option>
                    <option value="NorthwestSutherlandUK">Northwest Sutherland</option>
                    <option value="ObanNorthArgyllUK">Oban And North Argyll</option>
                    <option value="orkneyfreecycle_group">Orkney Islands</option>
                    <option value="paisley-freecycle">Paisley</option>
                    <option value="Peeblesshire_Freecycle">Peeblesshire</option>
                    <option value="PerthSouthUKFreecycle">Perth & Kinross</option>
                    <option value="RoxburghshireUK">Roxburghshire</option>
                    <option value="SaltcoatsUK">Saltcoats</option>
                    <option value="freecycleshetland">Shetland</option>
                    <option value="skyelochalshfreecycle">Skye & Lochalsh</option>
                    <option value="QueensferryUK">South Queensferry</option>
                    <option value="stirlingcityfreecycle">Stirling City</option>
                    <option value="WestFifeScotland">West Fife</option>
                    <option value="WesternIslesUK">Western Isles (Outer Hebrides)</option>
                    <option value="Wick">Wick</option>
                </select>
                <?php
                    session_start();
                    if( isset($_SESSION["username"] ) ) {
                ?>
                <input name="savesearch" type="checkbox" id="savesearch">
                <label id="boxLab" for="savesearch">Save this search</label>
                <?php
                  }
                ?>
            </form>
        </div>
    </div>

    <!-- scrolling gallery - to be implemented -->
    <strong><h1 style="font-size:200%;text-align:center;color:#ffffff">Items you might want to consider...</h1></strong>
    <div id="gallery">
        <div id="container">
            <div class="photobanner">
                <a href=""></a><img id="img1" class="first" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img2" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img3" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img4" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img5" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img6" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img1-1" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img1-2" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img1-3" class="img" src="ntfr-logo.png" alt="" /></a>
                <a href=""><img id="img1-4" class="img" src="ntfr-logo.png" alt="" /></a>
            </div>
            <!--Goes from 1-6 then back to 1-->
        </div>
    </div>


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
    </script>
    <script>
        
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
          if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            document.getElementById("img1").src = data[0].image;
            document.getElementById("img1").parentElement.href = data[0].url;
            document.getElementById("img2").src = data[1].image;
            document.getElementById("img2").parentElement.href = data[1].url;
            document.getElementById("img3").src = data[2].image;
            document.getElementById("img3").parentElement.href = data[2].url;
            document.getElementById("img4").src = data[3].image;
            document.getElementById("img4").parentElement.href = data[3].url;
            document.getElementById("img5").src = data[4].image;
            document.getElementById("img5").parentElement.href = data[4].url;
            document.getElementById("img6").src = data[5].image;
            document.getElementById("img6").parentElement.href = data[5].url;
            document.getElementById("img1-1").src = data[0].image;
            document.getElementById("img1-1").parentElement.href = data[0].url;
            document.getElementById("img1-2").src = data[1].image;
            document.getElementById("img1-2").parentElement.href = data[1].url;
            document.getElementById("img1-3").src = data[2].image;
            document.getElementById("img1-3").parentElement.href = data[2].url;
            document.getElementById("img1-4").src = data[3].image;
            document.getElementById("img1-4").parentElement.href = data[3].url;
          }
        };
        request.open("GET", "http://search.notifree.ml/homepage/", true);
        request.send();
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
