<?php
	
	global $db;
	function loadDatabase() {
		
		$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
        		
        $dbName = "mydb";				 
     
		$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		return $db;

	}
	
	function getScriptureItems() {      
		
		$query = "SELECT book, chapter, verse, content FROM scriptures ORDER BY id";
		return DbSelect($query);
    }
	
	function getGalleryImages() {
	
		$query = "SELECT * FROM pictures INNER JOIN comments ON pictures.pictures_id = comments.pictures_id";
		return DbSelect($query);
	}
	
	function getComments() {
	
		$query = "SELECT * FROM comments ORDER BY comments_id";
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
	
	function insertComments($comments) {
	
		$date = date_create()->format('Y-m-d');
		$query = "INSERT INTO comments(comments, date)";
		$query .= "VALUES :comments, :date)";
		$commentsid = DbInsert($query, array(':comments' => $comments, ':date' =>$date));		
	}
	
	function DbInsert($query, $params = null) {        

        global $db;
        $return = false;    

        try {
            $statement = $db->prepare($query);
            if (is_array($params)) {
                foreach ($params as $key => $value) {
                    $statement->bindValue($key, $value);
                }
            }
            $statement->Execute();
            $return = $db->lastInsertId();
        }

        catch (Exception $e) {
            echo "There was an error, please try again later.";
            error_log($e);
            exit();
        }
        return $return;
    }
	
?>
