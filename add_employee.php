<?php 

	require('connection.php');
	
	if(isset($_POST['save_emp'])) {
		$empname1 = $_POST['empname1'];
		$designation1 = $_POST['designation1'];
		$company = $_POST['company'];
		
		$query = mysql_query("insert into tbl_employee_bcli values(NULL,'$empname1','$company','$designation1')") or die(mysql_error());
		

		if($query == true) {
			echo "Successfully Added Employee";
		}else {
			echo mysql_error();
		}
				
	}
	
	
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

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
	<div class = "container">
	<?php include('menu.php'); ?>
  <div class = "panel panel-primary">
			<div class = "panel-heading">Add Employee</div>
			<div class = "panel-body">
				<form action = "" method = "POST">
					<div class = "form-group">
					<label for ="fullname">Enter Employee's Fullname</label>
						<input type = "text" name = "empname1" class = "form-control">						
					</div>
					<div class = "form-group">	
					<select name = "company" class = "form-control">
						<option value = ""selected>Select Company Name</option>
						<option value = "Benedicto Cebu Link, Inc">BCLI</option>
						<option value = "Benedicto Steel Corporation">BSC</option>
						<option value = "CLB Engineering and Supply, Inc">CLB</option>
						<option value = "CLB GLOBAL TRADING">GLOBAL</option>
						</select>
					</div>
					<div class = "form-group">
						<select name = "designation1" class = "form-control">
							<option value = ""selected>Select Designation</option>
							<option value = "Administration">Administration</option>
							<option value = "Warehouse">Warehouse</option>
						</select>
					</div>
					<div class = "form-group">
						<input type = "submit" name = "save_emp" class = "btn btn-primary" value = "Add Employee">
					</div>
				</form>
			</div>
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
