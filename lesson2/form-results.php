<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	if (isset($_POST['major'])) {
		$major = $_POST['major'];
		} else
			$major = "unknown";		
	
	$comment = $_POST['comment'];
	?>

<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
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
		<form>
			Welcome <?php echo $name; ?><br><br>
			Your email address is: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br><br>
			Your major is: <?php echo $major; ?><br><br>
			The places you have visited: <?php if (isset($_POST['places'])) {$place = $_POST['places']; foreach($place as $key => $value) { echo $value . " ";} } else { echo 'No places selected.'; } ?><br><br>
			Your comments: <?php echo $comment; ?>
		</form>
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>