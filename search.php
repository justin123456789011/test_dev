<?php 
	require('connection.php');
	$search = $_POST['search'];
	$output = '';
	$query = "select * from tbl_employee_bcli where emp_name like '%".$search."%'";
	$query1 = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($query1) > 0) {
		$output.= '<div class = "table-responsive">
					<table class = "table table-bordered">
					<tr>
						<th>ID Number</th>
						<th>Employee Name</th>
						<th>Company Name</th>
						<th>Designation</th>
					</tr>
		';
		while($rows = mysql_fetch_array($query1)) {
			$output.= '
					<tr>	
						<td>'.$rows["id"].'</td>
						<td><a href = "payroll_calc.php?id='.$rows["id"].'">'.$rows["emp_name"].'</a></td>
						<td>'.$rows["company_name"].'</td>
						<td>'.$rows["designation"].'</td>
					</tr>
			';
		}
		echo $output;
	} else {
		echo 'No Data Found';
	}
?>