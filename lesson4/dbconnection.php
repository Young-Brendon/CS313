<?php
	
	global $db;
	
	function loadDatabase() {		

		$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
		$dbport = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$dbName = "mydb";	 
     
		$db = new PDO("mysql:host=$dbHost;$dbport;dbname=$dbName", "admind39KZ3E", "m9aFsKDNDrUF");

		return $db;
	}
	
	function getScriptureItems() {      
		
		$query = "SELECT book, chapter, verse, content FROM scriptures ORDER BY id";
		return DbSelect($query);
    }

	function DbSelect($query, $params = null) {        

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