<?php
		//error_reporting(E_ALL ^ E_NOTICE);
		@mysql_connect("localhost","root","Welcome1") or die(mysql_error());
		@mysql_select_db("payroll_db") or die(mysql_error());
		
		
?>