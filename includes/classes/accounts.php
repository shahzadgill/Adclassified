<?php
	class Accounts extends Database{
		function __construct(){
			parent::__construct();
		}

		function create_account($firstname,$lastname,$email,$password,$rpassword,$city_id){
	        $d=time();
	        $name = $firstname.$lastname;
	        $status = 'unlocked';
	        $logins = 1;
			$check = $this->mysql_get_row('members','email','email='.$email);
			if ($check) {
				return 0;
			}else{
				$arr = array('email' => $email, 'password' => $password, 'name' => $name, 'city_id' => $city_id, 'status' => $status, 'last_login' => $d, 'logins' => $logins);
				$result = $this->mysql_insert_array("members",$arr); 
				$uid=$this->last_id();
				return $uid;
			}
	    }

	    function user_login($login_email,$login_password){
			$d=time();
			$row = $this->mysql_get_row("members","*","email='$login_email' and password='$login_password'");
			if ($row) {
				//die('YES');
				$logins = $row['login']+1;
				$arr = array('last_login' => $d, 'logins' => $logins);
				//$this->mysql_update_row("update members set last_login=$d,logins=logins+1 where id=$row[id] ");
				$this->mysql_update_row("members",$arr,"id=".$row['id']);
				return $row['id'];
			}
			else{
				//die('NO');
				return 0;
			}
		}

	    function userid(){
	    	return $GLOBALS['u_id'];
	    }


	}
	$a = new Accounts();
?>