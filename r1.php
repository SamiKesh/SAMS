<?php
require'dbconfig/congif.php';
?>
<!DOCTYPE html>

<html>
<head>
           <title>ADD(student)</title>
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

<h2 style="color:white">Add Details</h2>
<hr color="black"><br>
<img src="img\s3.png" style="width:200px;height:133px;">

<!--<form class="form">-->
<p class="field">
<label for="enrollno.">EnrollmentNo.</label>
<br>
<input type="number" name="enrollno" id="enrollno." placeholder="370233" required/>
</p>
<p class="field">
<label for="fname">ExamRollNo.</label>
<br>
<input type="text" name="examrollno" id="examrollno." placeholder="14181MM019" required/>
</p>
<p class="field">
<label for="fname">First  Name</label>
<br>
<input type="text" name="fname" id="fname" placeholder="First Name" required/>
</p>
<p class="field">
<label for="lname">Last  Name</label>
<br>
<input type="text" name="lname" id="lname" placeholder="Last Name" required/>

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
<input type="text" name="username" id="u_name" placeholder="email id" required/>

</p>

<p class="field">
<label for="number">ContactNo.</label>
<br>
<input type="number" name="contactno" id="contact" placeholder="12345667" required/>

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
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php

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
	$con1=strlen($contact);
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
//if($enroll==''){	
//echo "<script>alert('Enter your enrollno')</script>";
//
$enroll = test_input($_POST["enrollno"]); // check name only contains letters and whitespace
if (!preg_match("/^[0-9]*$/",$enroll))
{
	$f++;
echo "<script>alert('Only numbers are allowed in EnrollmentNo')</script>";
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
if($hon==''){
	$f++;
	echo "<script>alert('Enter password')</script>";
}
if($contact==''){
	$f++;
	echo "<script>alert('Enter contactNum')</script>";
}
if($con1<10 || $con1>10)
{
	$f++;
	echo "<script>alert('contactNum exceed the limit')</script>";
}
if($examroll==''){
	$f++;
	echo "<script>alert('Enter gender')</script>";
}
if($f==0){
	$query= "insert into student_info(enrollno,examrollno,fname,lname,hons,semester,username,contactno) 
	values('$enroll','$examroll','$fname','$lname','$hon','$s','$username','$contact')";
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
if(mysqli_query($con,$query))
{
	echo "<script>alert('Student is successfully registered')</script>";
 echo"<script>window.open('admin3.php','_self')</script>";
}

else
echo "<script>alert('connection not established')</script>";	
}
}
}
?>