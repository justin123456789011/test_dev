<?php 
	require('connection.php');
	$query = mysql_query("select * from tbl_employee_bcli") or die(mysql_error());
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
	<script src = "jqueryui/jquery-3.1.1.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
	$('document').ready(function(){
		$('#search_text').keyup(function(){
			var txt = $(this).val();
			if(txt != '') 
			{
				$.ajax({
					url:"search.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}
			else {
				$('#result').html('');
				$.ajax({
					url:"search.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}
		});
	});
	
</script>
<script>
	$(document).ready(function(){
		$('#company1').change(function(){
			var company1 = $(this).val();
			$.ajax({
				type:'POST',
				url:'search_names.php',
				data: 'company_name=' + company1,
				success:function(data) {
					$('#result').html(data);
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
	<form action = "" method = "POST" enctype='multipart/form-data'>
		<div class = "form-group">
		<div class = "input-group">
		<span class = "input-group-addon">Search</span>
		<input type = "text" name = "search" class = "form-control" id = "search_text"/>
		</div>
		</div>
		<div class = "form-group">
			<select name = "company1" class = "form-control" id = "company1">
						<option value = ""selected>Search By Company</option>
						<option value = "Benedicto Cebu Link, Inc">BCLI</option>
						<option value = "Benedicto Steel Corporation">BSC</option>
						<option value = "CLB Engineering and Supply, Inc">CLB</option>
						<option value = "CLB GLOBAL TRADING">GLOBAL</option>
			</select>
		</div>
		</form>
		
		<br />
		<div id = "result">
	<table class = "table table-bordered">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Employee Name</th>
						<th>Company Name</th>
						<th>Designation</th>
					</tr>
				</thead>
				
				<tbody>
					<?php while($row = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><a href = "payroll_calc.php?id=<?php echo $row['id']?>"><?php echo $row['emp_name']; ?></a></td>
						<td><?php echo $row['company_name']; ?></td>
						<td><?php echo $row['designation']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
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
