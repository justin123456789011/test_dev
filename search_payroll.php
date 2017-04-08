<?php 
	
	require('connection.php');
	$search_name = $_POST['empname'];
	$output1 = '';
	$query2 = mysql_query("select tbl_employee_bcli.id,tbl_employee_bcli.emp_name,tbl_employee_bcli.company_name,tbl_employee_bcli.designation,tbl_payroll_bcli.cola_rate,tbl_payroll_bcli.rate,tbl_payroll_bcli.no_of_working_days,tbl_payroll_bcli.from_date,tbl_payroll_bcli.to_date,tbl_payroll_bcli.total_regular_wage,tbl_payroll_bcli.RD_RH,tbl_payroll_bcli.SH_RH,tbl_payroll_bcli.RD_hours,tbl_payroll_bcli.SH_hours,tbl_payroll_bcli.RD_amt,tbl_payroll_bcli.SH_amt,tbl_payroll_bcli.cola,tbl_payroll_bcli.total_wage,tbl_payroll_bcli.m_salary, tbl_deductions_bcli.ded_wtax,tbl_deductions_bcli.ded_sss,tbl_deductions_bcli.ded_medicare,tbl_deductions_bcli.ded_pagibig,tbl_deductions_bcli.ded_salaryloan from tbl_employee_bcli inner join tbl_payroll_bcli on tbl_employee_bcli.id = tbl_payroll_bcli.id inner join tbl_deductions_bcli on tbl_employee_bcli.id = tbl_deductions_bcli.id where tbl_employee_bcli.emp_name like '%".$search_name."%'") or die(mysql_error());
	
	if(mysql_num_rows($query2) > 0) {
		$output1.= '<div class = "table-responsive">
					<table class = "table table-bordered">
					<tr>
						<th>ID</th>
						<th>Employee Name</th>
						<th>Company Name</th>
						<th>Designation</th>
						<th>Rate</th>
						<th>Number of Working Days</th>
						<th>From Date</th>
						<th>To Date</th>
						<th>Total Regular Wage</th>
						<th>RD_Hours</th>
						<th>RD_RH</th>
						<th>RD_Amt</th>
						<th>SH_Hours</th>
						<th>SH_RH</th>
						<th>SH_Amt</th>
						<th>COLA Rate</th>						
						<th>COLA</th>
						<th>Total Wage</th>
						<th>Withholding Tax</th>
						<th>SSS</th>
						<th>Medicare</th>
						<th>PAGIBIG</th>
						<th>Salary Loan</th>			
						<th>Total Salary</th>			
					</tr>
			
		';
		
		while($row2 = mysql_fetch_array($query2)) {
			$output1.= '<tr>
						<td>'.$row2['id'].'</td>
						<td>'.$row2['emp_name'].'</td>
						<td>'.$row2['company_name'].'</td>			
						<td>'.$row2['designation'].'</td>
						<td>'.$row2['rate'].'</td>
						<td>'.$row2['no_of_working_days'].'</td>
						<td>'.$row2['from_date'].'</td>
						<td>'.$row2['to_date'].'</td>
						<td>'.$row2['total_regular_wage'].'</td>
						<td>'.$row2['RD_hours'].'</td>
						<td>'.$row2['RD_RH'].'</td>
						<td>'.$row2['RD_amt'].'</td>
						<td>'.$row2['SH_hours'].'</td>
						<td>'.$row2['SH_RH'].'</td>
						<td>'.$row2['SH_amt'].'</td>
						<td>'.$row2['cola_rate'].'</td>
						<td>'.$row2['cola'].'</td>
						<td>'.$row2['total_wage'].'</td>
						<td>'.$row2['ded_wtax'].'</td>
						<td>'.$row2['ded_sss'].'</td>
						<td>'.$row2['ded_medicare'].'</td>
						<td>'.$row2['ded_pagibig'].'</td>
						<td>'.$row2['ded_salaryloan'].'</td>
						<td>'.$row2['m_salary'].'</td>			
						</tr>
			';
		}
		echo $output1;
	} else {
		echo 'No Data Found';
	}


?>