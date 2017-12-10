
<?php
session_start();
require'dbconfig/congif.php';

$m=$_POST['month'];	
$s=$_POST['sub_id'];
//echo "$m";
//echo "$s";
$u=$_SESSION['username'];
$query1="select * from teacher_info,subject_info where teacher_info.T_id = subject_info.tech_id and subject_info.sub_id='$s' and teacher_info.username='$u'";
$query1_run=mysqli_query($con,$query1);
if(mysqli_num_rows($query1_run)>0)
{
$query="select * from attend_info WHERE sub_id='$s' and month='$m'";

      
	   $query_run=mysqli_query($con,$query);
	   if(mysqli_num_rows($query_run)>0)
	   {
		   //there is already an entery of this month
		  echo '<script type="text/javascript"> alert("Attendance Already Taken")</script>';
	      echo "<script>window.open('homepage.php','_self')</script>";
	   	}
        else
        {
           function get_data()
           {
	         $s=$_POST['sub_id'];
              echo "$s";
	//$m=$_SESSION['month'];
	//echo "$m";
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT student_info.examrollno FROM student_info , subject_info where student_info.hons = subject_info.hon and subject_info.sub_id='$s'";
	$dd=mysql_query($query);
	$sub=array();
	while($object=mysql_fetch_object($dd))
	{
       $sub[]=$object;
	}
	?>
	<!--<input type="hidden" value="<?php //echo "$sub[]" ?>" name="stud_id">-->
	<?php
//msql_close($con);
return $sub;
  }
		
function get_table()
{	
	$table_str='<center><table id="sub_table"style="width:90%" >';
	$sub=get_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Student ID</th><th>Total class Taken</th><th>Class Attended</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->examrollno.'</td>
		<input type="hidden" value="'.$subs->examrollno.'" name="stud_id[]">
		<td><input type="number" name="T_class[]"></td>
		<td><input type="number" name="A_class[]"></td>';	
		$table_str.='</tr>';
	}
	
	$y=2*($i-1);
	//echo "$y";
return $table_str;
}
?>
	</table></center>
<?php	
	//session_start();
	//require 'dbconfig/congif.php';
	
	/*if(isset($_POST['sub']))
    {
	//$c=$_SESSION['count'];
	//echo "$c";
	//$tc=array();
	//$ac=array();
	//$tc[]=$_POST['T_class'][$i-1];
    //$ac[]=$_POST['A_class'][$i-1];
	//$stmt=$mysqli->prepare("insert into subject_info(T_class,A_class) values(?,?)")
	echo "<pre>";
	print_r($_POST);
	echo "<pre>";
	$t = "insert into attend_info(T_class,A_class) VALUES";
	
    for ($i=1; $i<=$y; $i++) 
   {
	   $tc=$_POST['T_class'][$i-1];
	   $ac=$_POST['A_class'][$i-1];
    $t .= "('$tc','$ac'),";
    //if ($i<count($_POST['T_class']) - 1) {
      // $sql .= ',';
	}
	  $t=rtrim($t,",");
    
	//for($i=0;$i<count($tc);$i++)
	//{
		//$tc=$tc[$i];
		//$ac=$ac[$i];
		//$stmt->bind_param('ssi',$tc,$ac);
		//$stmt->execute();
	//}
	//echo "done";
	//$stmt->close();
	//$query1="insert into subject_info(T_class,A_class) values('$tc','$ac')";
	if(!mysql_query($t))
    {
	//echo mysql_error();
	echo "$t";
	echo "<script>alert('Attendance not registered')</script>";
    }
    else
    {
	echo "<script>alert('Attendance successfully registered')</script>";
    header('location:homepage.php');
    }
}
else
echo "<script>alert('connection not established')</script>";
}*/
}
}
 else
{
echo '<script type="text/javascript">alert("Invalid Entry!!!......THats NOT Your Subject")</script>';
echo "<script>window.open('homepage.php','_self')</script>";
}


?>
<!Doctype html>
<html>
<head>
<title>Do Attendance</title>
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
<form name="form" method="post" action="do1.php"> 
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   <div> <?php echo get_table(); ?>
   <input type="hidden" value="<?php echo "$s" ?>" name="sub_id">
   <input type="hidden" value="<?php echo "$m" ?>" name="month">
<!--  <input type="hidden" value="<?php //$s1=get_data();
  //foreach($s1 as $ss)
  //echo "$ss->examrollno"; ?>" name="stud_id[]">-->
   <p class="sub">
   <input type="submit" name="sub" id="sub" value="Submit"/>
   </p>
   </div>
<?php

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
		