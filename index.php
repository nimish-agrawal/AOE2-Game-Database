<!DOCTYPE html>

<html>

<head>

	<title>AoX-Home Page</title>
	<link href="../static/style.css" rel="stylesheet"/>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

</head>

<body>


<ul class="navigation">

  <li><a href="index.php" class="active" role="button">Home</a></li>
  <li><a href="tips.html" role="button">Tips</a></li>
  <li><a href="search.php">Search Player</a></li>
  <li><a href="civsearch.php">Civilizations</a></li>
  <li><a href="unitsearch.php">Units</a></li>

  <ul style="float: right; list-style-type: none;">
  	<li><a href="register.php">Register</a></li>

  </ul>

</ul>

<div id="findgame">

 <div id="pseudo"></div>

      <div class="row" style="width:400px; height:200px; display:table-cell;">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="../static/game.png">
              <span class="card-title">Player Search</span>
            </div>
            <div class="card-content">
              <p>Search for a friend or a foe</p>
            </div>
            <div class="card-action">
              <a href="search.php">Go!</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="width:400px; height:200px;display:table-cell">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="../static/civs.jpg">
              <span class="card-title">Search for a Civilization</span>
            </div>
            <div class="card-content">
              <p>Advanced Civilization search</p>
            </div>
            <div class="card-action">
              <a href="civsearch.php">Go!</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="width:400px; height:200px; display:table-cell">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="../static/units.jpg">
              <span class="card-title">Unit Search</span>
            </div>
            <div class="card-content">
              <p>Advanced Unit Search</p>
            </div>
            <div class="card-action">
              <a href="unitsearch.php">Go!</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="width:400px; height:200px; display:table-cell">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="../static/register.png">
              <span class="card-title">Register</span>
            </div>
            <div class="card-content">
              <p>Register yourself!</p>
            </div>
            <div class="card-action">
              <a href="register.php">Go!</a>
            </div>
          </div>
        </div>
      </div>

</body>

</html>