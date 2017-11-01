<!DOCTYPE html>
<html>
<head>
	<title>Control Panel | JDWNRH</title>
	<link rel="shortcut icon" type="image/x-icon" href="jdwnrh_logo.png"/>
	<link rel="stylesheet" type="text/css" href="controlpanel_style.css"/>
</head>
<body>
<!-- Header Design html code goes here... -->
	<div id="firstheader">
		<div class="adminmenu">
			<button class="dropbtn"><img src="adm.png" style="width: 23px; height: 23px;"/>&ensp;Administrator</button>
				<div class="dropdown-content">
					<a href="acc_settings.html" style="vertical-align: middle"><img src="settings.png" class="menu-image"/>&ensp; Account Settings</a>
					<a href="add_doc.html"><img src="addoc.png" class="menu-image"/>&ensp; Add Doctor</a>
					<a href="remove_doc.html"><img src="remove.png" class="menu-image"/>&ensp; Remove Doctor</a>
					<a href="edit_doc.html"><img src="edit.png" class="menu-image"/>&ensp; Edit Doctor</a>
					<a href="logout.html"><img src="logout.ico" class="menu-image"/>&ensp; Log Out</a>
				</div>
		</div>
	</div>
	<div id="container">
		<div id="header">
			<img src="jdwnrh_logo.png" id="logocss"/><br/><br/>
			<h1><u>Doctor Control Panel</u></h1><br/>
		</div>
		
		<div id="doctorlistview">
			<table border="0" cellspacing="0" cellpadding="10" class="tableview">
				<tr>
					<th>Sl No.</th><th>Employee ID</th><th>Name</th><th>Specialization</th><th>Status</th><th>Till</th><th>Remarks</th>
				</tr>
				<?php
					$mysqli=new mysqli("localhost","root","","jdwnrh_findadoc");
					$doc_que=$mysqli->query("SELECT emp_id,name,specialization,status,till,remarks FROM doc_info order by name");
					$sl_no=1;
					$sts="";
					while($docarr=$doc_que->fetch_row()) {
						if($sl_no%2==0)
							echo '<tr bgcolor="#E0E0E0">';
						else
							echo '<tr bgcolor="#FFFFFF">';
						
						if($docarr[3]==0) {
							$sts="OUT";
							echo '<td>'.$sl_no.'</td><td>'.$docarr[0].'</td><td>'.$docarr[1].'</td><td>'.$docarr[2].'</td><td style="color:#F00"><input type="checkbox" class="statuscheck"/>&ensp;'.$sts.'</td><td>'.$docarr[4].'</td><td>'.$docarr[5].'</td></tr>';					
						} else {
							$sts="IN";
							echo '<td>'.$sl_no.'</td><td>'.$docarr[0].'</td><td>'.$docarr[1].'</td><td>'.$docarr[2].'</td><td style="color:#0F0"><input type="checkbox" class="statuscheck" checked/>&ensp;'.$sts.'</td><td>'.$docarr[4].'</td><td>'.$docarr[5].'</td></tr>';					
						}		
						$sl_no++;
					}
				?>
			</table>
		</div>
	</div>			
	<address id="footer">
		<br/><br/><p>Copyright &copy; 2017 | Jigme Dorji Wangchuk National Referral Hospital. All rights reserved.</p>
	</address>
</body>
</html>