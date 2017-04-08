<?php 
	
	require('connection.php');
	
		if (isset($_POST['submit1'])) {	
		
			$username = $_POST['user1'];
			$password = $_POST['pass1'];
			
			$query = @mysql_query("select * from loginadmin_db where username = '$username' and pwd = '$password'");
			
			$numrows = mysql_num_rows($query);
			
			if($numrows > 0) {
				header("Location:index.php");
			} else {
				echo "Invalid Username or Password. Please Try Again";
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

    <title>Consolidated Payroll System</title>

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

	<div class = "container">
	<br /><br /><br /><br />
		<div class = "panel panel-primary">
		<div class = "panel-heading">Login Form</div>
			<div class = "panel-body">
				<form action = "" method = "POST">
					<div class = "form-group">
					<label for ="username">Enter Your Username</label>
					<input type = "text" class = "form-control" name = "user1"/>
					</div>
					<div class = "form-group">
					<label for = "password">Enter Your Password</label>
					<input type = "password" class = "form-control" name = "pass1" />
					</div>
					<div class = "form-group">
					<input type = "submit" class = "btn btn-primary" name = "submit1"/>
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
