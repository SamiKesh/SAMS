<?php
session_start();
//require 'dbconfig/congif.php';
$sid=$_SESSION['sub_id'];
function g_data()
{
	$sid=$_SESSION['sub_id'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT attend_info.stud_id,sum(attend_info.T_class) as TT,sum(attend_info.A_class) as AT FROM attend_info,subject_info 
 where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.stud_id";
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
$table_str='<center><table id="sub_table"><caption style="font-size:160%"><font color="white"><b>OVERALL REPORT INFORMATION</b></font></caption>';
	$sub=g_data();
	$i=1;
	$c=0;
	$c1=0;
	$p=array();
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Student ID</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->stud_id.'</td>
		<td>'.$p[]=round($subs->AT*100/$subs->TT,2).' %<td>';
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

 ?>


<!DOCTYPE html>
<html>
     <head>
     <title>Attendance Record</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
	 
    <div class="header2">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
  <h3 style="color:black"><b>Welcome 
    <?php echo $_SESSION['name']?>  
   </h3>
    <center><h2 style="font-size:70px"><font color="black">Report Records</font></h2></center>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="sem3.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <br>
   <p class="Go">
   <input name="Back" type="submit" id="logout_btn" value="Back"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="adminr.php">

</body>
   <style>
   body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:130%;
}
.header2
{
background-color:white;
	height:190px;
	margin-top:0px;
	margin:0;
	background:cover;
	padding:0px 0px 0px 0px;
  
	background-repeat:no-repeat;
	background-size:1400px;

}
.Go input
{
width:200px;
height:50px;
background-color:black;
color:red;
border:2px,solid;	
border-radius:15px 50px 30px;
}
.Go input:hover
{
	background-color:red;
	color:white;
}
#sub_table
{
	border:2px solid black;
	border-collapse:collapse;
	align:center;
    background-color:white;
	width:1000px;
}
#sub_table td,th
{
	border:1px solid black;
	color:red;
}
.head_table
{
	background-color:black;
	color:black;
}
.sub input{
	color:purple;
}
.sub input:hover{
	background-color:navy;
	color:orange;
}
</style>

<?php
if(isset($_POST['Back']))
   {
   session_destroy();
   header('location:sem3.php');
   }
   ?>
 
<?php echo g_table(); ?>
<p class="Go">
   <input  style="width:200px" name="do" type="submit" id="code_btn" value="Maximum %"/>
  <input style="width:200px" name="view1" type="submit" id="code_btn" value="Minimum %"/>
  <br>
  <input style="width:250px" name="do1" type="submit" id="code_btn" value="Student having >75%"/>
  <input style="width:250px" name="view" type="submit" id="code_btn" value="Student having <75%"/>
   </p>
   </p>
   </form>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());
if(isset($_POST['do']))
{ 
	$query = "SELECT stud_id,AT from (SELECT attend_info.stud_id,SUM(attend_info.A_class) as AT from attend_info,subject_info 
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.stud_id) as Temp  
where AT =(SELECT MAX(AT) from (SELECT attend_info.stud_id,SUM(attend_info.A_class) as AT from attend_info,subject_info
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.stud_id) as Temp)";
	$dk=mysql_query($query);
	$c=mysql_num_rows($dk);
	$m=array();
	   while ($rows = mysql_fetch_assoc($dk))
	   {
   $m[]= $rows['stud_id'];
	   }
	   for($i=0;$i<$c;$i++)
echo "<script>alert('Maximum Percentage is of Student having rollno. $m[$i]')</script>";
	echo"<script>window.open('adminr.php','_self')</script>";
}
if(isset($_POST['view1']))
{
	$query1 = "SELECT stud_id,AT from (SELECT attend_info.stud_id,SUM(attend_info.A_class) as AT from attend_info,subject_info 
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.stud_id) as Temp  
where AT =(SELECT MIN(AT) from (SELECT attend_info.stud_id,SUM(attend_info.A_class) as AT from attend_info,subject_info
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.stud_id) as Temp)";
	$dk1=mysql_query($query1);
	$c1=mysql_num_rows($dk1);
	$m1=array();
	   while ($rows = mysql_fetch_assoc($dk1))
	   {
   $m1[]= $rows['stud_id'];
	   }
	   for($i=0;$i<$c1;$i++)
echo "<script>alert('Minimum Percentage is of Student having rollno. $m1[$i]')</script>";
	echo"<script>window.open('adminr.php','_self')</script>";
}
?>
</html>