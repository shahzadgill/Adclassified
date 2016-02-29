<?php
	class User extends Database{
		function __construct(){
			parent::__construct();
		}

		function user_info($uid){
			$arr = array();
			$check = $this->mysql_get_row('members','*','id='.$uid);
			$arr = array('name' => $check['name'], 'email' => $check['email'], 'id' => $check['id'], 'pic' => $check['pic']);
			return $arr;
			//die(print_r($check['name']));
	    }

	   

	    function userid(){
	    	return $GLOBALS['u_id'];
	    }


	}
	$user = new User();
?>