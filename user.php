<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }





	public function login($username,$password){
		if (strlen($password) < 3) return false;
		define("DB_host","localhost");
		define("DB_user","root");
		define("DB_pass","");
		define("DB_Name","miniproj");

		$conn = new mysqli(DB_host,DB_user,DB_pass,DB_Name);
		if (!$conn) {
			die("connection failed: ." . $connect_error);
		}
		$sql = "SELECT * FROM rblood";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();


		if($password == $row['password']){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
