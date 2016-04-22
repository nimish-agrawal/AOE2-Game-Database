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
  <li><a href="search.php" class = "active">Search Player</a></li>
  <li><a href="civsearch.php">Civilizations</a></li>
  <li><a href="unitsearch.php">Units</a></li>

  <ul style="float: right; list-style-type: none;">
  	<li><a href="index.php">Login</a></li>
  	<li><a href="register.php">Contact Us</a></li>

  </ul>

</ul>
<div id="pseudo"></div>

<div id="header">Our awesome search tool lets you search for a friend or a foe in the Age of Empires 2 Community. Give it a try!</div>

  <!-- <input type = "text" name = "gTag" placeholder="Gamertag"> <br>
  <input type = "text" name = "name" placeholder="Name"> <br>
  <input type = "text" name = "rating" placeholder="Rating"> <br>
  <input id = "datepicker" name = "DOB" placeholder="Date of Birth"> <br> -->

  <div class="form-style-8">
  <h2>Enter what you know</h2>
  <form action="search.php" method="post">
    <input type="text" name="gTag" placeholder="Gamer Tag" />
    <input type="text" name="name" placeholder="Name" />
    <input type="number" name="rating" placeholder="Rating" />
    <input type="date" name="dob" placeholder="Date of Birth(DD-MM-YYYY)"> 
    <input type="submit" name="search" value="Search Player" />
  </form>
</div>



</body>

</html>


<?php

  if(isset($_POST['search']))
  {
    $username="root";
    $password="tdkdetective";
    $database="aoe2db";

    $conn = mysql_connect('localhost',$username,$password);

    @mysql_select_db($database) or die( "Unable to select database");


    if(isset($_POST['gTag']))
    {
      $gTag = $_POST['gTag'];

      $query = "SELECT * from player where gamertag = '$gTag'";
      $results = mysql_query($query, $conn) or die("Error: " .mysql_erro());

     while($row = mysql_fetch_array($results))
     {
          echo $row['p_name'];
     }      
    }
  
  }

?>
