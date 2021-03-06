<?php
	error_reporting(E_ALL);
    ini_set("display_errors", 1);
	include 'dbconnection.php';
	$db = loadDatabase();
	$items = getScriptureItems();	
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
		<h1>Scripture Resources</h1>
		<?php foreach($items as $item) : ?>
		<?php echo $item['book']; ?>
		<?php echo $item['chapter']; ?>:
		<?php echo $item['verse']; ?>-
		<?php echo $item['content']; ?><br><br>
		<?php endforeach;?>		
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>