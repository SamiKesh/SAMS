<?php
session_start();
require'dbconfig/congif.php';

$s=$_SESSION['sub_id'];
$u=$_SESSION['username'];

$query1="select * from teacher_info,subject_info where teacher_info.T_id = subject_info.tech_id and subject_info.sub_id='$s' and teacher_info.username='$u'";
$query1_run=mysqli_query($con,$query1);
if(mysqli_num_rows($query1_run)>0)
{
function g_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

$s=$_SESSION['sub_id'];

 $query = "SELECT stud_id,sum(T_class) as TT,sum(A_class) as AT FROM attend_info where sub_id='$s' group by stud_id";
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
$table_str='<center><table id="sub_table" style="width:90%"><caption style="font-size:160%"><font color="white"><b>Student Overall Attendance Report</b></font></caption>';
	$sub=g_data();
	$i=1;
	$c=0;
	$c1=0;
	$p=array();
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Student Roll No.</th><th>Total class taken</th><th>Total class Attended</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->stud_id.'</td><td>'.$subs->TT.'</td>
		<td>'.$subs->AT.'</td>
		<td>'.$p[]=round($subs->AT*100/$subs->TT,2).'%</td>';
		//<td><form c1lass="form"><input type="number" name="T_class[]" id="T_class"></td>
		//<td><input type="number" name="A_class[]" id="A_class">
        //</form></td>';
		$table_str.='</tr>';
	}
	for($j=0;$j<($i-1);$j++)
	{
	if($p[$j]>'75%')
		$c++;
	else
		$c1++;
	}
		if(isset($_POST['do1']))
	echo "<script>alert('No. of Student with Overall Percentage above 75% are $c')</script>";
	
	
			if(isset($_POST['view']))
	echo "<script>alert('No. of Student with Overall Percentage below 75% are $c1')</script>";
	
	return $table_str;
	?>
	</table></center>
	<?php
}
}
else
{
echo '<script type="text/javascript">alert("Invalid Entry!!!......THats NOT Your Subject")</script>';
echo "<script>window.open('homepage4.php','_self')</script>";
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
<form name="form" method="post" action="see3.php"> 
 <!--  <p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>-->
 
  <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
  <br><br><br><br>
   <div> <?php echo g_table(); ?></div>
   <form name="f" method="post" action="see3.php">
  <p class="Go">
   <input  style="width:200px" name="do" type="submit" id="code_btn" value="Maximum %"/>
  <input style="width:200px" name="view1" type="submit" id="code_btn" value="Minimum %"/>
  <br>
  <input style="width:250px" name="do1" type="submit" id="code_btn" value="Student having >75%"/>
  <input style="width:250px" name="view" type="submit" id="code_btn" value="Student having <75%"/>
   </p> 
   </form>
<p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>
   
   
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());
if(isset($_POST['do']))
{ 
	$query = "SELECT stud_id,AT from (SELECT stud_id,SUM(A_class) as AT from attend_info where sub_id='$s' group by stud_id ) as Temp  where AT =(SELECT MAX(AT) 
	from (SELECT stud_id,SUM(A_class) as AT from attend_info where sub_id='$s' group by stud_id ) as Temp)";
	$dk=mysql_query($query);
	$c=mysql_num_rows($dk);
	$m=array();
	   while ($rows = mysql_fetch_assoc($dk))
	   {
   $m[]= $rows['stud_id'];
	   }
	   for($i=0;$i<$c;$i++)
echo "<script>alert('Maximum Percentage is of Student having rollno. $m[$i]')</script>";
	echo"<script>window.open('see3.php','_self')</script>";
}
if(isset($_POST['view1']))
{
	$query1 = "SELECT stud_id,AT from (SELECT stud_id,SUM(A_class) as AT from attend_info where sub_id='$s' group by stud_id ) as Temp  where AT =(SELECT MIN(AT) 
	from (SELECT stud_id,SUM(A_class) as AT from attend_info where sub_id='$s' group by stud_id ) as Temp)";
	$dk1=mysql_query($query1);
	$c1=mysql_num_rows($dk1);
	$m1=array();
	   while ($rows = mysql_fetch_assoc($dk1))
	   {
   $m1[]= $rows['stud_id'];
	   }
	   for($i=0;$i<$c1;$i++)
echo "<script>alert('Minimum Percentage is of Student having rollno. $m1[$i]')</script>";
	echo"<script>window.open('see3.php','_self')</script>";
}
 if(isset($_POST['sub']))
 {
	 
   header('location:homepage1.php');
   
 }
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