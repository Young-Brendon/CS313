<?php
	
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Brendon Young - CS 313</title>
		<link href="/style.css" type="text/css" rel="stylesheet" media="screen" >
	</head>
	<body>
		<div id="header">
			<div id='banner'>
				<h1>Brendon Young - CS 313</h1>
			</div>
			<nav id='nav'>
				<ul id="navli">
					<li><a href="/index.php" title="Home">Home</a></li>
					<li><a href="/assignments.php" title="Assignments">Assignments</a></li>
				</ul>
			</nav>
		</div>
		<h1>PHP Survey</h1>
		<form action="php-survey-results.php" method="session">
			What is your favorite color?<br>
			<input type="radio" name="color" value="color_blue">Blue
			<input type="radio" name="color" value="color_red">Red
			<input type="radio" name="color" value="color_green">Green
			<input type="radio" name="color" value="color_yellow">Yellow
			<input type="radio" name="color" value="color_purple">Purple
			<input type="radio" name="color" value="color_black">Black
			<input type="radio" name="color" value="color_other">Other<br><br>
			What is your favorite food?<br>
			<input type="radio" name="food" value="food_pizza">Pizza
			<input type="radio" name="food" value="food_lasagna">Lasagna
			<input type="radio" name="food" value="food_tacos">Tacos
			<input type="radio" name="food" value="food_hamburgers">Hamburgers
			<input type="radio" name="food" value="food_hot_dogs">Hot Dogs
			<input type="radio" name="food" value="food_other">Other<br><br>
			Do you play League of Legends?<br>
			<input type="radio" name="league" value="league_yes">Yes
			<input type="radio" name="league" value="league_no">No<br><br>
			Are you married?<br>
			<input type="radio" name="married" value="married_yes">Yes
			<input type="radio" name="married" value="married_no">No<br><br>
			<input type="submit"><br><br>
			<a href='/lesson2/php-survey-results.php'>Survey Results</a>
		</form>
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>