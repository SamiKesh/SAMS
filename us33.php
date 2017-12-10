<?php
session_start();
//require 'dbconfig/congif.php';
?>

<?php
$con1=mysql_connect("localhost","root","") or die(mysql_error());
$db1=mysql_select_db('attendance_tbl',$con1) or die(mysql_error());
$sid=$_SESSION['examrollno'];
$query1="select * from student_info where examrollno='$sid'";
$query1_run=mysql_query($query1);
   while ($rows = mysql_fetch_array($query1_run))
 { 
   $e= $rows['enrollno'];
   $er = $rows['examrollno'];
   $f = $rows['fname'];
   $l= $rows['lname'];
   $u = $rows['username'];
   $c= $rows['contactno'];
} 

?>
<!DOCTYPE html>

<html>
<head>
           <title>Update(student)Record</title>
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
<form id="form1" name="form1" method="post" action="us33.php">

<h2><font color="white">Update Student Record</font></h2>
<hr color="black"><br>
<img src="img\s3.png" style="width:200px;height:133px;">

<!--<form class="form">-->
<p class="field">
<label for="enrollno.">EnrollmentNo.</label>
<br>
<input type="number" name="enrollno" id="enrollno." placeholder="<?php echo "$e" ?>">
</p>
<p class="field">
<label for="fname">ExamRollNo.</label>
<br>
<input type="text" name="examrollno" id="examrollno." placeholder="<?php echo "$er" ?>">
</p>
<p class="field">
<label for="fname">First  Name</label>
<br>
<input type="text" name="fname" id="fname" placeholder="<?php echo "$f" ?>">
</p>
<p class="field">
<label for="lname">Last  Name</label>
<br>
<input type="text" name="lname" id="lname" placeholder="<?php echo "$l" ?>">

</p>
<label for="lname">Honours</label>
<p class="location">
<select name="hons">
<option>Select your Honours here</option>
<option>Computer science</option>
<option>Mathematics</option>
<option>Statistics</option>
</select>
</p>
<label for="lname">Semester</label>
<p class="location">
<select name="semester" type="text" id="semester">
<option>Select your semester here</option>
<option>1<!---Database Management System--></option>
<option>2 <!--Data Structure--></option>
<option>3<!--Lab Exercises Based On Course BCS-601--></option>
<option>4<!--Lab Exercises Based On Course BCS-602--></option>
<option>5<!--Lab Exercises Based On Course BCS-601--></option>
<option>6<!--Lab Exercises Based On Course BCS-602--></option>
</select>
</p>
<p class="field">
<label for="u_name">Username</label>
<br>
<input type="text" name="username" id="u_name" placeholder="<?php echo "$u" ?>">

</p>

<p class="field">
<label for="number">ContactNo.</label>
<br>
<input type="number" name="contactno" id="contact" placeholder="<?php echo "$c" ?>">

</p>

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
	background-size:135%;
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

//$con=mysql_connect("localhost","root","") or die(mysql_error());
//$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());
//$con1=mysql_connect("localhost","root","") or die(mysql_error());
//$db1=mysql_select_db('attendance_tbl',$con) or die(mysql_error());
if(isset($_POST['submit']))
{
	$enroll=$_POST['enrollno'];
	$examroll=$_POST['examrollno'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$hon=$_POST['hons'];
	$s=$_POST['semester'];
	//$usetype=$_POST['usertype'];
	$username=$_POST['username'];
	//$password=$_POST['password'];
	//$passWord=md5($password);
	$contact=$_POST['contactno'];
	

if($fname==''){
	echo "<script>alert('Enter first name')</script>";
}
if($lname==''){
	echo "<script>alert('Enter last name')</script>";
}
//if($enroll==''){	
//echo "<script>alert('Enter your enrollno')</script>";
//
if($username==''){
	echo "<script>alert('Enter username')</script>";
}
if($hon==''){
	echo "<script>alert('Enter password')</script>";
}
if($contact==''){
	echo "<script>alert('Enter contactNum')</script>";
}
if($examroll==''){
	echo "<script>alert('Enter gender')</script>";
}
else{
	$query= "update student_info set enrollno='$enroll',examrollno='$examroll',fname='$fname',lname='$lname',semester='$s',
	hons='$hon',username='$username',contactno='$contact'
	where examrollno='$sid'";
	//$query1="insert into account_tbl(usertype,us1ername,password)
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
	echo "<script>alert('Student's record is successfully updated')</script>";
 echo"<script>window.open('admin3.php','_self')</script>";
}

}
}
?>