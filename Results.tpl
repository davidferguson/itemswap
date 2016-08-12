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
                                        <option value="renfrew">Renfrew Scotland (Scotland, United Kingdom)</option>
                                        <option value="AberdeenUK">Aberdeen (Scotland, United Kingdom)</option>
                                        <option value="AberdeenshireWestFreecycle">Aberdeenshire West, Upper Donside &amp; Upper Deeside (Scotland, United Kingdom)</option>
                                        <option value="AirdrieUK">Airdrie (Scotland, United Kingdom)</option>
                                        <option value="ArbroathUK">Arbroath (Scotland, United Kingdom)</option>
                                        <option value="freecycleayr">Ayr (Scotland, United Kingdom)</option>
                                        <option value="BathgateFreecycle">Bathgate (Scotland, United Kingdom)</option>
                                        <option value="BerwickshireUK">Berwickshire (Scotland, United Kingdom)</option>
                                        <option value="freecyclefifecentral">Central Fife (Scotland, United Kingdom)</option>
                                        <option value="freecycleclacks">Clackmannanshire (Scotland, United Kingdom)</option>
                                        <option value="cumbernauld-freecycle">Cumbernauld (Scotland, United Kingdom)</option>
                                        <option value="Dumbarton">Dumbarton (Scotland, United Kingdom)</option>
                                        <option value="Dumfries-GallowayFreecycle">Dumfries &amp; Galloway (Scotland, United Kingdom)</option>
                                        <option value="freecycledundee">Dundee (Scotland, United Kingdom)</option>
                                        <option value="DunoonUK">Dunoon (Scotland, United Kingdom)</option>
                                        <option value="edunbartonfreecycle">East Dunbartonshire (Scotland, United Kingdom)</option>
                                        <option value="EastFifeUK">East Fife (Scotland, United Kingdom)</option>
                                        <option value="EastLothianUK">East Lothian (Scotland, United Kingdom)</option>
                                        <option value="Easter-RossFreecycle">Easter-Ross (Scotland, United Kingdom)</option>
                                        <option value="FreecycleEdinburgh">Edinburgh (Scotland, United Kingdom)</option>
                                        <option value="Ellon">Ellon (Scotland, United Kingdom)</option>
                                        <option value="FalkirkUK">Falkirk (Scotland, United Kingdom)</option>
                                        <option value="Galashiels_Freecycle">Galashiels / Selkirk (Scotland, United Kingdom)</option>
                                        <option value="GlasgowUK">Glasgow (Scotland, United Kingdom)</option>
                                        <option value="freecyclegrangemouth">Grangemouth (Scotland, United Kingdom)</option>
                                        <option value="GreenockUK">Greenock (Scotland, United Kingdom)</option>
                                        <option value="HamiltonLarkhall">Hamilton Larkhall (Scotland, United Kingdom)</option>
                                        <option value="helensburgh-freecycle">Helensburgh (Scotland, United Kingdom)</option>
                                        <option value="HuntlyUK">Huntly (Scotland, United Kingdom)</option>
                                        <option value="InvernessUK">Inverness and the Highland Region (Scotland, United Kingdom)</option>
                                        <option value="IrvineUK">Irvine (Scotland, United Kingdom)</option>
                                        <option value="IsleOfBute">Isle of Bute (Scotland, United Kingdom)</option>
                                        <option value="KilmarnockUK">Kilmarnock (Scotland, United Kingdom)</option>
                                        <option value="KintyreUK">Kintyre (Scotland, United Kingdom)</option>
                                        <option value="KirriemuirUK">Kirriemuir (Scotland, United Kingdom)</option>
                                        <option value="LanarkUK">Lanark (Scotland, United Kingdom)</option>
                                        <option value="freecyclelinlithgow">Linlithgow (Scotland, United Kingdom)</option>
                                        <option value="LivingstonUK">Livingston (Scotland, United Kingdom)</option>
                                        <option value="Freecycle-Midlothian">Midlothian (Scotland, United Kingdom)</option>
                                        <option value="montrose">Montrose (Scotland, United Kingdom)</option>
                                        <option value="morayfreecycle">Moray (Scotland, United Kingdom)</option>
                                        <option value="NorthwestSutherlandUK">Northwest Sutherland (Scotland, United Kingdom)</option>
                                        <option value="ObanNorthArgyllUK">Oban And North Argyll (Scotland, United Kingdom)</option>
                                        <option value="orkneyfreecycle_group">Orkney Islands (Scotland, United Kingdom)</option>
                                        <option value="paisley-freecycle">Paisley (Scotland, United Kingdom)</option>
                                        <option value="Peeblesshire_Freecycle">Peeblesshire (Scotland, United Kingdom)</option>
                                        <option value="PerthSouthUKFreecycle">Perth &amp; Kinross (Scotland, United Kingdom)</option>
                                        <option value="RoxburghshireUK">Roxburghshire (Scotland, United Kingdom)</option>
                                        <option value="SaltcoatsUK">Saltcoats (Scotland, United Kingdom)</option>
                                        <option value="freecycleshetland">Shetland (Scotland, United Kingdom)</option>
                                        <option value="skyelochalshfreecycle">Skye &amp; Lochalsh (Scotland, United Kingdom)</option>
                                        <option value="QueensferryUK">South Queensferry (Scotland, United Kingdom)</option>
                                        <option value="stirlingcityfreecycle">Stirling City (Scotland, United Kingdom)</option>
                                        <option value="WestFifeScotland">West Fife (Scotland, United Kingdom)</option>
                                        <option value="WesternIslesUK">Western Isles (Outer Hebrides) (Scotland, United Kingdom)</option>
                                        <option value="Wick">Wick (Scotland, United Kingdom)</option>
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
