<?php
session_start();
//require 'dbconfig/congif.php';
?>

<?php
$con1=mysql_connect("localhost","root","") or die(mysql_error());
$db1=mysql_select_db('attendance_tbl',$con1) or die(mysql_error());
$sid=$_SESSION['sub_id'];
$query1="select * from subject_info where sub_id='$sid'";
$query1_run=mysql_query($query1);
   while ($rows = mysql_fetch_array($query1_run))
 { 
   $si= $rows['sub_id'];
   $f = $rows['sub_name'];
   $s = $rows['semester'];
   $t= $rows['tech_id'];
} 

?>

<!DOCTYPE html>
<html>
<head>
           <title>Update(subject)Record</title>
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
<form id="form1" name="form1" method="post" action="us22.php">
<!--<div id="form_wrapper">-->

<h2><font color="white">Update Subject Record</font></h2>
<hr color="black"><br>

<!--<form class="form">-->
<p class="field">
<label for="fname">Subject ID</label>
<br>
<input type="text" name="sub_id" id="sub_id" placeholder="<?php echo "$si" ?>">
</p>
<p class="field">
<label for="lname">Subject Name</label>
<br>
<input type="text" name="sub_name" id="sub_name" placeholder="<?php echo "$f" ?>">
</p>
<p class="field">
<label for="u_name">Semester</label>
<br>
<input type="text" name="semester" id="semester" placeholder="<?php echo "$s" ?>">
</p>
<p class="field">
<label for="password">Teacher Id</label>
<br>
<input type="text" name="tech_id" id="tech_id" placeholder="<?php echo "$t" ?>">
</p>
<p class="location">
<select name="hon">
<option>Select honours here</option>
<option>Computer science</option>
<option>Mathematics</option>
<option>Statistics</option>
</select>
</p>
<br>
<p class="Go">
<input type="submit" name="submit" value="Submit">
</p>
</form>
</div>
</body>
<style>
   body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:100%;
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
color:teal;
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

$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

if(isset($_POST['submit']))
{
	$sd=$_POST['sub_id'];
	$sname=$_POST['sub_name'];
	$sem=$_POST['semester'];
	$T_id=$_POST['tech_id'];
	$hon=$_POST['hon'];

if($sd==''){
	echo "<script>alert('Enter Subject Id')</script>";
}
if($sname==''){
	echo "<script>alert('Enter Subject name')</script>";
}
if($sem==''){
	echo "<script>alert('Enter Semester')</script>";
}
if($hon==''){
	echo "<script>alert('Enter Honours')</script>";
}
if($T_id==''){
	echo "<script>alert('Enter Teacher Id')</script>";
}

else
{
	$query= "update subject_info set sub_id='$sd',sub_name='$sname',semester='$sem',tech_id='$T_id',hon='$hon'
	where sub_id='$sid'";
if(mysql_query($query))
{
	echo "<script>alert('Subject's record is successfully updated')</script>";
    echo"<script>window.open('admin2.php','_self')</script>";
}
}

}	
?>