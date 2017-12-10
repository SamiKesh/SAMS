<?php
session_start();
//require 'dbconfig/congif.php';
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Teacher Profile</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
    <div class="header1">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
	
	
	
  <h3><b>Welcome 
    <a href="r.php"><?php echo $_SESSION['name']?></a>  
   </h3>
   </div>
   <br><br><br>
    <center><img src="img/users.png" class="im1"/></center>
     </center> 
	 
   <form class="myform" action="homepage.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="">
   <input  style="width:230px;height:35px;" name="do" type="submit" id="code_btn" value="Submit Attendance"/><br>
     <input  style="width:290px;height:35px;" name="reset_btn" type="submit" id="code_btn" value="Reset Attendance"/><br>
   <input style="width:200px;height:35px;" name="view" type="submit" id="code_btn" value="Monthly Report"/><tt>
  <input style="width:200px;height:35px;" name="view1" type="submit" id="code_btn" value="Overall Report"/><br>

<?php
if(isset($_POST['do']))
   {
   header('location:homepage.php');
   }
if(isset($_POST['view']))
   {
   header('location:homepage3.php');
   }

if(isset($_POST['view1']))
   {
   header('location:homepage4.php');
   }
   if(isset($_POST['reset_btn']))
   {
   header('location:reset.php');
   }
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