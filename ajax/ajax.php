<?php
	include("../includes/config.php");
	include("../includes/classes/db.php");
	include("../includes/classes/auth.php");
	include("../includes/functions.php");
	
	$uid=$auth->get_id();
	
	extract($_REQUEST);


	if ($cmd=='check_email' && $email!="") {
		$row = $db->mysql_get_row("members","email","email='$email'");
		//$result = $db->make_query("select email from members where email='$email' ");
		//$row = mysqli_fetch_array($result);
		if ($row) {
			echo 1;
		}
		else{
			echo 0;
		}
		//echo print_r($row);
	}

	else if($cmd=='suggestp' && $query!=''){
		
		$q=$query;
		$result=$db->make_query("select c.*,s.id as s_id,s.name as state_name from cities c,states s where c.state_id=s.id and c.name like '$q%' order by id limit 0,15");
		$suggestions='';
		$data='';
		while($row=mysqli_fetch_array($result)){
			//$suggestions.="'".$row['code'].' - '.$row['name'].' - '.get_weight($row['weight'])."',";
			$suggestions.="'".$row['name'].',  '.$row['state_name']."',";
			$data.="'".$row['id']."',";
		}
		$suggestions=rtrim($suggestions,",");
		$data=rtrim($data,",");
		
	$str="{
 query:'$q',
 suggestions:[$suggestions],
 data:[$data]
}";
		echo $str;
	}	


		
	
	
?>