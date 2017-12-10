<?php
session_start();
//require 'do.php';
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Student Profile</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body style="background-color:teal">
    <div class="header1">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
	
	
	
  <h3><b>Welcome 
   <?php echo $_SESSION['name']?>
     </h3>
	 </div>
	 <br><br><br>
    <center><img src="img/s3.png" class="im1"/></center>
     </center> 
   <form class="myform" action="homepage.php" method="post">
<!--<input name="profile" type="submit" id="profile_btn" value="Profile">-->
<input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   </form>
   
   
    <center><div class="notIE">
	<span class="fancyArrow"></span>
   <form  name="f" method="post" action="see.php">
   
   <select name="month">
<option>ENTER THE MONTH</option>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
</select>
<pre></pre>
<p class="er">
<input name="examrollno" type="text" placeholder="ENTER YOUR EXAM ROLLNO."><br><br> 
</p>
<style type="text/css">
.er input{
	 display:inline-block;
	height:25px;
	width:435px;
	outline:none;
	color:#74646E;
	border:0px soft black;
	border-radius:0px;
	box-shadow: inset 0.5px 0.5px 0.5px #ddd8dc;
}
body
{
	background-color:teal;
	<!--background-image:url("img/bg7.jpg");-->
	background-repeat:no-repeat;
	background-size:100%;
}
</style>
<input name="code_btn" type="submit" id="code_btn" value="Submit"/>

<?php
if(isset($_POST['code_btn']))
{
	   //$con=mysqli_connect("localhost","root","") or die(mysql_error());
   //if($con)
	  // echo "<script>alert('connection  formed')</script>";
   //$db=mysqli_select_db('attendance_tbl',$con) or die(mysql_error());
      //if($db)
	   //echo "<script>alert('databse selected formed')</script>";
   //$r=$_POST['examrollno'];
    //$query="select * from attend_info where stud_id='$r'";
    //if(mysql_query($query)
		
	header('location:see.php');
	}
	 
	 //else
	 //  echo "<script>alert('connection not established')</script>";
   
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
</html>