<!DOCTYPE html>

<html>

<head>

    <title>AoX-Home Page</title>
    <link href="../static/style.css" rel="stylesheet" />
    <link href="../static/table.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">

	$(document).ready(function () {
    	$('#decide').bind('change', function () {
	        var elements = $('div.container').children().hide(); // hide all the elements
	        var value = $(this).val();

	        if (value.length) { // if somethings' selected
	            elements.filter('.' + value).show(); // show the ones we want
	        }
	    }).trigger('change'); // Setup the initial states
	});

    </script>


    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>


</head>

<body>


    <ul class="navigation">

        <li><a href="index.php">Home</a></li>
        <li><a href="tips.html" role="button">Tips</a></li>
        <li><a href="search.php">Search Player</a></li>
        <li><a href="civsearch.php" class="active">Civilizations</a></li>
        <li><a href="unitsearch.php">Units</a></li>

        <ul style="float: right; list-style-type: none;">
            <li><a href="register.php">Register</a></li>

        </ul>

    </ul>

    <div id="findgame">

        <!--   <p>This is your portal to Age of Empires 2 Multiplayer gaming. A solid match making algorithm finds a player closest to your skill level to ensure a match is
            never one sided. Enter your Player ID below if you're already registered.<br>
            <br>Player ID &nbsp<input type="text" name="playerID"/><br><br>Password&nbsp<input type="password" name="password"/><br><br><br>
            <a href="#log" id="login">Go</a>
            <a href="#newreg" id="new">New User?</a>
          </p>
         -->
        <div id="pseudo"></div>
        <div class="form-style-8">
            <h2>Look for a Civilization</h2>
            <form method="POST" action="civsearch.php">

                <input type="text" name="civ_name" placeholder="Civilization" />

                <select name="object" id="decide">
                    <option value="" disabled selected>that has</option>
                    <option value="uniqueunit">Unique Unit</option> <!--Done-->
                    <option value="unit">Unit</option>              <!--Done-->
                    <option value="research_unique">Unique Research</option>    <!--Done-->
                    <option value="research">Research</option>          <!--Done-->
                    <option value="building">Building</option>      <!--Done-->
                </select>

                <!--Search based on Unique Unit-->
                <div class="container">
                    <div class="uniqueunit">

                        <select name="unique_unit">
                            <option value="" disabled selected>Select Unique Unit</option>
                            <option value="berserk">Berserk</option>
                            <option value="cataphract">Cataphract</option>
                            <option value="chu ko nu">Chu Ko Nu</option>
                            <option value="huskarl">Huskarl</option>
                            <option value="janissary">Janissary</option>
                            <option value="longbowman">Longbowman</option>
                            <option value="mangudai">Mangudai</option>
                            <option value="mameluke">Mameluke</option>
                            <option value="samurai">Samurai</option>
                            <option value="teutonic knight">Teutonic Knight</option>
                            <option value="throwing axeman">Throwing Axeman</option>
                            <option value="war elephant">War Elephant</option>
                            <option value="woad raider">Woad Raider</option>
                        </select>
                    </div>
                </div>

                <!--Search based on regular unit-->
                <div class="container">
                    <div class="unit">

                        <select name="unit_sel">
                            <option value="" disabled selected>Select Unit</option>
                            <option value="arbalest">Arbalest</option>
                            <option value="bombard cannon">Bombard Cannon</option>
                            <option value="camel">Camel</option>
                            <option value="elite cannon galleon">Elite Cannon Galleon</option>
                            <option value="paladin">Paladin</option>
                        </select>

                    </div>
                </div>

                <!--Search based on unique research-->
                <div class="container">
                    <div class="research_unique">
                        <select name="res_unique">
                            <option value="" disabled selected>Select Unique Research</option>
                            <option value="anarchy">Anarchy</option>
                            <option value="artillery">Artillery</option>
                            <option value="bearded axe">Bearded Axe</option>
                            <option value="berserkergang">Berserkergang</option>
                            <option value="crenellations">Crenellations</option>
                            <option value="drill">Drill</option>
                            <option value="furor celtica">Furor Celtica</option>
                            <option value="katapurato">Katapurato</option>
                            <option value="logistica">Logistica</option>
                            <option value="mahaouts">Mahaouts</option>
                            <option value="rocketry">Perfusion</option>
                            <option value="yeomen">Yeomen</option>
                            <option value="zealotry">Zealotry</option>
                        </select>
                    </div>
                </div>

                <!--Search based on a Research-->
                <div class="container">
                    <div class="research">
                        <select name="sel_research">
                            <option value="" disabled selected>Select Research</option>
                            <option value="architecture">Architecture</option>
                            <option value="atonement">Atonement</option>
                            <option value="block printing">Block Printing</option>
                            <option value="bloodlines">Bloodlines</option>
                            <option value="crop rotation">Crop Rotation</option>
                        </select>
                    </div>
                </div>

                <!--Search based on a building-->
                <div class="container">
                    <div class="building">
                        <select name="civ_build">
                            <option value="" disabled selected>Select Building</option>
                            <option value="bombard tower">Bombard Tower</option>
                            <option value="fortified wall">Fortified Wall</option>
                            <option value="keep">Keep</option>
                        </select>
                    </div>
                </div>


                        <input type="submit" name="search" value="Go!" />
            </form>
        </div>


    </div>

</body>

</html>

<?php

    error_reporting(0);
    
    if(isset($_POST['search']))
    {

        $username="root";
        $password="tdkdetective";
        $database="aoe2db";

        $conn = mysql_connect('localhost',$username,$password);

        @mysql_select_db($database) or die( "Unable to select database");

        if($_POST['civ_name'] != '')
        {
            $civName = $_POST['civ_name'];
            $query = "SELECT * from civilization where civ_name = '$civName'";
        }

        else
        {
            if($_POST['object'] == "uniqueunit")
            {
                $un_unit = $_POST['unique_unit'];
                $query = "SELECT * from civilization where civilization.unique_unit = '$un_unit'";
            }

            else if($_POST['object'] == "unit")
            {
                $sel_unit = $_POST['unit_sel'];
                $query = "SELECT civilization.civ_name, civilization.unique_unit, civilization.unique_tech, civilization.wonder from civilization, civ_has_unit as look where look.un_name = '$sel_unit' and look.civ_name = civilization.civ_name";
            }

            //enter code for "all units of building"

            else if($_POST['object'] == 'research_unique')
            {
                $un_res = $_POST['res_unique'];
                $query = "SELECT * from civilization where unique_tech = '$un_res'";    
            }

            else if($_POST['object'] == 'research')
            {
                $research = $_POST['sel_research'];
                $query = "SELECT civilization.civ_name, civilization.unique_unit, civilization.unique_tech, civilization.wonder from civilization, civ_has_research as look where look.res_name = '$research' and civilization.civ_name = look.civ_name";
            }

            //enter code for "all researches of building"

            else if($_POST['object'] == 'building')
            {
                $building = $_POST['civ_build'];
                $query = "SELECT civilization.civ_name, civilization.unique_unit, civilization.unique_tech, civilization.wonder from civilization, civ_has_buildings as look where look.build_name = '$building' and civilization.civ_name = look.civ_name";
            }
        }

        $results = mysql_query($query, $conn) or die("Error:".mysql_error());

        if(mysql_num_rows($results) == 0)
        echo "No such civilization found";

        else
        {
            echo "<div class='CSSTableGenerator'><table>
                    <tr>
                        <th>Civilization<th>Unique Unit<th>Unique Technology<th>Wonder
                    </tr>";
            while ($row = mysql_fetch_array($results)) 
            {
              echo "<tr><td>". $row['civ_name'], "<td>". $row['unique_unit']. "<td>". $row['unique_tech']. "<td>". $row['wonder']. "</tr>";
            }
            echo "</table> </div>";
        }

    }

?>