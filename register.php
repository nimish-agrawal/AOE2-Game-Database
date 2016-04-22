<!DOCTYPE html>

<html>

<head>

	<title>AoX-Player Search</title>
	<link href="../static/style.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="../static/search.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

  <script type="text/javascript">
</script>

</head>

<body>


<ul class="navigation">

  <li><a href="index.php">Home</a></li>
  <li><a href="tips.html">Tips</a></li>
  <li><a href="search.php">Search Player</a></li>
  <li><a href="civsearch.php">Civilizations</a></li>
  <li><a href="unitsearch.php">Units</a></li>

  <ul style="float: right; list-style-type: none;">
  	<li><a href="index.php">Login</a></li>
  	<li><a href="register.php" class="active">Register</a></li>

  </ul>

</ul>
<div id="pseudo"></div>

  <div class="form-style-8">
  <h2>Fill this form to register</h2>
  <form action="register.php" method='post'>
    <input type="text" name="pName" placeholder="Player Name" />
    <input type="text" name="gTag" placeholder="Gamer Tag" />
    <input type="text" name="civName" placeholder="Favourite Civilization">
    <input type="number" name="rating" placeholder="Rating" />
    <input type="date" name="dob" placeholder="Date of Birth(DD-MM-YYYY)"> 
    <input type="number" name="played" placeholder="Number of matches played">
    <input type="number" name="won" placeholder="Number of matches won">
    <input type="submit" name="register" value="Register!" />
  </form>
</div>



</body>

</html>

<?php

if(isset($_POST['register']))
{
  $username="root";
  $password="tdkdetective";
  $database="aoe2db";

  $conn = mysql_connect('localhost',$username,$password);

  @mysql_select_db($database) or die( "Unable to select database");

  $pName=isset($_POST['pName']) ? $_POST['pName'] : '';
  $gTag=isset($_POST['gTag']) ? $_POST['gTag'] : '';
  $civName=isset($_POST['civName']) ? $_POST['civName'] : '';
  $rating=isset($_POST['rating']) ? intval($_POST['rating']) : '';
  $dob=isset($_POST['dob']) ? $_POST['dob'] : '';
  $played=isset($_POST['played']) ? intval($_POST['played']) : '';
  $won=isset($_POST['won']) ? intval($_POST['won']) : '';

  $query = "INSERT INTO player (p_name, gamertag, date_of_birth, civ_name, played, won, rating) VALUES('$pName','$gTag',
  '$dob','$civName','$played', '$won', '$rating')";
  $result = mysql_query($query, $conn) or die('Error'. mysql_error());
}

?>