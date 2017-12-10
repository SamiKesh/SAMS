<!DOCTYPE html>
<html>
<head>
           <title>ADD(subject)</title>
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
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--<div id="form_wrapper">-->

<h2><font color="white">Add Subject</font></h2>
<hr color="black"><br>

<!--<form class="form">-->
<p class="field">
<label for="fname">Subject ID</label>
<br>
<input type="text" name="sub_id" id="sub_id" placeholder="BCS 601" required/>
</p>
<p class="field">
<label for="lname">Subject Name</label>
<br>
<input type="text" name="sub_name" id="sub_name" placeholder="Enter Subject Name" required/>
</p>
<p class="field">
<label for="u_name">Semester</label>
<br>
<input type="text" name="semester" id="semester" placeholder="6" required/>
</p>
<p class="field">
<label for="password">Teacher Id</label>
<br>
<input type="text" name="tech_id" id="tech_id" placeholder="***" required/>
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
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

if(isset($_POST['submit']))
{
	$sid=$_POST['sub_id'];
	$sname=$_POST['sub_name'];
	$sem=$_POST['semester'];
	$T_id=$_POST['tech_id'];
	$hon=$_POST['hon'];	
$f=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {	

if($sid==''){
	$f++;
	echo "<script>alert('Enter Subject Id')</script>";
}
if($sname==''){
	$f++;
	echo "<script>alert('Enter Subject name')</script>";
}
$sname = test_input($_POST["sub_name"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$sname))
{
	$f++;
echo "<script>alert('Only letters and white space allowed Subject Name')</script>";
}
if($sem==''){
	$f++;
	echo "<script>alert('Enter Semester')</script>";
}
if($hon==''){
	$f++;
	echo "<script>alert('Enter Honours')</script>";
}
if($T_id==''){
	$f++;
	echo "<script>alert('Enter Teacher Id')</script>";
}

if($f==0)
{
	$query= "insert into subject_info(sub_id,sub_name,semester,tech_id,hon) 
	values('$sid','$sname','$sem','$T_id','$hon')";
if(mysql_query($query))
{
	echo "<script>alert('Subject is successfully registered')</script>";
    echo"<script>window.open('admin2.php','_self')</script>";
}
}
}
}	
?>