
<h2>Upload a Picture</h2>
<p>Use the form to upload a picture.  All fields are required.
<form id="uploadForm" action="results.php" method="post">
	Title: <input type="text" name="title"><br><br>
	Image to be uploaded: 
	<input type="hidden" name="action" value="upload">
	<input type="file" name="filename"><br><br>
	Caption: <input type="text" name="caption">
	<input type="submit">
</form>