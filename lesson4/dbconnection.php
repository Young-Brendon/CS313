<?php
	
	global $db;
	
	function loadDatabase() {		

		
        $dbHost = "127.11.68.2";
        $dbUser = "admind39KZ2E";
        $dbPassword = "m9aFsKDNDrUF";
		$dbName = "mydb";		 
     
		$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

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