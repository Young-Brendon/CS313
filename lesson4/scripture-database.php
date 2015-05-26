<?php	
		$dbName = "mydb";		
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
        $dbUser = 'test';
        $dbPassword = 'test';
		  		  
		echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br />\n";		 
     
		$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	
		$statement = $db->prepare('SELECT book, chapter, verse, content FROM scripture');
		$statement->execute();
		
	
	
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
		<?php	
			$dbName = "mydb";		
			$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
			$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
			$dbUser = 'test';
			$dbPassword = 'test';
		  		  
			echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br />\n";		 
     
			$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	
			$statement = $db->prepare('SELECT book, chapter, verse, content FROM scripture');
			$statement->execute();		
		
			echo '<p>';
			while($item = $statement->fetch(PDO::FETCH_ASSOC)) {
				echo $item['book'];
				echo $item['chapter'];:
				echo $item['verse'];-
				echo $item['content'];'<br>''<br>' }
			echo '</p>';
		?>		
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>