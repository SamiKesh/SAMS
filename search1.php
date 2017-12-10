<?php
session_start();
function g_data()
{
$tid=$_SESSION['T_id'];
//$tid=$_POST['T_id'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT T_id,fname,lname,subject,username,contactNum,gender FROM teacher_info where T_id='$tid'";
	$dk=mysql_query($query);
	if(mysql_num_rows($dk)>0)
	{
		$sub=array();
	while($object=mysql_fetch_object($dk))
	{
       $sub[]=$object;
	}
	
//msql_close($con);
return $sub;
	}
	else
		echo "<script>alert('No record exixts')</script>";
}
function g_table()
{
	$tid=$_SESSION['T_id'];
	$table_str='<center><table id="sub_table" style="width:90%"><caption style="font-size:160%"><font color="red"><b>TEACHER DETAILED INFORMATION</b></font></caption>';
	
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Teacher ID</th><th>First Name</th><th>Last Name</th><th>Subject</th><th>Username</th><th>Contact No.</th><th>Gender</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->T_id.'</td><td>'.$subs->fname.'</td>
		<td>'.$subs->lname.'</td>
		<td>'.$subs->subject.'</td>
		<td>'.$subs->username.'</td>
		<td>'.$subs->contactNum.'</td>
		<td>'.$subs->gender.'</td>';
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
<title>Teacher_info</title>
<link rel="stylesheet" href="css/style1.css">
<!--<link rel="stylesheet" href="css/style.css">-->
</head>
<style>
body
{
	background-image:url("img/gg.jpg");
	background-repeat:no-repeat;
	background-size:100%;
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
<li><a class="homeblack" href="student.php">STUDENTS</a></li>
<li><a class="homered"href="teacher.php">TEACHERS</a></li>
<li><a class="homeblack" href="report.php">REPORT</a></li>
</ul>
</nav>

</header>
<div class="divider"></div><br>

<br><br><br>
<br>
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
	background-color:red;
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
<body>
<?php echo g_table(); ?>
<br>
<form class="myform" action="search1.php" method="post">
   <p class="Go">
<input type="submit" name="submit" value="Back">
</p>
</form>
<br><br>
   <?php
   
if(isset($_POST['submit']))
{
	session_destroy();
	header('location:teacher.php');
}
?>
</body>
</html>