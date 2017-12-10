<?php
session_start();
require'dbconfig/congif.php';

$s=$_POST['sub_id'];
//$m=$_POST['month'];
$u=$_SESSION['username'];

$query1="select * from teacher_info,subject_info where teacher_info.T_id = subject_info.tech_id and subject_info.sub_id='$s' and teacher_info.username='$u'";
$query1_run=mysqli_query($con,$query1);
if(mysqli_num_rows($query1_run)>0)
{
function g_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

$s=$_POST['sub_id'];
//$m=$_POST['month'];

 $query = "SELECT stud_id,month,T_class,A_class FROM attend_info where sub_id='$s'"; //and month='$m'";
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
$table_str='<center><table id="sub_table" style="width:90%"><caption style="font-size:160%"><font color="white"><b>Student Attendance Details</b></font></caption>';
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Student Roll No.</th><th>Month</th><th>Total class taken</th><th>Total class Attended</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->stud_id.'</td><td>'.$subs->month.'</td><td>'.$subs->T_class.'</td>
		<td>'.$subs->A_class.'</td>
		<td>'.round($subs->A_class*100/$subs->T_class,2).'%</td>';
		//<td><form c1lass="form"><input type="number" name="T_class[]" id="T_class"></td>
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
}
else
{
echo '<script type="text/javascript">alert("Invalid Entry!!!......THats NOT Your Subject")</script>';
echo "<script>window.open('homepage3.php','_self')</script>";
}
 ?>
 <!Doctype html>
<html>
<head>
<title>See Attendance</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="style.css" media="all">
</head>
<style>
body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:100%;
}
</style>
<body>
    <div class="header1">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
		
  <h3><b>Welcome 
    <?php echo $_SESSION['name']?> 
    
 </h3>
   </div>
<style type="text/css">
#sub_table
{
	border:1px solid red;
	border-collapse:collapse;
	align:center;
	background-color:white;
}
#sub_table th
{
	border:1px solid red;
}
#sub_table td{
	
	border:1px solid orangered;
	color:orangered;
}
.head_table
{
	background-color:red;
	color:white;
}
</style>
<form name="form" method="post" action="homepage1.php"> 
 <!--  <p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>-->
 
  <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   <div> <?php echo g_table(); ?></div>
   
<p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>
<?php
   if(isset($_POST['sub']))
   header('location:homepage1.php');
   
   if(isset($_POST['logout']))
   {
   session_destroy();
   header('location:login.php');
  }
//}
?>
</form>
</body>
</html>