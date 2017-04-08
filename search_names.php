<?php 
	
	require('connection.php');
	if(isset($_POST['company_name'])) {
	$c1 = $_POST['company_name'];
	$output1 = '';
	$query2 = mysql_query("select * from tbl_employee_bcli where company_name = '$c1'") or die(mysql_error());
	
	if(mysql_num_rows($query2) > 0) {
		$output1.= '<div class = "table-responsive">
					<table class = "table table-bordered">
					<tr>
						<th>ID Number</th>
						<th>Employee Name</th>
						<th>Company Name</th>
						<th>Designation</th>
					</tr>
			
		';
		
		while($rows = mysql_fetch_array($query2)) {
			$output1.= '<tr>
						<td>'.$rows["id"].'</td>
						<td><a href = "payroll_calc.php?id='.$rows["id"].'">'.$rows["emp_name"].'</a></td>
						<td>'.$rows["company_name"].'</td>
						<td>'.$rows["designation"].'</td>
						</tr>
			';
		}
		echo $output1;
	} else {
		echo 'Invalid Company';
	}

	}
?>