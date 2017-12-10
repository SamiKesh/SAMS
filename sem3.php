<?php
session_start();
require 'dbconfig/congif.php';
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Report Record</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
	 
    <div class="header2">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
  <h3 style="color:black"><b>Welcome 
    <?php echo $_SESSION['name']?>  
   </h3>
    <center><h2 style="font-size:60px"><font color="black">View Records</font></h2></center>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="admin.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <br>
   <p class="Go">
   <input name="Back" type="submit" id="logout_btn" value="Home"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>

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
	height:190px;
	margin-top:0px;
	margin:0;
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
</style>

<?php
if(isset($_POST['Back']))
   {
   header('location:admin.php');
   }
   ?>
   <br><br><br><br><br>
 <form class="myform" action="sem3.php" method="post">
 <br><br><br>
<select name="sub_id" type="text" id="sub_id">
<option>SELECT YOUR SEMESTER</option>
<option>1<!---Database Management System--></option>
<option>2 <!--Data Structure--></option>
<option>3<!--Lab Exercises Based On Course BCS-601--></option>
<option>4<!--Lab Exercises Based On Course BCS-602--></option>
<option>5<!--Lab Exercises Based On Course BCS-601--></option>
<option>6<!--Lab Exercises Based On Course BCS-602--></option>
</select>
<pre></pre><br>
<p class="Go">
   <input style="width:200px" name="view" type="submit" id="code_btn" value="View Record"/>
</p>
</form>
<?php
	
if(isset($_POST['view']))
{
	$sid=$_POST['sub_id'];
	$_SESSION['sub_id']=$sid;
 header('location:adminr.php');
}
?>
</html>