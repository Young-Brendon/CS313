<?php
	error_reporting(E_ALL);
    ini_set("display_errors", 1);
	include 'lesson4/dbconnection.php';
	$db = loadDatabase();
	$items = getGalleryImages();	
	
?>

<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title>Brendon Young - CS 313</title>
		<link href="/style.css" type="text/css" rel="stylesheet" media="screen" >
		<script>
            function upload() {
                var xmlhttp;
                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","upload.php",true);
                xmlhttp.send();
            }
        </script>
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
					<li><a href="/gallery.php" title="Gallery">Gallery</a></li>
				</ul>
			</nav>
		</div>
		<div id="myDiv">
			<h2>Gallery</h2>
			<p>Feel free to post a picture of nature that you enjoy and/or comment on any picture.  Please only upload family appropriate
			images and make pg rated comments.  Any violations will be removed.  Use the button to upload a picture.
			<button type="button" onclick="upload()">Upload a picture</button></p>
		
			<?php foreach($items as $item) : ?>
			<div id="galleryLayout">
				<h2><?php echo $item['title']; ?></h2><br>
				<img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" /><br>
				Caption: <?php echo $item['caption']; ?><br><br>
				<div id="comments">
					Comments: <?php echo $item['comments']; ?><br><br>
					<?php echo $item['date']; ?>
					<form action ="addcomment.php" method ="post">
						Add a comment:
						<textarea name="comment" rows="5" cols="40"></textarea><br><br>
						<input type="submit">
					</form>
				</div><br><br>
			</div>
			<?php endforeach;?>
		</div>
		<footer id="footer">
			<p>&copy; - Brendon Young 2015</p>
		</footer>
	</body>
</html>