<?php 
	require('connection.php');
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
	<script src = "printjs/printjs/printThis.js"></script>
<script>
	$(document).ready(function(){
		$('#scom').change(function(){
			var scom = $(this).val();
			$.ajax({
				type:'POST',
				url:'search_payslip.php',
				data:'comname='+scom,
				success:function(data) {
					$('#result2').html(data);
				}
			});
		});
	});
</script>
<script>
	$(function () { 
	$("#btn").click(function () {
	$("#result2").printThis();
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
			<select name = "scom" id = "scom" class = "form-control">
				<option value = ""selected>Select Company</option>
						<option value = "Benedicto Cebu Link, Inc">BCLI</option>
						<option value = "Benedicto Steel Corporation">BSC</option>
						<option value = "CLB Engineering and Supply, Inc">CLB</option>
						<option value = "CLB GLOBAL TRADING">GLOBAL</option>
			</select>
		</div>
		<div class = "form-group">
		<input type = "button" value = "Print" class = "btn btn-primary" id = "btn"/>
		</div>
	</form>
	
	<div id = "result2">
			
	</div>
	</div>
    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
