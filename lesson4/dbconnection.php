<?php
	
	global $db;
	
	function loadDatabase() {

		$dbHost = "";
		$dbPort = "";
		$dbUser = "";
		$dbPassword = "";
		$dbName = "mydb";
		$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

		if ($openShiftVar === null || $openShiftVar == "") {
			// Not in the openshift environment
			$dbHost = "localhost";
			$dbUser = "root";
			$dbPassword = "";			
			
		} else { 
		
          // In the openshift environment		  
		  echo "Using openshift credentials: ";
          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
		  $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
          $dbUser = 'test';
          $dbPassword = 'test';
		  		  
		  echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br />\n";
		} 
     
		$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		return $db;

	}
	
	function getScriptureItems() {      
		
		$query = "SELECT book, chapter, verse, content FROM scriptures ORDER BY id";
		return DbSelect($query);
    }

	function DbSelect($query, $params = null) {
	
		global $db;
        $return = array();        

        try {

            $statement = $db->prepare($query);
			if (is_array($params)) {
                foreach ($params as $key => $value) {
                    $statement->bindValue($key, $value);
                }
            }
            $statement->Execute();
            while ($row = $statement->fetch()) {
                $return[] = $row;
            }
        }
        catch (Exception $e) {
            echo "Database exception, try again later.";
            error_log($e);
            exit();
        }
        return $return;
    }
	
?>

<!DOCTYPE html>

</html>