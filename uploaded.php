<?php
	error_reporting(E_ALL);
    ini_set("display_errors", 1);
	
	include 'results.php';
	
	$title = $_POST['title'];
	$filename = $_POST['filename'];
	$caption = $_POST['caption'];
	
	$image_dir = 'images';
	$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;
	
	if (isset($_FILES['filename'])) {
		$filename = $_FILES['filename']['name'];
		if (emplty($filename)) {
			break;
		}
		$source = $_FILES['filename']['tmp_name'];
		$target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
		move_uploaded_file($source, $target);
		
		process_image($image_dir_path, $filename);
	}
	
	
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
		<h1>Uploaded</h1>
		<p>Your picture has been uploaded.  Visit the Gallery page to view your picture.</p>
		
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>