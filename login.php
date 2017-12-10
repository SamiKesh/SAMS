<?php
session_start();
require'dbconfig/congif.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style1.css">
</head>
<style>
body
{
	background-image:url("img/gg.jpg");
	background-repeat:no-repeat;
	background-size:100%;
	background-color:red;
}
</style>
<header>
<nav>
<h1 style="font-size:25px">Student Attendance Management System&emsp;&emsp;&emsp;&emsp;</h1>
<ul id="nav">

<ul id="nav">

<li><a class="homeblack" href="jump.php">HOME</a></li>
<li><a class="homeblack"  href="home1.php">ABOUT US</a></li>
<li><a class="homered" href="login.php">LOGIN</a></li>
<li><a class="homeblack" href="student.php">STUDENTS</a></li>
<li><a class="homeblack"href="teacher.php">TEACHERS</a></li>
<li><a class="homeblack" href="report.php">REPORT</a></li>
</ul>
</nav>

</header>
<div class="divider"></div><br>

<body style="background-color:black"><br><br>
<div style="background-color:white" id="main-wrapper">
<center>
<!--<h2><b>LOGIN FORM<b></h2>-->
<img src="img/users.png" class="im1"/>
</center>
<form class="myform" action="login.php" method="post">
<br>
<!--<center><h2 style="font-size:200%" ><font color="red"> LOGIN FORM</font></h2></center>-->
<label>NAME:</label><br>
<input name="name" type="text" class="inputvalues" placeholder="Enter your name"/><br><br>
<label>USERTYPE:</label><br>
<select name="usertype" type="text" class="select" placeholder="Enter your name"><br>
<option>Select your usertype</option>
<option>Teacher</option>
<option>Student</option>
<option>Admin</option>
</select><br>
<label>USERNAME:</label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your username"/><br><br>
<label>PASSWORD:</label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password"/><br><br>
<input name="login" type="submit" id="login_btn" value="Login"/><br><br>
<!--<label>NEW User...Register Now!!</label>-->
<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
</form>
<?php
if(isset($_POST['login']))
{
	$name=$_POST['name'];
	$usertype=$_POST['usertype'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
if($name==''){
	echo "<script>alert('Enter your name')</script>";
}
if($usertype==''){
	echo "<script>alert('Select your usertype')</script>";
}
if($username==''){
	echo "<script>alert('Enter your username')</script>";
}
if($password==''){
	echo "<script>alert('Enter your password')</script>";
}
	
	
	$query="select * from account_tbl WHERE usertype='Student' AND username='$username' AND password='$password'";
	$query_run=mysqli_query($con,$query);
	
	$query1="select * from account_tbl WHERE usertype='Teacher' AND username='$username' AND password='$password'";
	$query1_run=mysqli_query($con,$query1);
	//echo $query_run;
	//echo $query1_run;
	$query2="select * from account_tbl WHERE usertype='Admin' AND username='$username' AND password='$password'";
	$query2_run=mysqli_query($con,$query2);
	
	if(mysqli_num_rows($query_run)>0)
	{
		//valid
		$_SESSION['username']=$username;
		$_SESSION['name']=$name;
		header('location:stud1.php');	
	}
	if(mysqli_num_rows($query1_run)>0)
	{
		//valid
		$_SESSION['username']=$username;
		$_SESSION['name']=$name;
		header('location:homepage1.php');
	}
	if(mysqli_num_rows($query2_run)>0)
	{
		//valid
		$_SESSION['username']=$username;
		$_SESSION['name']=$name;
		header('location:adminpro.php');
	}
	else
	{
		//invalid
		echo'<script type="text/javascript"> alert("invalid credentials!")</script>';
	}
}

?>
</div>
</body>
</html>