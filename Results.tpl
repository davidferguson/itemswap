<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://www.notifree.ml/favicon.ico">

    <title>NotiFree</title>

    <!-- Bootstrap core CSS -->
    <link href="http://www.notifree.ml/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for notifree -->
    <link href="http://www.notifree.ml/jumbotron.css" rel="stylesheet">

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
                <a class="navbar-brand" href="http://www.notifree.ml/" id="mainTitle">NotiFree</a>
                <a href="http://www.notifree.ml/">
                    <div id="logo"><img src="http://www.notifree.ml/ntfr-logo.png" id="mainLogo" /></div>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="navbar-right" style="margin-top: 4px;">
                                    <form action="http://www.notifree.ml/search.php" method="post">
                                    <div class="form-group" style="float:left;margin:0px;font-size:20px;">
                                        <input id="searchnav" type="text" placeholder="Search for items" class="form-control" name="search">
                                    </div>
                                    <button id="initSearchnav" type="submit" class="btn btn-success" style="float:left;margin:0px;">Search</button>
                                    <br>
                                    <select id="localeSetnav" name="location">
                                        <option value="United Kingdom" disabled="" selected="">Select your location</option>
                                        <option value="renfrew">Renfrew Scotland</option>
                                        <option value="AberdeenUK">Aberdeen</option>
                                        <option value="AberdeenshireWestFreecycle">Aberdeenshire West, Upper Donside &amp; Upper Deeside</option>
                                        <option value="AirdrieUK">Airdrie</option>
                                        <option value="ArbroathUK">Arbroath</option>
                                        <option value="freecycleayr">Ayr</option>
                                        <option value="BathgateFreecycle">Bathgate</option>
                                        <option value="BerwickshireUK">Berwickshire</option>
                                        <option value="freecyclefifecentral">Central Fife</option>
                                        <option value="freecycleclacks">Clackmannanshire</option>
                                        <option value="cumbernauld-freecycle">Cumbernauld</option>
                                        <option value="Dumbarton">Dumbarton</option>
                                        <option value="Dumfries-GallowayFreecycle">Dumfries &amp; Galloway</option>
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
                                        <option value="PerthSouthUKFreecycle">Perth &amp; Kinross</option>
                                        <option value="RoxburghshireUK">Roxburghshire</option>
                                        <option value="SaltcoatsUK">Saltcoats</option>
                                        <option value="freecycleshetland">Shetland</option>
                                        <option value="skyelochalshfreecycle">Skye &amp; Lochalsh</option>
                                        <option value="QueensferryUK">South Queensferry</option>
                                        <option value="stirlingcityfreecycle">Stirling City</option>
                                        <option value="WestFifeScotland">West Fife</option>
                                        <option value="WesternIslesUK">Western Isles (Outer Hebrides)</option>
                                        <option value="Wick">Wick</option>
                                    </select>
                                </form></div>
            </div>
        </div>
    </nav>

    <!-- Main area -->
    <div id="mainContent3">
        <div id="lwall"></div>
        <div id="rwall"></div>
        <h1 style="font-size:200%;text-align:center">Results Page</h1>
        % for item in items:
            <a href="{{item["url"]}}" style="text-decoration:none;">
                <div class="searchedItem">
                    <img class="searchedImg" src="{{item["image"]}}"/>
                    <h1 class="searchedWord">{{item["title"]}}</h1>
                    <p class="searchedDesc">{{item["description"]}}</p>
                    <p class="searchedLoc">{{item["location"]}}</p>
                </div>
            </a>
        % end
    </div>

    <script>
        function left() {
            document.getElementById("lwall").style.height = document.getElementById("mainContent3").style.height;
        }

        function right() {
            document.getElementById("rwall").style.height = document.getElementById("mainContent3").style.height;
        }

        function body() {
            var heighty = (document.getElementsByClassName("searchedItem").length) * 175;
            document.getElementById("mainContent3").style.height = (heighty + 100) + "px";
            console.log(document.getElementsByClassName("searchedItem").length);
        }
        body()
        left()
        right()
    </script>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="http://www.notifree.ml/js/bootstrap.min.js"></script>
</body>

</html>
