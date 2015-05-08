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
		
		<form action ="team-readiness-activity-results.php" method ="post">
			Name: <input type="text" name="name"><br><br>
			Email: <input type="text" name="email"><br><br>
			Major: <br>
			<input type="radio" name="major" value="Computer Science">Computer Science
			<input type="radio" name="major" value="Web Design and Development">Web Design and Development
			<input type="radio" name="major" value="Computer Information Technology">Computer Information Technology
			<input type="radio" name="major" value="Computer Engineering">Computer Engineering<br><br>
			Places you have visited: <br>
			<input type="checkbox" name="places[]" value="North America">North America
			<input type="checkbox" name="places[]" value="South America">South America
			<input type="checkbox" name="places[]" value="Europe">Europe
			<input type="checkbox" name="places[]" value="Asia">Asia
			<input type="checkbox" name="places[]" value="Australia">Australia
			<input type="checkbox" name="places[]" value="Africa">Africa
			<input type="checkbox" name="places[]" value="Antarctica">Antarctica<br><br>
			Comments: <br>
			<textarea name="comment" rows="5" cols="40"></textarea><br><br>
			<input type="submit">
		</form>
		
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>