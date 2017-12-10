<?php
session_start();
//require 'dbconfig/congif.php';
$sid=$_SESSION['sub_id'];
function g_data()
{
	$sid=$_SESSION['sub_id'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT attend_info.sub_id,attend_info.stud_id,sum(attend_info.T_class) as TT,sum(attend_info.A_class) as AT FROM attend_info,subject_info 
 where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.sub_id,attend_info.stud_id";
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
$table_str='<center><table id="sub_table"><caption style="font-size:160%"><font color="white"><b>OVERALL  
SUBJECT-WISE ATTENDANCE INFORMATION</b></font></caption>';
	$sub=g_data();
	$i=0;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Subject ID</th><th>Student ID</th><th>Total class taken</th><th>Total class Attended</th><th>Percentage</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.(++$i).'</td><td>'.$subs->sub_id.'</td><td>'.$subs->stud_id.'</td>
		<td>'.$subs->TT.'</td>
		<td>'.$subs->AT.'</td>
		<td>'.round($subs->AT*100/$subs->TT,2).' %</td>';
		//<td><form class="form"><input type="number" name="T_class[]" id="T_class"></td>
		//<td><input type="number" name="A_class[]" id="A_class">
        //</form></td>';
		$table_str.='</tr>';
		if($i%4==0)
		$table_str.='<tr style="background-color:black"><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
	}
	//$y=2*($i-1);
	//echo "$y";
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
  
    <center><h2 style="font-size:70px"><font color="black">Attendance Records</font></h2></center>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="sem1.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <br>
   <p class="Go">
   <input name="Back" type="submit" id="logout_btn" value="Home"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="attend.php">

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
	width:1100px;
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
   header('location:sem1.php');
   }
   ?>
 
<?php echo g_table(); ?>
 <select name="sub_id" type="text" id="sub_id">
<option>Enter the Subject Code</option>
<option>BCS 601<!---Database Management System--></option>
<option>BCS 602 <!--Data Structure--></option>
<option>BCS 603<!--Lab Exercises Based On Course BCS-601--></option>
<option>BCS 604<!--Lab Exercises Based On Course BCS-602--></option>
<option>BCS 605<!--Project--></option>
<option>MTB 601<!--:Set Theory And Metric Spaces--></option>
<option>MTB 602<!--:Linear Algebra--></option>
<option>MTB 603<!--:Numerical Analysis--></option>
<option>MTB 604<!--:Discrete Mathematics--></option>
<option>MTB 605<!--:Vector & Tensor Analysis---></option>
<option>MTB 606<!--:Complex Analysis--></option>
<option>MTB 607<!--:Number Theory--></option>
<option>STB 601<!--:Numericals Method--></option>
<option>STB 602<!--:Demand Analysis,Analysis of Income Distribution and Queing Theory--></option>
<option>STB 603<!--:Elements Of Stochastic Process--></option>
<option>STB 604<!--:Reliability--></option>
<option>STB 605<!--:Practicals Based on Course Nos. STB-601 And STB-603--></option>
<option>STB 606<!--:Practicals Based on Course Nos. STB-602 And STB-604--></option>
<option>STB 607<!--:PROJECT--></option>
</select>
<p class="Go">
   <input style="width:250px" name="do" type="submit" id="code_btn" value="Maximum Attendance"/>
  <!--<input name="view1" type="submit" id="code_btn" value="Average"/>-->
   <input style="width:250px" name="do1" type="submit" id="code_btn" value="Minimum Attendance"/><br>
   </p>
   </form>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

if(isset($_POST['do']))
{
	$s=$_POST['sub_id'];
	$query ="SELECT stud_id,AT from (SELECT stud_id,AT from (SELECT attend_info.sub_id,attend_info.stud_id,sum(attend_info.A_class) as AT FROM attend_info,subject_info 
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.sub_id,attend_info.stud_id) as temp1 
where sub_id='$s') as temp
where AT =(SELECT MAX(AT) from (SELECT stud_id,AT from (SELECT attend_info.sub_id,attend_info.stud_id,sum(attend_info.A_class) as AT FROM attend_info,subject_info
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid'	 group by attend_info.sub_id,attend_info.stud_id) as temp1 
where sub_id='$s') as temp)";
	$dk=mysql_query($query);
	$c=mysql_num_rows($dk);
	$m=array();
	   while ($rows = mysql_fetch_assoc($dk))
	   {
   $m[]= $rows['stud_id'];
	   }
	for($i=0;$i<$c;$i++)
echo "<script>alert('Maximum Percentage is of Student having rollno. $m[$i]')</script>";
	echo"<script>window.open('attend.php','_self')</script>";
}	
if(isset($_POST['do1']))
	
{
	$s=$_POST['sub_id'];
	$query1 ="SELECT stud_id,AT from (SELECT stud_id,AT from (SELECT attend_info.sub_id,attend_info.stud_id,sum(attend_info.A_class) as AT FROM attend_info,subject_info 
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid'	group by attend_info.sub_id,attend_info.stud_id) as temp1 
where sub_id='$s') as temp
where AT =(SELECT MIN(AT) from (SELECT stud_id,AT from (SELECT attend_info.sub_id,attend_info.stud_id,sum(attend_info.A_class) as AT FROM attend_info,subject_info 
where attend_info.sub_id = subject_info.sub_id and subject_info.semester='$sid' group by attend_info.sub_id,attend_info.stud_id) as temp1 
where sub_id='$s') as temp)";
	$dk1=mysql_query($query1);
	$c1=mysql_num_rows($dk1);
	$m1=array();
	   while ($rows = mysql_fetch_assoc($dk1))
	   {
   $m1[]= $rows['stud_id'];
	   }
	   for($i=0;$i<$c1;$i++)
	   echo "<script>alert('Minimum Percentage is of Student having rollno. $m1[$i]')</script>";
	echo"<script>window.open('attend.php','_self')</script>";
}
/*if(isset($_POST['do1']))
{
	$query ="SELECT stud_id,AT from (SELECT stud_id,AT from (SELECT sub_id,stud_id,sum(A_class) as AT FROM attend_info group by sub_id,stud_id) as temp1 where sub_id='$s') as temp
	 where AT =(SELECT MAX(AT) from (SELECT stud_id,AT from (SELECT sub_id,stud_id,sum(A_class) as AT FROM attend_info group by sub_id,stud_id) as temp1 where sub_id='$s') as temp)";
	$dk=mysql_query($query);
	   while ($rows = mysql_fetch_array($dk))
	   {
   $m= $rows['stud_id'];
	   }
}*/
?>
</html>