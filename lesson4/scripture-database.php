<!DOCTYPE html>
<html>
<head>
	<title>Team Scripture Activity</title>
</head>

<body>
<h2>Scriptures:</h2>
<?php
$dbName = 'mydb';
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
try
{
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", "admind39KZ2E", "*DCE3CCA271D1422BEA4A87C3CDC5695507D3BA60");
	$statement = $db->prepare('SELECT book, chapter, verse, content FROM scripture');
	$statement->execute();
    echo '<p>';
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':';
		echo $row['verse'] . '</b>' . ' - "' . $row['content'] . '"<br/>';
	}
    
    echo '</p>';
}
catch (Exception $ex)
{
	echo "Can't connect to DB. Exception: $ex";
	die();
}
?>
</body>
</html>