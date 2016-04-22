<!DOCTYPE html>

<html>

<head>

	<title>AoX-Home Page</title>
	<link href="../static/style.css" rel="stylesheet"/>
  <link href="../static/table.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">

	$(document).ready(function () {
    	$('#type_sel').bind('change', function () {
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
  <li><a href="tips.html">Tips</a></li>
  <li><a href="search.php">Search Player</a></li>
  <li><a href="civsearch.php">Civilizations</a></li>
  <li><a href="unitsearch.php" class="active">Units</a></li>

  <ul style="float: right; list-style-type: none;">
  	<li><a href="register.php">Register</a></li>

  </ul>

</ul>

 <div id="pseudo"></div>
<div class="form-style-8">
  <h2>Search for a Unit</h2>
  <form method="POST" action="unitsearch.php">
    <input type="text" name="uName" placeholder="Unit Name" />
    <select name="unitType" id="type_sel">
        <option value="" disabled selected>Select Class</option>
        <option value = "regular">Regular</option>
        <option value = "unique">Unique</option>
    </select>
      <div class="container">
          <div class="unique">
              <select name="civ">
                  <option value="" disabled selected>In Civilisation</option>
                  <option value="britons">Britons</option>
                  <option value="byzantines">Byzantines</option>
                  <option value="celts">Celts</option>
                  <option value="chinese">Chinese</option>
                  <option value="franks">Franks</option>
                  <option value="goths">Goths</option>
                  <option value="japanese">Japanese</option>
                  <option value="mongols">Mongols</option>
                  <option value="persians">Persians</option>
                  <option value="saracens">Saracens</option>
                  <option value="teutons">Teutons</option>
                  <option value="turks">Turks</option>
                  <option value="vikings">Vikings</option>
              </select>
          </div>
      </div>
      <div class="container">
          <div class="regular">
              <select name="building">
                  <option value="" disabled selected>From Building</option>
                  <option value="archery range">Archery Range</option>
                  <option value="barracks">Barracks</option>
                  <option value="castle">Castle</option>
                  <option value="monastery">Monastery</option>
                  <option value="siege workshop">Siege Workshop</option>
                  <option value="stable">Stable</option>
                  <option value="town center">Town Centre</option>
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

    if($_POST['uName'] != '')
    {
      $name = $_POST['uName'];

      $query = "SELECT * from unit where un_name = '$name'";
      $results = mysql_query($query, $conn) or die("Error:".mysql_error());


      if(mysql_num_rows($results) == 0)
      echo "No such unit found";

     else
     {
        echo "<div class='CSSTableGenerator'><table>
                <tr>
                    <th>Unit Name<th>Hit Points<th>Attack<th>Melee Armour<th>Pierce Armour<th>Range<th>Production Building
                </tr>";
        
       while ($row = mysql_fetch_array($results)) 
       {
        echo "<tr><td>". $row['un_name']. "<td>". $row['hit_points']. "<td>". $row['attack']. "<td>". $row['melee_armour']. "<td>". $row['pierce_armour']. "<td>". $row['attack_range']. "<td>". $row['from_building']. "</tr>";
       }
       echo "</table></div>";

    }
  }
    else
    {
      if($_POST['unitType'] == "regular")
      {
        $building = $_POST['building'];

        $query = "SELECT * from unit where from_building = '$building'";

        $results = mysql_query($query, $conn) or die("Error:".mysql_error());


        if(mysql_num_rows($results) == 0)
        echo "No such unit found";

       else
       {
          echo "<div class='CSSTableGenerator'><table>
                  <tr>
                      <th>Unit Name<th>Hit Points<th>Attack<th>Melee Armour<th>Pierce Armour<th>Range<th>Production Building
                  </tr>";
          
         while ($row = mysql_fetch_array($results)) 
         {
          echo "<tr><td>". $row['un_name']. "<td>". $row['hit_points']. "<td>". $row['attack']. "<td>". $row['melee_armour']. "<td>". $row['pierce_armour']. "<td>". $row['attack_range']. "<td>". $row['from_building']. "</tr>";
         }
         echo "</table></div>";


      }
    }

      else if($_POST['unitType'] == "unique")
      {
        $civName = $_POST['civ'];
        $query = "SELECT uq_name, hit_points, attack, melee_armour, pierce_armour, attack_range from unique_unit, civilization where uq_name = civilization.unique_unit and civilization.civ_name = '$civName'";

        $results = mysql_query($query, $conn) or die("Error:".mysql_error());


        if(mysql_num_rows($results) == 0)
        echo "No such unit found";

       else
       {
        echo "<div class='CSSTableGenerator'><table>
                  <tr>
                      <th>Unit Name<th>Hit Points<th>Attack<th>Melee Armour<th>Pierce Armour<th>Range
                  </tr>";
         while ($row = mysql_fetch_array($results)) 
         {
          echo "<tr><td>". $row['uq_name']. "<td>". $row['hit_points']. "<td>". $row['attack']. "<td>". $row['melee_armour']. "<td>". $row['pierce_armour']. "<td>". $row['attack_range']."</tr>";
         }
         echo "</table></div>";
      }

    }

  }



  }

?>