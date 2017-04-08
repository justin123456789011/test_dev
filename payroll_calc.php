<?php 
	
	require('connection.php');
	
	$id = $_GET['id'];
	
	$query = @mysql_query("select * from tbl_employee_bcli where id = '$id'") or die(mysql_error());
	$row = mysql_fetch_array($query);



	if(isset($_POST['s_payroll'])) {
		$emp_id = $id;
		$empname = $_POST['empname'];
		$designation = $_POST['designation'];
		$no_of_working_days = $_POST['no_of_working_days'];
		$rate = $_POST['rate'];
		$colarate = $_POST['colarate'];
		$cola = $_POST['cola'];
		$total_regular_wage = $_POST['t_wage'];
		$hours = $_POST['hours'];
		$amt = $_POST['total_amt'];
		$hours1 = $_POST['hours1'];
		$amt2 = $_POST['amt'];
		$rh = $_POST['rh'];
		$amt1 = $_POST['t_amt'];
		$total_wage = $_POST['t2'];
		$monthly_salary = $_POST['t_salary'];
		$from_date = $_POST['firstDate'];
		$to_date = $_POST['secondDate'];
		$sss = number_format($_POST['sss'],2);
		$medicare = number_format($_POST['medicare'],2);
		$pagibig = number_format($_POST['pagibig'],2);
		$wtax = number_format($_POST['w_tax'],2);
		$salaryloan = $_POST['s2'];

			$query1 = mysql_query("insert into tbl_payroll_bcli values('$emp_id','$no_of_working_days','$rate','$colarate','$cola','$total_regular_wage','$hours',$amt2,'$amt','$hours1',$rh,'$amt1','$total_wage','$monthly_salary','$from_date','$to_date')") or die(mysql_error());
			
			if($query1) {
					$query2 = mysql_query("insert into tbl_deductions_bcli(id,ded_sss,ded_medicare,ded_pagibig,ded_wtax,ded_salaryloan) values('$emp_id','$sss','$medicare','$pagibig','$wtax','$salaryloan')") or die(mysql_error());
					echo "Successfully Added Payroll";
				} else {
					echo mysql_error();
				}
			
				
	}
	
?>

<html>
<head>
<link rel = 'stylesheet' href = 'css/bootstrap.min.css' />
<link rel = 'stylesheet' href = 'css/bootstrap.css' />
<!-- <link rel = 'stylesheet' href = 'jqueryui/jquery-ui.min.css' /> -->
<link rel = 'stylesheet' href = 'jqueryui/jquery-ui.css' />

<script src = "jqueryui/jquery-3.1.1.js"></script>

<script src = 'js/bootstrap.min.js'></script>
<script src = 'js/bootstrap.js'></script>
<script src = "jqueryui/jquery-ui.js"></script>


<script type = "text/javascript">
 $(function() {
	$("#firstDate").datepicker({
		dateFormat: 'yy-mm-dd'
	}); 
	$("#secondDate").datepicker({
		dateFormat: 'yy-mm-dd',
		onSelect: function () {
        myfunc();
      	}
		}); 
	}); 
				
	function myfunc(){
       var start= $("#firstDate").datepicker("getDate");
    	var end= $("#secondDate").datepicker("getDate");
   		days = (end- start) / (1000 * 60 * 60 * 24);
        document.getElementById("no_of_working_days").value = Math.round(days);
		
       }
	   
	 function regular_days() {
		var rate = document.getElementById("rate").value;
		var o1 = 8;
		var o2 = 1.25;
		var g_total;
		
		g_total = rate / o1 * o2;
		
		document.getElementById("amt").value = g_total.toFixed(2);	
	 }		 
	 
	 function total_amt1() {
		var hours = document.getElementById("hours").value;
		var amt = document.getElementById("amt").value;
		var total_amt;
		
		total_amt = amt * hours;
		
		document.getElementById("total_amt").value = total_amt.toFixed(2);
	 }
	 
	 function sundays_holidays() {
		 var rate1 = document.getElementById("rate").value;
		 var p1 = 8;
		 var p2 = 1.30;
		 var h_total;
		 
		 h_total = rate1 / p1 * p2;
		 
		 document.getElementById("rh").value = h_total.toFixed(2);
		 
	 }
	 
	 function t_amt1() {
		var t_amt;
		var hours1 = document.getElementById("hours1").value;
		var rh = document.getElementById("rh").value;
		
		t_amt = rh * hours1;
		
		document.getElementById("t_amt").value = t_amt.toFixed(2);
		
	 }
	 
	 function cola1() {
		var working_days = document.getElementById("no_of_working_days").value;
		var cola_value = document.getElementById("cola_rate").value;
		var total_cola;
		total_cola = working_days * cola_value;
		document.getElementById("cola").value = total_cola;
	 }
	 
	 function t_wage1() {
		var rate2 = document.getElementById("rate").value;
		var w_days = document.getElementById("no_of_working_days").value;
		var t_wage;
		
		t_wage = rate2 * w_days;
		
		document.getElementById("t_wage").value = t_wage.toFixed(2);
		
	 }
	 
	 function total_salary1() {
		var total_regular_wage = document.getElementById("t_wage").value;
		var total_amt1 = document.getElementById("total_amt").value;
		var t_amt1 = document.getElementById("t_amt").value;
		var cola3 = document.getElementById("cola").value;
		var t_salary;
		
		t_salary = parseInt(total_regular_wage) + parseInt(total_amt1) + parseInt(t_amt1) + parseInt(cola3);
		
		document.getElementById("total_salary").value = t_salary.toFixed(2);
	 }
	 
	function total_salary2() {
		var s1 = document.getElementById("s1").value;
		var s2 = document.getElementById("total_salary").value;
		var total_s;

		total_s = parseInt(s1) + parseInt(s2);

		document.getElementById("t2").value = total_s.toFixed(2);	
	}

	
	function sss_deduction() {
			
			
		var salary = document.getElementById("t2").value;
		var selection = document.getElementById("sss1").value;
				
	if(selection == "deduct") {
		
		if(salary >= 1000 && salary <= 1249) {
			document.getElementById("sss").value = 36.30;
		} else if(salary >= 1250 && salary <= 1749) {
			document.getElementById("sss").value = 54.50;
		} else if(salary >= 1750 && salary <= 2249) {
		    document.getElementById("sss").value = 72.70;
		} else if(salary >= 2250 && salary <= 2749) {
			document.getElementById("sss").value = 90.80;
		} else if(salary >= 2750 && salary <= 3249) {
			document.getElementById("sss").value = 109.00;
		} else if(salary >= 3250 && salary <= 3749) {
			document.getElementById("sss").value = 127.20;
		} else if(salary >= 3750 && salary <= 4249) {
			document.getElementById("sss").value = 145.30;
		} else if(salary >= 4250 && salary <= 4749) {
			document.getElementById("sss").value = 163.50;
		} else if(salary >= 4750 && salary <= 5249) {
			document.getElementById("sss").value = 181.70;
		} else if(salary >= 5250 && salary <= 5749) {
			document.getElementById("sss").value = 199.80;
		} else if(salary >= 5750 && salary <= 6249) {
			document.getElementById("sss").value = 218.00;
		} else if(salary >= 6250 && salary <= 6749) {
			document.getElementById("sss").value = 236.20;
		} else if(salary >= 6750 && salary <= 7249) {
			document.getElementById("sss").value = 254.30;
		} else if(salary >= 7250 && salary <= 7749) {
			document.getElementById("sss").value = 272.50;
		} else if(salary >= 7750 && salary <= 8249) {
			document.getElementById("sss").value = 290.70;
		} else if(salary >= 8250 && salary <= 8749) {
			document.getElementById("sss").value = 308.80;
		} else if(salary >= 8750 && salary <= 9249) {
			document.getElementById("sss").value = 327.00;
		} else if(salary >= 9250 && salary <= 9749) {
			document.getElementById("sss").value = 345.20;
		} else if(salary >= 9750 && salary <= 10249) {
			document.getElementById("sss").value = 363.30;
		} else if(salary >= 10250 && salary <= 10749) {
			document.getElementById("sss").value = 381.50;
		} else if(salary >= 10750 && salary <= 11249) {
			document.getElementById("sss").value = 399.70;
		} else if(salary >= 11250 && salary <= 11749) {
			document.getElementById("sss").value = 417.80;
		} else if(salary >= 11750 && salary <= 12249) {
			document.getElementById("sss").value = 436.00;
		} else if(salary >= 12250 && salary <= 12749) {
			document.getElementById("sss").value = 454.20;
		} else if(salary >= 12750 && salary <= 13249) {
			document.getElementById("sss").value = 472.30;
		} else if(salary >= 13250 && salary <= 13749) {
			document.getElementById("sss").value = 490.50;
		} else if(salary >= 13750 && salary <= 14249) {
			document.getElementById("sss").value = 508.70;
		} else if(salary >= 14250 && salary <= 14749) {
			document.getElementById("sss").value = 526.80;
		} else if(salary >= 14750 && salary <= 15249) {
			document.getElementById("sss").value = 545.00;
		} else if(salary >= 15250 && salary <= 15749) {
			document.getElementById("sss").value = 563.20;
		} else if (salary >= 15750) {
			document.getElementById("sss").value = 581.30;
			
		} else {
			document.getElementById("sss").value = "Invalid Input";
		}
		
	} else { 
		document.getElementById("sss").value = 0;
	}

	}

function medicare_deduction() {
		
		var salary1 = document.getElementById("t2").value;
		var selection2 = document.getElementById("medicare1").value;
		
	if(selection2 == "deduct") {
		
		if(salary1 <= 8999) {
			document.getElementById("medicare").value = 100.00;
		} else if(salary1 >= 9000 && salary1 <= 9999) {
			document.getElementById("medicare").value = 112.50;
		} else if(salary1 >= 10000 && salary1 <= 10999) {
			document.getElementById("medicare").value = 125.00;
		} else if(salary1 >= 11000 && salary1 <= 11999) {
			document.getElementById("medicare").value = 137.50;
		} else if(salary1 >= 12000 && salary1 <= 12999) { 
			document.getElementById("medicare").value = 150.00;
		} else if(salary1 >= 13000 && salary1 <= 13999) {
			document.getElementById("medicare").value = 162.50;
		} else if(salary1 >= 14000 && salary1 <= 14999) {
			document.getElementById("medicare").value = 175.00;
		} else if(salary1 >= 15000 && salary1 <= 15999) {
			document.getElementById("medicare").value = 187.50;
		} else if (salary1 >= 16000 && salary1 <= 16999) {
			document.getElementById("medicare").value = 200.00;
		} else if (salary1 >= 17000 && salary1 <= 17999) {
			document.getElementById("medicare").value = 212.50;
		} else if(salary1 >= 18000 && salary1 <= 18999) {
			document.getElementById("medicare").value = 225.00;
		} else if(salary1 >= 19000 && salary1 <= 19999) {
			document.getElementById("medicare").value = 237.50;
		} else if(salary1 >= 20000 && salary1 <= 20999) {
			document.getElementById("medicare").value = 250.00;
		} else if(salary1 >= 21000 && salary1 <= 21999) {
			document.getElementById("medicare").value = 262.50;
		} else if(salary1 >= 22000 && salary1 <= 22999) {
			document.getElementById("medicare").value = 275.00;
		} else if(salary1 >= 23000 && salary1 <= 23999) {
			document.getElementById("medicare").value = 287.50;
		} else if(salary1 >= 24000 && salary1 <= 24999) {
			document.getElementById("medicare").value = 300.00;
		} else if(salary1 >= 25000 && salary1 <= 25999) {
			document.getElementById("medicare").value = 312.50;
		} else if(salary1 >= 26000 && salary1 <= 26999) {
			document.getElementById("medicare").value = 325.00;
		} else if(salary1 >= 27000 && salary1 <= 27999) {
			document.getElementById("medicare").value = 337.50;
		} else if(salary1 >= 28000 && salary1 <= 28999) {
			document.getElementById("medicare").value = 350.00;
		} else if(salary1 >= 29000 && salary1 <= 29999) {
			document.getElementById("medicare").value = 362.50;
		} else if(salary1 >= 30000 && salary1 <= 30999) {
			document.getElementById("medicare").value = 375.00;
		} else if(salary1 >= 31000 && salary1 <= 31999) {
			document.getElementById("medicare").value = 387.50;
		} else if(salary1 >= 32000 && salary1 <= 32999) {
			document.getElementById("medicare").value = 400.00;		
		} else if(salary1 >= 33000 && salary1 <= 33999) {
			document.getElementById("medicare").value = 412.50;
		} else if(salary1 >= 34000 && salary1 <= 34999) {
			document.getElementById("medicare").value = 425.00;
		} else if(salary1 >= 35000) {
			document.getElementById("medicare").value = 437.50;
		} else {
			document.getElementById("medicare").value = "Invalid Input";
		}
	} else {
		document.getElementById("medicare").value = 0;
	}
	}
	
	function pagibig_deductions() {
		var salary2 = document.getElementById("t2").value;
		var total_deduct;
		var selection3 = document.getElementById("pagibig1").value;
		
		
		if(selection3 == "deduct") {
			
		total_deduct = salary2 * 0.02;

		document.getElementById("pagibig").value = total_deduct;
		} else { 
			document.getElementById("pagibig").value = 0;
		}
	}
	function t_sal1() {
		var x = document.getElementById("t2").value;	
		var y = document.getElementById("sss").value;
		var z = document.getElementById("medicare").value;
		var a = document.getElementById("pagibig").value;
		var s23 = document.getElementById("s23").value;
		var wtax1 = document.getElementById("w_tax").value;
		
		
		if(isNaN(x) == true) {
			x = 0;	
		}
		if(isNaN(y) == true) {
			y = 0;
		}
		if(isNaN(z) == true) {
			z = 0;
		}
		if(isNaN(a) == true) {
			a = 0;
		}
		if(isNaN(s23) == true) {
			s23 = 0;
		}
		if(isNaN(wtax1) == true) {
			wtax1 = 0;
		}
		
		var t_sal2 = parseFloat(x) - parseFloat(y) - parseFloat(z) - parseFloat(a) - parseFloat(s23);
		
		document.getElementById("t_sal").value = t_sal2.toFixed(2);
		
	}
	
	$(function() {
    $('.g').hide(); 
    $('#tax1').change(function(){
        if($('#tax1').val() == 'deduct') {
            $('.g').show(); 
        } else {
            $('.g').hide(); 
        } 
    });
});

function w_tax1() {
		
		
		var z = [0.0,1,0,833,2500,5833,11667,20833,41667];
		var sme = [50,1,4167,5000,6667,10000,15833,25000,45833];
		var me1s1 = [75,1,6250,7083,8750,12083,17917,27083,47917];
		var me2s2 = [100,1,8333,9167,10833,14167,20000,29167,50000];
		var me3s3 = [125,1,10417,11250,12917,16250,22083,31250,52083];
		var me4s4 = [150,1,12500,13333,15000,18333,24167,33333,54167];

		
		var exception = [0,0,41.67,208.33,708.33,1875,4166.67,10416.67];
		var status = [0,0.05,0.1,0.15,0.2,0.25,0.30,0.32];

		var t_sal = document.getElementById("t_sal").value;
		var x,y,z,a,b,c;
		var dependent25 = document.getElementById("dependent").value;
		
		if(dependent25 == "z") {
			for(x =0;x<z.length;x++) {
			if (t_sal > z[x] && t_sal < z[x + 1]) {
				var nearest_number = z[x];
				var total = ((t_sal - nearest_number) * status[x-1]) + exception[x-1];
				document.getElementById("w_tax").value = total.toFixed(2);
			}	
		}
		}
		else if(dependent25 == "sme") {
			for(y=0;y<sme.length;y++) {
			if (t_sal > sme[y] && t_sal < sme[y + 1]) {
				var nearest_number1 = sme[y];
				var total1 = ((t_sal - nearest_number1) * status[y-1]) + exception[y-1];
				document.getElementById("w_tax").value = total1.toFixed(2);
			}	
		}
		}
	

		else if(dependent25 == "me1s1") {
			for(z=0;z<me1s1.length;z++) {
			if (t_sal > me1s1[z] && t_sal < me1s1[z + 1]) {
				var nearest_number2 = me1s1[z];
				var total2 = ((t_sal - nearest_number2) * status[z-1]) + exception[z-1];
				document.getElementById("w_tax").value = total2.toFixed(2);
				
			}	
		
		}
		}
		else if(dependent25 == "me2s2") {
			for(a=0;a<me2s2.length;a++) {
			if (t_sal > me2s2[a] && t_sal < me2s2[a + 1]) {
				var nearest_number3 = me2s2[a];
				var total3 = ((t_sal - nearest_number3) * status[a-1]) + exception[a-1];
				document.getElementById("w_tax").value = total3.toFixed(2);
				
			}	
		
		}
		}
		else if(dependent25 == "me3s3") {
			for(b=0;b<me3s3.length;b++) {
			if (t_sal > me3s3[b] && t_sal < me3s3[b + 1]) {
				var nearest_number4 = me3s3[b];
				var total4 = ((t_sal - nearest_number4) * status[b-1]) + exception[b-1];
				document.getElementById("w_tax").value = total4.toFixed(2);
				
			}
		}
		}		
		else if(dependent25 == "me4s4") {
			for(c=0;c<me4s4.length;c++) {
			if (t_sal > me4s4[c] && t_sal < me4s4[c + 1]) {
				var nearest_number5 = me4s4[c];
				var total5 = ((t_sal - nearest_number5) * status[c-1]) + exception[c-1];
				document.getElementById("w_tax").value = total5.toFixed(2);
				
			}
		}
			
	}
}


function final_salary() {
	var salary_with_deductions = document.getElementById("t_sal").value;
	var w_tax = document.getElementById("w_tax").value;

	var total_final_salary = parseFloat(salary_with_deductions) - parseFloat(w_tax);

	document.getElementById("t_salary").value = total_final_salary;


}
</script>
	
</head>
<title>Add Payroll</title>
<body>
		<div class = "container">
		<?php include('menu.php'); ?>
		 		<div class = "panel-group">
				<div class = "panel panel-primary">
				<div class = "panel-heading">Add Payroll</div>
					<div class = "panel-body">
					<div class = "form-group">
				<form action = "" method = "POST">
					<div class = "form-group">
					<label for 'emp_name'>Employee Name: </label>
					<input type = "text" name = "empname" value = "<?php echo $row['emp_name']; ?>" class = "form-control" >
					</div>
					<br />
					<div class = "form-group">
					<label for 'status'>Designation: </label>
					<input type = "text" name = "designation" value = "<?php echo $row['designation']; ?>" class = "form-control" >
					</div>
					<div class = "form-group">
					<label for 'from'>From: </label>
					<input type = "text" id="firstDate" name = "firstDate" class = "form-control" />
					</div>
					<div class = "form-group">
					<label for 'from'>To: </label>
					<input type = "text" id="secondDate" name = "secondDate" class = "form-control" />
					</div>
					<div class = "form-group">
					<label for 'working_days'>Days of Work</label>
					<input type = "text" id = "no_of_working_days" name = "no_of_working_days" class = "form-control"  />
					</div>
					<div class = "form-group">
					<label for 'rate'>Rate: </label>
					<input type = "text" name = "rate" class = "form-control" id="rate">
					</div>
					<div class = "form-group">
					<label for 'rate'>COLA Rate: </label>
					<input type = "text" name = "colarate" class = "form-control" id="cola_rate">
					</div>
					<div class = "form-group">					
					<label for 'regular_wage'>Total Regular Wage</label>
					<input type = "text" name = 't_wage' id = 't_wage' class = "form-control" onclick = "t_wage1()" >
					</div>
					<h3>OVERTIME</h3>
					<h4>Regular Days</h4>
					<div class = "form-group">
					<label for 'hours'>Hours:</label>
					<input type = "text" name = "hours" id = "hours" class = "form-control">
					</div>
					<div class = "form-group">
					<label for 'amt'>Rate/Hour:</label>
					<input type = "text" name = "amt" id = "amt" class = "form-control" onClick = "regular_days()">
					</div>
					<div class = "form-group">
					<label for 'total_amt'>Amt</label>
					<input type = "text" name = "total_amt" id = "total_amt" class = "form-control" onClick = "total_amt1()">
					</div>
					<h4>Sundays/Holidays</h4>
					<label for 'hours'>Hours</label>
					<div class = "form-group">
					<input type = "text" name = "hours1" id = "hours1" class = "form-control">
					</div>
					<label for 'amt1'>Rate/Hour</label>
					<div class = "form-group">
					<input type = "text" name = "rh" id = "rh" class = "form-control" onclick = "sundays_holidays()"/>
					</div>
					<label for 't_amt'>Amt</label>
					<div class = "form-group">
					<input type = "text" name = "t_amt" id = "t_amt" class = "form-control" onclick = "t_amt1()"/>
					</div>
					<label for 'cola'>COLA</label>
					<div class = "form-group">
					<input type = "text" name = "cola" id = "cola" class = "form-control" onclick = "cola1()"/>
					</div>
					<div class = "form-group">
					<label for 'present'>Present Salary</label>
					<input type = "text" name = "total_salary" id = "total_salary" class = "form-control" onclick = "total_salary1()">
					</div>
					<br />
					
						<label for 'previous'>Previous Salary</label>
						<input type = 'text' name = 'previous_salary' value = '' id = 's1' class = 'form-control'>
						<label for 'basic'>Basic Salary</label>
						<input type = 'text' name = 't2' id = 't2' onclick = "total_salary2()" class = 'form-control'>
					
					</script>
					<h3>Deductions</h3>
					<label for 'salary_loan'>Salary Loan</label>
					<div class = "form-group">
					<input type = "text" name = "s2" id = "s23" class = "form-control">
					</div>
					<label for 'sss'>SSS</label>
					<div class = "form-group">
						<select class = "form-control" id = "sss1" onchange = "sss_deduction()">
							<option value = ""selected>Select Here</option>
							<option value = "deduct">Deduct</option>
							<option value = "nodeduct">Not To Deduct</option>
						</select>
					<input type = 'text' name = 'sss' id = 'sss' class = 'form-control'>
					
					</div>
					<br />
				
			
					
					<div class = "form-group">
					
					<label for 'medicare'>Medicare</label>
					<select class = "form-control" id = "medicare1" onchange = "medicare_deduction()">
						<option value = ""selected>Select Here</option>
						<option value = "deduct">Deduct</option>
						<option value = "nodeduct">Not To Deduct</option>
						</select>
					<input type = 'text' name = 'medicare' id = 'medicare' class = 'form-control'>
					</div>
					<br />
					
					<div class = "form-group">
						<label for 'pagibig'>PAGIBIG</label>
							
							<select class = "form-control" id = "pagibig1" onchange = "pagibig_deductions()">
								<option value = ""selected>Select Here</option>
								<option value = "deduct">Deduct</option>
								<option value = "nodeduct">Not to Deduct</option>
							</select>
						
						<input type = 'text' name = 'pagibig' id = 'pagibig' class = 'form-control' >
					
					</div>
					
					<br /><br />
					
					
					<label for 't_sal'>Basic Salary with Deductions</label>
					<input type = 'text' name = 't_sal' id = 't_sal' class = 'form-control'  onclick = 't_sal1()'>
					<br /><br />
					
					
					<div class = "form-group">
					
					
							<label for 'withholding_tax'>Less Withholding Tax</label>
							
								<select class = "form-control" id = "tax1">
									<option value = ""selected>Select Here</option>
									<option value = "deduct">Deduct</option>
									<option value = "nodeduct">Not To Deduct</option>									
								</select>
								
								<select class = "form-control g" id="dependent" onchange = "w_tax1()">
									<option value = ""selected>Select Here</option>
									<option value = "z">Z</option>
									<option value = "sme">S/ME</option>
									<option value = "me1s1">ME1/S1</option>
									<option value = "me2s2">ME2/S2</option>
									<option value = "me3s3">ME3/S3</option>
									<option value = "me4s4">ME4/S4</option>

								</select>
							
							<input type = 'text' name = 'w_tax' class = 'form-control' id = 'w_tax'>
				
					</div>
					<br /><br />
					<div class = "form-group">
						<label for = "total_salary">Total Salary</label>
						<input type = "text" name = "t_salary" id = "t_salary" class = "form-control" onclick = "final_salary()"/>
					</div>
					<div class = "form-group">
					<button type = "submit" name = "s_payroll" class = "btn btn-primary">Save</button>
					</div>
				</form>
			</div>
					</div>
				</div>
				</div>
			</div>
			
		
		</div>

</body>

</html>

