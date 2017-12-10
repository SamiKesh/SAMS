<?php
session_start();
?>

<!DOCTYPE html>
<html>
     <head>
     <title>Student Profile</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
    <div class="header1">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
	
	
	
  <h3><b>Welcome 
    <a href="r1.php"><?php echo $_SESSION['name']?></a> 
     </h3>
	 </div>
	 <br><br><br><br>
    <center><img src="img/s3.png" class="im1"/></center>
     </center> 
   <form class="myform" action="homepage.php" method="post">
<!--<input name="profile" type="submit" id="profile_btn" value="Profile">-->
<input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   </form>
   
   
    <center><div class="notIE">
	<span class="fancyArrow"></span>
   <form  name="f" method="post" action="">
   <br>
   <input name="month" type="submit" id="code_btn" value="Monthly Report"/><tt>
   <input name="annual" type="submit" id="code_btn" value="Overall Report"/><br>
   
<?php
if(isset($_POST['month']))
   {
   header('location:stud.php');
   }
if(isset($_POST['annual']))
   {
   header('location:stud2.php');
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