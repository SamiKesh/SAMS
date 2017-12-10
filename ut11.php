<?php
session_start();
//require 'dbconfig/congif.php';
?>

<?php

$con1=mysql_connect("localhost","root","") or die(mysql_error());
$db1=mysql_select_db('attendance_tbl',$con1) or die(mysql_error());
$tid=$_SESSION['T_id'];
$query1="select * from teacher_info where T_id='$tid'";
$query1_run=mysql_query($query1);
   while ($rows = mysql_fetch_array($query1_run))
 { 
   $name = $rows['fname'];
   $f = $rows['lname'];
   $s = $rows['subject'];
   $u = $rows['username'];
   $t = $rows['T_id'];
    $c=$rows['contactNum'];
	$g=$rows['gender'];
} 
?>
<!DOCTYPE html>
<html>
<head>
           <title>Update(teacher)Record</title>
           <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" media="all">
<link rel="stylesheet" href="css/style.css">
     
     <body>
   <form class="myform" action="homepage.php" method="post">
   <br>
   <p class="Go">
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
</head>
<form id="form1" name="form1" method="post" action="ut11.php">
<!--<div id="form_wrapper">-->

<h2><font color="white">Update Record</font></h2>
<hr color="black"><br>
<img src="img\s2.png" style="width:200px;height:133px;">

<!--<form class="form">-->
<p class="field">
<label for="fname">First Name</label>
<br>
<input type="text" name="fname" id="fname" placeholder="<?php echo "$name"?>">
</p>
<p class="field">
<label for="lname">Last Name</label>
<br>
<input type="text" name="lname" id="lname" placeholder="<?php echo "$f"?>">
</p>
<br>
<p class="location">
<select name="subject">
<option>Select your subject here</option>
<option>Computer science</option>
<option>Mathematics</option>
<option>Statistics</option>
</select>
</p>

<p class="field">
<label for="u_name">Username</label>
<br>
<input type="text" name="username" id="u_name" placeholder="<?php echo "$u" ?>">
</p>
<p class="field">
<label for="password">Teacher Id</label>
<br>
<input type="text" name="T_id" id="T_id" placeholder="<?php echo "$t" ?>">
</p>
<p class="field">
<label for="contactNum">ContactNo.</label>
<br>
<input type="number" name="contactNum" id="contactNum" placeholder="<?php echo "$c" ?>">
</p>
<p class="gender">
<input type="radio" name="gender" id="" value="Male">Male
<input type="radio" name="gender" id="" value="Female">Female
</p>

<p class="Go">
<input type="submit" name="submit" value="Update">
</p>
</form>
</div>
</body>
<style>
   body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:200%;
}
<!--.header2
{
background-color:black;
	height:310px;
	margin-top:0px;
	margin:0;
	background:cover;
	padding:0px 0px 0px 0px;
    background-image:url("img/h3.jpg");
	background-repeat:no-repeat;
	background-size:1400px;

}-->
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
</style>
</html>

<?php


//$con1=mysql_connect("localhost","root","") or die(mysql_error());
//$db1=mysql_select_db('attendance_tbl',$con) or die(mysql_error());


 if(isset($_POST['submit']))
{
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$sub=$_POST['subject'];
	//$usetype=$_POST['usertype'];
	$username=$_POST['username'];
	$T_id=$_POST['T_id'];
	//$passWord=md5($password);
	$contact=$_POST['contactNum'];
	$gender=$_POST['gender'];

if($fname==''){
	echo "<script>alert('Enter first name')</script>";
}
if($lname==''){
	echo "<script>alert('Enter last name')</script>";
}
if($sub==''){
	echo "<script>alert('Enter subject')</script>";
}
if($username==''){
	echo "<script>alert('Enter username')</script>";
}
if($T_id==''){
	echo "<script>alert('Enter T_id')</script>";
}
if($contact==''){
	echo "<script>alert('Enter contactNum')</script>";
}
if($gender==''){
	echo "<script>alert('Enter gender')</script>";
}
else
{
	$query= "update teacher_info set T_id='$T_id',fname='$fname',lname='$lname',subject='$sub',username='$username',contactNum='$contact',gender='$gender' 
	where T_id='$tid'";
	//$query1="insert into account_tbl(usertype,username,password)
//values('$usertype','$username',$password')";
	//$ret=mysql_query($query,$con);
	//if(!$ret)
	//
		//echo "<script>alert('connection not formed')</script>";
	//}

	
	
	//$ret=mysql_query($query1,$con);
	//if(!$ret)
	//{
//echo "<script>alert('connection not formed')</script>";
	//}
if(mysql_query($query))
{
	echo "<script>alert('Record successfully updated')</script>";
    echo"<script>window.open('admin1.php','_self')</script>";
}
}

}	
?>