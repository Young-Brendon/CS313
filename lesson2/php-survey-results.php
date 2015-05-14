<?php
	
	function color($filecontents, $blue, $red, $green, $yellow, $purple, $black, $other) {
	
		$count = array("Blue"=>"0", "Red"=>"0", "Green"=>"0", "Yellow"=>"0", "Purple"=>"0", "Black"=>"0", "Other"=>"0");
		foreach ($filecontents as $key) {
			$key = str_replace(array("\r", "\n"), "", $key);
			switch ($key) {
				case $blue:
					$count['Blue']++;
					break;
				case $red:
					$count['Red']++;
					break;
				case $green:
					$count['Green']++;
					break;
				case $yellow:
					$count['Yellow']++;
					break;
				case $purple:
					$count['Purple']++;
					break;
				case $black:
					$count['Black']++;
					break;
				case $other:
					$count['Other']++;
					break;
			}
		}
		return $count;
	}
	
	function food($filecontents, $pizza, $lasagna, $tacos, $hamburgers, $hotdogs, $other) {
	
		$count = array("Pizza"=>"0", "Lasagna"=>"0", "Tacos"=>"0", "Hamburgers"=>"0", "HotDogs"=>"0","Other"=>"0");
		foreach ($filecontents as $key) {
			$key = str_replace(array("\r", "\n"), "", $key);
			switch ($key) {
				case $pizza:
					$count['Pizza']++;
					break;
				case $lasagna:
					$count['Lasagna']++;
					break;
				case $tacos:
					$count['Tacos']++;
					break;
				case $hamburgers:
					$count['Hamburgers']++;
					break;
				case $hotdogs:
					$count['Hotdogs']++;
					break;
				case $other:
					$count['Other']++;
					break;
			}
		}
		return $count;
	}
	
	function leagueMarried($filecontents, $yes, $no) {
	
		$count = array("Yes"=>"0", "No"=>"0");
		foreach ($filecontents as $key) {
			$key = str_replace(array("\r", "\n"), "", $key);
			switch ($key) {
				case $yes:
					$count['Yes']++;
					break;
				case $no:
					$count['No']++;
					break;
			}
		}
		return $count;
	}
	
	function percentage($val1, $val2, $precision) {
	
		$division = $val1 / $val2;
		$res = $division * 100;
		$res = round($res, $precision);
		return $res;
	}
	
	function tally($array){
	
		$total = array_sum($array);
		foreach($array as $x => $x_value) {
			echo $x . " = " . percentage($x_value, $total, 1) . "%" . "<br>";
		}
	}
	
	$color = $food = $league = $married = "";
	
	if (isset($_POST['color'])){
		$color = $_POST['color'] . "\r\n";
	}
	
	if (isset($_POST['food'])){
		$food = $_POST['food'] . "\r\n";
	}
	
	if (isset($_POST['league'])){
		$league = $_POST['league'] . "\r\n";
	}
	
	if (isset($_POST['married'])){
		$married = $_POST['married'] . "\r\n";
	}
	
	$myfile = fopen("survey-results.txt", "a+") or die("Unable to open file");
	fwrite($myfile, $color . $food . $league . $married);
	$filecontents = file("survey-results.txt");
	fclose($myfile);
	
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
		<h1>PHP Survey Results</h1>
		<form>
			What is your favorite color?<br>
			<?php echo tally(color($filecontents, 'color_blue', 'color_red', 'color_green', 'color_yellow', 'color_purple', 'color_black', 'color_other')) ;?><br>
			What is your favorite food?<br>
			<?php echo tally(food($filecontents, 'food_pizza', 'food_lasagna', 'food_tacos', 'food_hamburgers', 'food_hotdogs', 'food_other')) ;?><br>
			Do you play League of Legends?<br>
			<?php echo tally(leagueMarried($filecontents, 'league_yes', 'league_no')) ;?><br>
			Are you married?<br>
			<?php echo tally(leagueMarried($filecontents, 'married_yes', 'married_no')) ;?><br>
		</form>		
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>