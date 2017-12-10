<?php
require'dbconfig/congif.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Registeration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:orangered">
<div id="main-wrapper">
<center>
<h2>Registration Form</h2>
<img src="img/users.png" class="im1"/>
</center>
<form class="myform" action="register.php" method="post">
<label>NAME:</label><br>
<input name="name" type="text" class="inputvalues" placeholder="Enter your name"/><br><br>
<label>USERTYPE:</label><br>
<select name="usertype" type="text" class="select" placeholder="Enter your name"><br>
<option>Select your usertype</option>
<option>Teacher</option>
<option>Student</option>
<option>Admin</option>
</select><br><br>
<label>USERNAME:</label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br><br>
<label>PASSWORD:</label><br>
<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br><br>
<label>CONFIRM PASSWORD:</label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br><br>
<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
<a href="login.php"><input type="button" id="back_btn" value="Back"/></a>
</form>

<?php
if(isset($_POST['submit_btn']))
{
	//echo'<script type="text/javascript"> alert("Sign up button clicked")</script>';
	   $name=$_POST['name'];
	   $usertype=$_POST['usertype'];
       $username=$_POST['username'];
       $password=$_POST['password'];
       $cpassword=$_POST['cpassword'];
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
if($cpassword==''){
	echo "<script>alert('Enter your cpassword')</script>";
}
       if($password==$cpassword)
{
       $query="select * from account_tbl WHERE username='$username'";

       $query_run=mysqli_query($con,$query);
	   if(mysqli_num_rows($query_run)>0)
	   {
		   //there is already an user with the same username
		  echo'<script type="text/javascript"> alert("User already exist. Try another username")</script>';
	   }
	   else
	   {
		   $query="insert into account_tbl(name,usertype,username,password) values('$name','$usertype','$username','$password')";
		   $query_run=mysqli_query($con,$query);
		   
		   if($query_run)
		   {
			   echo'<script type="text/javascript"> alert("User Registered! Go to login page to login")</script>';
		   }
		   else
		   {
			   echo'<script type="text/javascript"> alert("Error!")</script>';
		   }
	   }
}

           else{
			   echo'<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';
		   }

}
?>
</div>
</body>
<style>
body
{
	background-image:url("img/bg4.jpg");
	background-repeat:no-repeat;
	background-size:100%;
}
</style>
</html>