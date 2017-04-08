<?php 
	
	require('connection.php');
	session_start();
	if(isset($_POST['comname'])) {
		
	$company2 = $_POST['comname'];
	$output1 = '';
	$query2 = mysql_query("select tbl_employee_bcli.id,tbl_employee_bcli.emp_name,tbl_employee_bcli.company_name,tbl_employee_bcli.designation,tbl_payroll_bcli.rate,tbl_payroll_bcli.cola_rate,tbl_payroll_bcli.no_of_working_days,tbl_payroll_bcli.from_date,tbl_payroll_bcli.to_date,tbl_payroll_bcli.total_regular_wage,tbl_payroll_bcli.RD_RH,tbl_payroll_bcli.SH_RH,tbl_payroll_bcli.RD_hours,tbl_payroll_bcli.SH_hours,tbl_payroll_bcli.RD_amt,tbl_payroll_bcli.SH_amt,tbl_payroll_bcli.cola,tbl_payroll_bcli.total_wage,tbl_payroll_bcli.m_salary, tbl_deductions_bcli.ded_wtax,tbl_deductions_bcli.ded_sss,tbl_deductions_bcli.ded_medicare,tbl_deductions_bcli.ded_pagibig,tbl_deductions_bcli.ded_salaryloan from tbl_employee_bcli inner join tbl_payroll_bcli on tbl_employee_bcli.id = tbl_payroll_bcli.id inner join tbl_deductions_bcli on tbl_employee_bcli.id = tbl_deductions_bcli.id where tbl_employee_bcli.company_name = '$company2'") or die(mysql_error());
	
	if(mysql_num_rows($query2) > 0) {
		$output1.= '<div class = "table-responsive">
					<table class = "table table-bordered">
		';
		
		while($row2 = mysql_fetch_array($query2)) {
			$output1.= '<tr>
						<td>
						<br /><b>'.$row2['company_name'].'</b><br />
						For The Period From: '.$row2['from_date'].' To: '.$row2['to_date'].'<br /><br />
						<b>'.$row2['emp_name'].'</b><br />
						Total Regular Wage: '.$row2['no_of_working_days'].' Days x '.$row2['rate'].'/Day = &nbsp'.$row2['total_regular_wage'].'<br />
						Regular Overtime: '.$row2['RD_hours'].' Hrs x '.$row2['RD_RH'].' /Hr = &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['RD_amt'].'<br />
						Sun/Hol Overtime: '.$row2['SH_hours'].' Hrs x '.$row2['SH_RH'].' /Hr = &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['SH_amt'].'<br />
						Ecola:'.$row2['no_of_working_days'].' Days x '.$row2['cola_rate'].' /Day = &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['cola'].'<br />
						Total Gross:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['total_wage'].'<br />
						<b>Deductions:</b><br />
						Tax Withheld: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['ded_wtax'].'<br />
						SSS: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['ded_sss'].'<br />
						Medicare: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['ded_medicare'].'<br />
						PAGIBIG: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['ded_pagibig'].'<br />
						Salary Loan: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['ded_salaryloan'].'<br />		
						<b>Net Amount Received:</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row2['m_salary'].'<br />

						</td>
						

						</tr>
			';
			
			
		}
		echo $output1;
	} else {
		echo 'No Data Found';
	}

	}
?>