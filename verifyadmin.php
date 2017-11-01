<?php
	$admin_id=$_POST['username'];
	$pass=$_POST['password'];
	if(isset($admin_id)&&isset($pass)) {
		escapeshellarg($admin_id);
		escapeshellcmd($admin_id);
		htmlentities($admin_id);
		strip_tags($admin_id);
		
		// Connect to database jdwnrh_findadoc
		$mysqli=new mysqli("localhost","root","","jdwnrh_findadoc");
		if($mysqli->errno) {
			echo "connection Unsuccessfull<br/>";
		}
		else { //if connection is successful
			$query="SELECT * FROM admin_info";
			$qresp=$mysqli->query($query);
			while($qresp_arr=$qresp->fetch_row()) {
				$db_u=$qresp_arr[0];
				$db_p=$qresp_arr[2];
			}
			if($db_u==$admin_id && $db_p==$pass) {
				include('login_success.php');
			} else {
				include('login_incorrect.html');
			}
		}
	} else {
		echo ("Error! Response from Server: Username or password field left empty.");
	}
?>