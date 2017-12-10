<!DOCTYPE html>
<html>
<head>
           <title>ADD(teacher)</title>
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

<h2 style="color:white">Add Details</h2>
<hr color="black"><br>
<img src="img\s2.png" style="width:200px;height:133px;">

<!--<form class="form">-->
<p class="field">
<label for="fname">First Name</label>
<br>
<input type="text" name="fname" id="fname" placeholder="First Name" required/>
<!--<span class="error"> <?php// echo $fnameError;?></span>-->
</p>
<p class="field">
<label for="lname">Last Name</label>
<br>
<input type="text" name="lname" id="lname" placeholder="Last Name" required/>
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
<input type="text" name="username" id="u_name" placeholder="email id" required/>
</p>
<p class="field">
<label for="password">Teacher Id</label>
<br>
<input type="text" name="T_id" id="T_id" placeholder="***" required/>
</p>
<p class="field">
<label for="contactNum">ContactNo.</label>
<br>
<input type="number" name="contactNum" id="contactNum" placeholder="12345667" maxlength="10" required/>
</p>
<p class="gender">
<input type="radio" name="gender" id="" value="Male">Male
<input type="radio" name="gender" id="" value="Female">Female
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
	$con=strlen($contact);
$f=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if($fname==''){
		$f++;
	echo "<script>alert('Enter first name')</script>";
}
$fname = test_input($_POST["fname"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
	$f++;
echo "<script>alert('Only letters and white space allowed First Name')</script>";
}

if($lname==''){
	$f++;
	echo "<script>alert('Enter last name')</script>";
}
$lname = test_input($_POST["lname"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$lname))
{
	$f++;
echo "<script>alert('Only letters and white space allowed in Last Name')</script>";
}
if($sub==''){
	$f++;
	echo "<script>alert('Enter subject')</script>";
}
if($username==''){
	$f++;
	echo "<script>alert('Enter username')</script>";
}
if ( ! filter_var ( $_POST["username"] , FILTER_VALIDATE_EMAIL ) )
{
	$f++;
	echo "<script>alert('Invalid Username')</script>";
}
if($T_id==''){
	$f++;
	echo "<script>alert('Enter T_id')</script>";
}
if($contact==''){
	$f++;
	echo "<script>alert('Enter contactNum')</script>";
}
if($con<10 || $con>10)
{
	$f++;
	echo "<script>alert('contactNum exceed the limit')</script>";
}
if($gender==''){
	$f++;
	echo "<script>alert('Enter gender')</script>";
}
if($f==0)
{
	$query= "insert into teacher_info(T_id,fname,lname,subject,username,contactNum,gender) 
	values('$T_id','$fname','$lname','$sub','$username','$contact','$gender')";
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
	echo "<script>alert('Teacher is successfully registered')</script>";
    echo"<script>window.open('admin1.php','_self')</script>";
}
}
}
}	
?>