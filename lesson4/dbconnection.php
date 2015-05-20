<?php
	
	global $db;
	
	function loadDatabase() {		

		$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

		if ($openShiftVar === null || $openShiftVar == "") {
			// Not in the openshift environment
			$dbHost = "localhost";
			$dbUser = "root";
			$dbPassword = "";
			$dbName = "mydb";	
			
		} else { 
          // In the openshift environment
          $dbHost = "127.11.68.2"; 
		  $dbport = "3306";
          $dbUser = "admind39KZ2E";
          $dbPassword = "m9aFsKDNDrUF";
		  $dbName = "mydb";
		} 
     
		$db = new PDO("mysql:host=$dbHost;port=$dbport;dbname=$dbName", $dbUser, $dbPassword);

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