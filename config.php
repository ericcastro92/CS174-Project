
<script type="text/javascript" src="./js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="./js/jquery-latest.js"></script> 
<script type="text/javascript" src="./js/jquery.tablesorter.js"></script> 
<link href="css/bootstrap.min.css" rel="stylesheet">

<?php 

	//include "navbar.php";
	include "dbconnect.php";

	$sessionId = session_id();
	if(empty($sessionId)) session_start();
		

	/*function open($path, $name) {
		$db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
		$sql = "INSERT INTO session SET sessionID =" . $db->quote($sessionId) . ", session_data = '' ON DUPLICATE KEY UPDATE last_access = NOW()";
		$db->query($sql);
	}
	
	function read($sessionId) {
		$db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
 
		$sql = "SELECT favorites FROM session where sessionID =" . $db->quote($sessionId);
		$result = $db->query($sql);
		$data = $result->fetchColumn();
		$result->closeCursor();
	 
		return $data;
	}

	function write($sessionId, $data) {
		$db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
		$fav = $_SESSION["favorites"];
		$userID = $_COOKIES["loggedIn"];
	 
		$sql = "INSERT INTO session SET sessionID =" . $db->quote($sessionId) . ", favorites =" . $db->quote($data) . " ON DUPLICATE KEY UPDATE favorites =" . $db->quote($data);
		$db->query($sql);
	}
	
	function close() {
		$sessionId = session_id();
		//perform some action here
	}

	function destroy($sessionId) {
		$db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
	 
		$sql = "DELETE FROM session WHERE sessionID =" . $db->quote($sessionId);
		$db->query($sql);
	 
		setcookie(session_name(), "", time() - 3600);
	}
	
	function gc($lifetime) {
		$db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
	 
		$sql = "DELETE FROM session WHERE last_access < DATE_SUB(NOW(), INTERVAL " . $lifetime . " SECOND)";
		$db->query($sql);
	}*/

?>
