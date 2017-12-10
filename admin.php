<?php
session_start();
//require 'dbconfig/congif.php';
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Admin Profile</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
	 
    <div class="header2">
	<!--<div' id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
  <h3 style="color:black"><b>Welcome 
    <?php echo $_SESSION['name']?>  
   </h3>
   <br><br>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="homepage.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <br>
   <p class="Go">
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<br><br><br>
<form  name="f" method="post" action="">
<h1 style="font-size:65px" ><font color="white">VIEW RECORDS</font></h1>
<hr color="white"><br>
<p class="Go">
   <a href="admin1.php"><input name="do" type="submit" id="code_btn" value="TEACHER"/></a>
  <a href="admin3.php"> <input name="view1" type="submit" id="code_btn" value="STUDENT"/></a>
   <input name="do1" type="submit" id="code_btn" value="ATTENDANCE"/><br>
  <a href="admin2.php"><input name="view" type="submit" id="code_btn" value="SUBJECT"/></a>
   <input name="do2" type="submit" id="code_btn" value="REPORT"/>
   <!--<input name="view" type="submit" id="code_btn" value="See Attendance"/><br>-->
   </p>
   </form>
   </body>
   <style>
   body
{
background-color:teal;
	background-repeat:no-repeat;
	background-size:100%;
}
.header2
{
background-color:white;
	height:100px;
	margin-top:absolute;
	margin:absolute;
	background:cover;
	padding:0px 0px 0px 0px;
   
	background-repeat:no-repeat;
	background-size:1400px;

}
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
if(isset($_POST['logout']))
   {
   session_destroy();
   header('location:login.php');
   }
   if(isset($_POST['do']))
   {
	   header('location:admin1.php');
   }
   if(isset($_POST['view']))
   {
	   header('location:sem.php');
   }
   if(isset($_POST['view1']))
   {
	   header('location:sem2.php');
   }
   if(isset($_POST['do1']))
   {
	   header('location:sem1.php');
   }
   if(isset($_POST['do2']))
   {
	   header('location:sem3.php');
   }
   ?>