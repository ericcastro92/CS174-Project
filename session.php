<?php

class Session
{
    ###########################################################################
    private $expiry = 3600;
    private $securityCode = "gnvriev847e8grdinvrdg5e8g4r7fr7rdvreh8^£*^£FGgyhf";
    private $tableName = "session_data";
    ###########################################################################
    private $dbh;

    function __construct(Database $db)
    {
        ini_set('session.cookie_lifetime', 0);
        ini_set('session.gc_maxlifetime', $this->expiry);
    }

    function open($save_path, $session_name)
    {
        return true;
    }

    function close()
    {
        return true;
    }

    function read($session_id)
    {
        $db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
 
		$sql = "SELECT favorites FROM session where sessionID =" . $db->quote($sessionId);
		$result = $db->query($sql);
		$data = $result->fetchColumn();
		$result->closeCursor();
	 
		return $data;
    }

    function write($session_id, $session_data)
    {
        $db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
		$fav = $_SESSION["favorites"];
		$userID = $_COOKIES["loggedIn"];
	 
		$sql = "INSERT INTO session SET sessionID =" . $db->quote($sessionId) . ", favorites =" . $db->quote($data) . " ON DUPLICATE KEY UPDATE favorites =" . $db->quote($data);
		$db->query($sql);
    }


    function destroy($session_id)
    {
        $db = new PDO("mysql:host=localhost;dbname=cs174", "root", "");
	 
		$sql = "DELETE FROM session WHERE sessionID =" . $db->quote($sessionId);
		$db->query($sql);
	 
		setcookie(session_name(), "", time() - 3600);
    }


    function clean($maxLifeTime)
    {
        try {
            $x = time() - $maxLifeTime;
            $stmt = $this->dbh->prepare("
                DELETE FROM :tableName
                WHERE session_expire < :x
            ");
            $stmt->bindParam("tableName", $this->tableName, PDO::PARAM_STR);
            $stmt->bindParam("x", $x, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return true;
    }

    function delete()
    {
        $oldID = session_id();
        session_regenerate_id();
        $this->destroy($oldID);
        session_unset();
        session_destroy();
    }


    function getActive()
    {
        $this->clean($this->expiry);
        try {
            $stmt = $this->dbh->prepare("
                SELECT COUNT(session_id) as count
                FROM :tableName
            ");
            $stmt->bindParam("tableName", $this->tableName, PDO::PARAM_STR);
            $stmt->execute();
            $rs = $stmt->fetch();
            return $rs['count'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

?>