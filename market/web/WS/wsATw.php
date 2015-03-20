<?php

class login {

    private $db;

    // Constructor - open DB connection
    function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'test');
        $this->db->autocommit(FALSE);
    }

    // Destructor - close DB connection
    function __destruct() {
        $this->db->close();
    }

    // Main method to redeem a code
    function redeem() {
    	session_start();
        // Check for required parameters
        if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
        
            // Put parameters into local variables
            $login_username = $_POST["login_username"];
            $login_userpass1 = $_POST["login_userpass"];
            
			$login_userpass=md5($login_userpass1);
			$avisa=0;
            // Look up code in database
            $user_id = 0;
            $stmt = $this->db->prepare('SELECT name,id FROM tst_users WHERE login=? AND password=?');
            $stmt->bind_param("ss", $login_username, $login_userpass);
            $stmt->execute();
            $stmt->bind_result($login_username,$login_id);
            while ($stmt->fetch()) {
				$avisa=1;
                break;
            }
            $stmt->close();
            			
			if($avisa==0)
			{
				return false;
			}
			else
			{
			   $_SESSION['username']	= $login_username;
			   $_SESSION['userid']	= $login_id;
				return true;
			}

        }
       
        return false;
    	
    }

}

$api = new login;
$est=$api->redeem();
if($est==true)
{ echo 'Correcto';}
else
{ echo 'Incorrect';}

?>