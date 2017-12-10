<?php
session_start();

function g_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

$r=$_POST['examrollno'];
//$s=$_POST['sub_id'];
$u=$_SESSION['username'];
//echo "$u";
$query2="SELECT * from student_info where examrollno='$r' and username='$u'";
$q=mysql_query($query2);
if(mysql_num_rows($q)>0)
{
 $query = "SELECT sub_id,month,sum(T_class) as TT,sum(A_class) as AT FROM attend_info where stud_id='$r' group by sub_id";
	$dk=mysql_query($query);
	$sub=array();
	while($object=mysql_fetch_object($dk))
	{
       $sub[]=$object;
	}
	
//msql_close($con);
return $sub;
}
else
{
echo "<script>alert('Invalid Rollno.')</script>";
echo"<script>window.open('stud2.php','_self')</script>";
}
}
function g_table()
{
$table_str='<center><table id="sub_table" style="width:90%"><caption style="font-size:160%"><font color="white"><b>Student Overall Subject-wise Report</b></font></caption>';
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Subjects</th><th>Total Class Conducted</th><th>Total Class Attended</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->sub_id.'</td>
		<td>'.$subs->TT.'</td>
		<td>'.$subs->AT.'</td>
		<td>'.round($subs->AT*100/$subs->TT,2).'%</td>';
		$table_str.='</tr>';
	}
	
	return $table_str;	
	?>
	</table></center>
	
	<?php
}
function g1_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

$r=$_POST['examrollno'];
//$s=$_POST['sub_id'];
//$u=$_SESSION['username'];
//echo "$u";
//$query2="SELECT * from student_info where examrollno='$r' and username='$u'";
//$q=mysql_query($query2);
//if(mysql_num_rows($q)>0)

 $query = "SELECT stud_id,sum(T_class) as TT,sum(A_class) as AT FROM attend_info where stud_id='$r'";
	$dk=mysql_query($query);
	$sub=array();
	while($object=mysql_fetch_object($dk))
	{
       $sub[]=$object;
	}
	
//msql_close($con);
return $sub;
}
function g1_table()
{
$table_str='<center><table id="sub_table" style="width:50%"><caption style="font-size:160%"><font color="white"><b>Overall Attendance Report</b></font></caption>';
	$sub=g1_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>Student Rollno</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.$subs->stud_id.'</td>
		<td>'.$p=round($subs->AT*100/$subs->TT,2).'%</td>';
		//<td><form c1lass="form"><input type="number" name="T_class[]" id="T_class"></td>
		//<td><input type="number" name="A_class[]" id="A_class">
        //</form></td>';
		$table_str.='</tr>';
		if($p<'75%')
		echo " <br><br><p1 style=font-size:150%><font color='Black'>Overall Percentage is below 75%."; 
	else 
		echo " <br><p1 style=font-size:150%><font color='White'>Overall Percentage is above 75%.</p1><br><br><br><br>";
	}
	return $table_str;
	?>
	</table></center>
<?php
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
	<!--background-image:url("img/bg7.jpg");-->
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
	border:1px solid orangered;
	border-collapse:collapse;
	align:center;
	background-color:white;
}
#sub_table th
{
	border:1px solid orangered;
}
#sub_table td{
	
	border:1px solid orangered;
	color:orangered;
}
.head_table
{
	background-color:orangered;
	color:white;
}
</style>
<form name="form" method="post" action=""> 
 <!--  <p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>-->
 
  <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   <div> <?php echo g_table(); ?></div>
  <!-- <div> <?php //echo g1_table(); ?></div>-->
  <br><br><br>

    <div> <?php echo g1_table(); ?></div>
	
	<p class="sub">
   <input type="submit" name="sub" id="sub" value="Back"/>
   </p>
<?php
   if(isset($_POST['sub']))
   header('location:stud1.php');
   
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