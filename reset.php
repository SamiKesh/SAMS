<?php
session_start();
require 'dbconfig/congif.php';
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Reset Attendance</title> 
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
    <div class="header1">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
	
	
	
  <h3><b>Welcome 
   <?php echo $_SESSION['name']?> 
   </h3>
   </div>
   <br><br><br><br>
    <center><img src="img/users.png" class="im1"/></center>
     </center> 
	 
   <form class="myform" action="reset.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="reset.php">
<select name="sub_id" type="text" id="sub_id">
<option>SELECT YOUR SUBJECT CODE</option>
<!--<option>BCS 201</option>
<option>BCS-202: Basic Linux Lab</option>
<option>BCS-401:Computer Organization And Architecture</option>
<option>BCS-402:Lab Exercises Based On Course BCS-401</option>-->
<option>BCS 601<!---Database Management System--></option>
<option>BCS 602 <!--Data Structure--></option>
<option>BCS 603<!--Lab Exercises Based On Course BCS-601--></option>
<option>BCS 604<!--Lab Exercises Based On Course BCS-602--></option>
<option>BCS 605<!--Project--></option>
<!--<option>MTB-201:Calculus-2</option>
<option>MTB-202:Statics & Dynamics</option>
<option>MTB-401:Partial Differential Equations</option>
<option>MTB-402:Mathematics Methods</option>-->
<option>MTB 601<!--:Set Theory And Metric Spaces--></option>
<option>MTB 602<!--:Linear Algebra--></option>
<option>MTB 603<!--:Numerical Analysis--></option>
<option>MTB 604<!--:Discrete Mathematics--></option>
<option>MTB 605<!--:Vector & Tensor Analysis---></option>
<option>MTB 606<!--:Complex Analysis--></option>
<option>MTB 607<!--:Number Theory--></option>
<!--<option>MTB 608<!--:Global Differential Geometry</option>
<option>MTB 609<!--:Special Theory Of Relativity 2</option>
<option>MTB 610<!--:Computational Mathematics Lab-2</option>
<option>MTB 611<!--:Dynamic System</option>
<option>STB 601<!--:Numericals Method--></option>
<option>STB 602<!--:Demand Analysis,Analysis of Income Distribution and Queing Theory--></option>
<option>STB 603<!--:Elements Of Stochastic Process--></option>
<option>STB 604<!--:Reliability--></option>
<option>STB 605<!--:Practicals Based on Course Nos. STB-601 And STB-603--></option>
<option>STB 606<!--:Practicals Based on Course Nos. STB-602 And STB-604--></option>
<option>STB 607<!--:PROJECT--></option>
</select>
<pre></pre>
<select name="month">
<option>ENTER THE MONTH</option>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
</select>
<pre></pre>

<input name="reset_btn" type="submit" id="code_btn" value="Reset"/>
<!--<a href="homepage1.php"><input name="back_btn" type="submit" id="code_btn" value="Back"></a><br>-->
   <?php
   //$con=mysqli_connect("localhost","root","") or die(mysql_error());
   //if($con)
	  // echo "<script>alert('connection  formed')</script>";
   //$db=mysqli_select_db('attendance_tbl',$con) or die(mysql_error());
      //if($db)
	   //echo "<script>alert('databse selected formed')</script>";

   if(isset($_POST['reset_btn']))
   {
	   //echo "1";
	  //$select=$_POST['sub_id'];
	  //$mon=$_POST['month'];
	  //echo "$select";
	 //$query="select * from subject_info WHERE sub_id='$select'";
	// echo "$query";
	 //$query_run=mysqli_query($con,$query);
	 //if(!$query_run)
	//
	//echo "<script>alert('connection not formed')</script>";
	//}
	 //$count=mysqli_num_rows($query_run);
	 /*if($count>0)
	  //{
		  for($i=1;$i<=$count;$i++)
		  {
		  $query1="insert into attend_info(month) values('$mon')";
	      $query1_run=mysqli_query($con,$query1);
		  }
		 if($query1_run)
		 {
			 echo "<script>alert('done')</script>";
		 }
	     else
			 echo "<script>alert('Not done')</script>";
	    //echo "1";*/
		//$_SESSION['sub_id']=$select;
		//$_SESSION['count']=$count;
		//$_SESSION['month']=$mon;
		//echo "$select";
		
		//echo "$count";

$m=$_POST['month'];	
$s=$_POST['sub_id'];
//$u=$_SESSION['username'];
//$query1="select * from teacher_info,tech_sub_info where teacher_info.T_id = tech_sub_info.T_id and tech_sub_info.sub_id='$s' and teacher_info.username='$u'";
///$query1_run=mysqli_query($con,$query1);
//if(mysqli_num_rows($query1_run)>0)
///{
$u=$_SESSION['username'];
$query1="select * from teacher_info,subject_info where teacher_info.T_id = subject_info.tech_id and subject_info.sub_id='$s' and teacher_info.username='$u'";
$query1_run=mysqli_query($con,$query1);
if(mysqli_num_rows($query1_run)>0)	
{
$query="delete from attend_info WHERE sub_id='$s' and month='$m'";
if(mysqli_query($con,$query))
{
//header('location:do.php');
echo "<script>alert('You can now submit the attendance again')</script>";
	echo"<script>window.open('homepage.php','_self')</script>";
		
	  } 
} 
else
{
echo '<script type="text/javascript">alert("Invalid Entry!!!......THats NOT Your Subject")</script>';
echo "<script>window.open('reset.php','_self')</script>";
}
}
	 //else
	 //  echo "<script>alert('connection not established')</script>";
   
   if(isset($_POST['logout']))
   {
   session_destroy();
   header('location:login.php');
   }
  ?>
  </form>
 </div>
 </center>
</body>
<style>
body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:100%;
}
</style>
</html>