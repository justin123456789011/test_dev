<?php 
	require('connection.php');
	session_start();
	$query10 = mysql_query("select tbl_employee_bcli.id,tbl_employee_bcli.emp_name,tbl_employee_bcli.company_name,tbl_employee_bcli.designation,tbl_payroll_bcli.rate,tbl_payroll_bcli.no_of_working_days,tbl_payroll_bcli.cola_rate,tbl_payroll_bcli.from_date,tbl_payroll_bcli.to_date,tbl_payroll_bcli.total_regular_wage,tbl_payroll_bcli.RD_RH,tbl_payroll_bcli.m_salary,tbl_payroll_bcli.SH_RH,tbl_payroll_bcli.RD_hours,tbl_payroll_bcli.SH_hours,tbl_payroll_bcli.RD_amt,tbl_payroll_bcli.SH_amt,tbl_payroll_bcli.cola,tbl_payroll_bcli.total_wage, tbl_deductions_bcli.ded_wtax,tbl_deductions_bcli.ded_sss,tbl_deductions_bcli.ded_medicare,tbl_deductions_bcli.ded_pagibig,tbl_deductions_bcli.ded_salaryloan from tbl_employee_bcli inner join tbl_payroll_bcli on tbl_employee_bcli.id = tbl_payroll_bcli.id inner join tbl_deductions_bcli on tbl_employee_bcli.id = tbl_deductions_bcli.id") or die(mysql_error());
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BCLI Payroll System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src = "jqueryui/jquery-3.1.1.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$('#search_name').keyup(function(){
				var search_name = $(this).val();
				$.ajax({
					type:'POST',
					url:'search_payroll.php',
					data:'empname='+ search_name,
					success:function(data) {
						$('#result1').html(data);
					}
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#company2').change(function(){
				var company2 = $(this).val();
				$.ajax({
					type:'POST',
					url:'search_payroll1.php',
					data:'companyname1='+ company2,
					success:function(data) {
						$('#result1').html(data);
					}
				});
			});
		});
	</script>
	
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
	<div class = "container">
	<?php include('menu.php'); ?>
	<form action = "" method = "POST">
		<div class = "form-group">
		<div class = "input-group">
			<span class = "input-group-addon">Search</span>
			<input type = "text" name = "search_name" id = "search_name" class = "form-control">
		</div>
		</div>
		
		<div class = "form-group">
			<select name = "company2" class = "form-control" id = "company2">
				<option value = ""selected>Search By Company</option>
						<option value = "Benedicto Cebu Link, Inc">BCLI</option>
						<option value = "Benedicto Steel Corporation">BSC</option>
						<option value = "CLB Engineering and Supply, Inc">CLB</option>
						<option value = "CLB GLOBAL TRADING">GLOBAL</option>
			</select>
		</div>
	</form>
	<div id = "result1">
	<div class = "table-responsive">
	<table class = "table table-bordered">
		<thead>
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
		</thead>
		
		<tbody>
		<?php while($row2 = mysql_fetch_array($query10)) { ?>
			<tr>
			<td><?php echo $row2['id']; ?></td>
			<td><?php echo $row2['emp_name']; ?></td>
			<td><?php echo $row2['company_name']; ?></td>			
			<td><?php echo $row2['designation']; ?></td>
			<td><?php echo $row2['rate']; ?></td>
			<td><?php echo $row2['no_of_working_days']; ?></td>
			<td><?php echo $row2['from_date']; ?></td>
			<td><?php echo $row2['to_date']; ?></td>
			<td><?php echo $row2['total_regular_wage']; ?></td>
			<td><?php echo $row2['RD_hours']; ?></td>
			<td><?php echo $row2['RD_RH']; ?></td>
			<td><?php echo $row2['RD_amt']; ?></td>
			<td><?php echo $row2['SH_hours']; ?></td>
			<td><?php echo $row2['SH_RH']; ?></td>
			<td><?php echo $row2['SH_amt']; ?></td>
			<td><?php echo $row2['cola_rate']; ?></td>
			<td><?php echo $row2['cola']; ?></td>
			<td><?php echo $row2['total_wage']; ?></td>
			<td><?php echo $row2['ded_wtax']; ?></td>
			<td><?php echo $row2['ded_sss']; ?></td>
			<td><?php echo $row2['ded_medicare']; ?></td>
			<td><?php echo $row2['ded_pagibig']; ?></td>
			<td><?php echo $row2['ded_salaryloan']; ?></td>
			<td><?php echo $row2['m_salary']; ?></td>
			
			</tr>
		<?php } ?>
		</tbody>
		
		
	</table>
	</div>
	<br />
	
	
	</div>
	</div>
    <!-- jQuery -->
     <script src="js/jquery.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
