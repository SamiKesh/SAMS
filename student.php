<?php
session_start();
function g_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT examrollno,fname,lname,hons,username,contactno FROM student_info";
	$dk=mysql_query($query);
	$sub=array();
	while($object=mysql_fetch_object($dk))
	{
       $sub[]=$object;
	}
	
//msql_close($con);
return $sub;
}
function g_table()
{
$table_str='<center><table id="sub_table" style="width:95%"><caption style="font-size:160%"><font color="red"><b>STUDENT DETAILED INFORMATION</b></font></caption>';
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Examroll No.</th><th>First Name</th><th>Last Name</th><th>Hons</th><th>Username</th><th>Contact No.</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->examrollno.'</td><td>'.$subs->fname.'</td>
		<td>'.$subs->lname.'</td>
		<td>'.$subs->hons.'</td>
		<td>'.$subs->username.'</td>
		<td>'.$subs->contactno.'</td>';
		//<td><form class="form"><input type="number" name="T_class[]" id="T_class"></td>
		//<td><input type="number" name="A_class[]" id="A_class">
        //</form></td>';
		$table_str.='</tr>';
	}
	//$y=2*($i-1);
	//echo "$y";
	return $table_str;
	?>
	</table></center>
	<?php
}
 ?>
 <!Doctype html>
<html>
<head>
<title>Student_info</title>
<link rel="stylesheet" href="css/style1.css">
<!--<link rel="stylesheet" href="css/style.css">-->
</head>
<style>
body
{
	background-image:url("img/gg.jpg");
	background-repeat:no-repeat;
	background-size:140%;
}
</style>
<header>
<nav>
<h1 style="font-size:25px">Student Attendance Management System&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h1>
<ul id="nav">

<ul id="nav">

<li><a class="homeblack" href="jump.php">HOME</a></li>
<li><a class="homeblack"  href="home1.php">ABOUT US</a></li>
<li><a class="homeblack" href="login.php">LOGIN</a></li>
<li><a class="homered" href="student.php">STUDENTS</a></li>
<li><a class="homeblack"href="teacher.php">TEACHERS</a></li>
<!--<li><a class="homeblack"href="">DO ATTENDANCE</a></li>-->
<li><a class="homeblack" href="report.php">REPORT</a></li>
</ul>
</nav>

</header>
<div class="divider"></div><br>
<style type="text/css">
#sub_table
{
	border:2px solid red;
	border-collapse:collapse;
	align:center;
    background-color:white;
}
#sub_table td,th
{
	border:1px solid red;
}
.head_table
{
	background-color:black;
	color:red;
}
.sub input{
	color:purple;
}
.sub input:hover{
	background-color:navy;
	color:orange;
}
.Go input
{
width:200px;
height:30px;
background-color:red;
color:white;
border:2px,solid;	
border-radius:15px 50px 30px;
}
.Go input:hover
{
	background-color:white;
	color:red;
}
</style>
</head>
<body>
<!--<hr color="navy">-->
<?php echo g_table(); ?>
<br><br>
<form class="myform" action="student.php" method="post">
<label for="examrollno"><font color="red">SEARCH HERE....</font></label><br>
   <p class="field">
   <input style="width:400px;height:25px;" name="examrollno" type="text" id="examrollno" placeholder="Enter the STUDENT Examroll no."><br>
   </p>
   <br>
   <p class="Go">
<input type="submit" name="submit" value="Search">
</p>
   </form><br><br>
   <?php
   
if(isset($_POST['submit']))
{
	$exam=$_POST['examrollno'];
	$_SESSION['examrollno']=$exam;
	echo"<script>window.open('search.php','_self')</script>";
	//header('location:search.php');
}
?>
</body>
</html>