<?php
session_start();
require 'dbconfig/congif.php';
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
    <?php echo $_SESSION['name']?>
   </h3>
   </div>
   <br><br><br><br><br><br><br>
    <center><img src="img/users.png" class="im1"/></center>
     </center> 
	 
   <form class="myform" action="homepage.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <input name="logout" type="submit" id="logout_btn" value="Log Out"><br>
   
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span><br>
<form  name="f" method="post" action="see1.php">
<select name="sub_id" type="text" id="sub_id">
<option>SELECT YOUR SUBJECT CODE</option>
<!--<option>BCS 201</option>
<option>BCS-202: Basic Linux Lab</option>
<option>BCS-401:Computer Organization And Architecture</option>
<option>BCS-402:Lab Exercises Based On Course BCS-401</option>-->
<option>BCS 601<!---Database Management System--></option>
<option>BCS 602 <!--Data Structure--></option>
<option>BCS 603<!--Lab Exercises Based On Course BCS-601--></option>
<option>BCS 604<!--Lab Exercises Based On Course BCS-602--></option>
<option>BCS 605<!--Project--></option>
<!--<option>MTB-201:Calculus-2</option>
<option>MTB-202:Statics & Dynamics</option>
<option>MTB-401:Partial Differential Equations</option>
<option>MTB-402:Mathematics Methods</option>-->
<option>MTB 601<!--:Set Theory And Metric Spaces--></option>
<option>MTB 602<!--:Linear Algebra--></option>
<option>MTB 603<!--:Numerical Analysis--></option>
<option>MTB 604<!--:Discrete Mathematics--></option>
<option>MTB 605<!--:Vector & Tensor Analysis---></option>
<option>MTB 606<!--:Complex Analysis--></option>
<option>MTB 607<!--:Number Theory--></option>
<!--<option>MTB 608<!--:Global Differential Geometry</option>
<option>MTB 609<!--:Special Theory Of Relativity 2</option>
<option>MTB 610<!--:Computational Mathematics Lab-2</option>
<option>MTB 611<!--:Dynamic System</option>-->
<option>STB 601<!--:Numericals Method--></option>
<option>STB 602<!--:Demand Analysis,Analysis of Income Distribution and Queing Theory--></option>
<option>STB 603<!--:Elements Of Stochastic Process--></option>
<option>STB 604<!--:Reliability--></option>
<option>STB 605<!--:Practicals Based on Course Nos. STB-601 And STB-603--></option>
<option>STB 606<!--:Practicals Based on Course Nos. STB-602 And STB-604--></option>
<option>STB 607<!--:PROJECT--></option>
</select>
<pre></pre>
<!--<select name="month">
<option>ENTER THE MONTH</option>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
</select>
<pre></pre>-->

<input name="code_btn" type="submit" id="code_btn" value="Submit"/>
<!--<a href="homepage1.php"><input name="back_btn" type="submit" id="code_btn" value="Back"></a><br>-->
   <?php
   //$con=mysqli_connect("localhost","root","") or die(mysql_error());
   //if($con)
	  // echo "<script>alert('connection  formed')</script>";
   //$db=mysqli_select_db('attendance_tbl',$con) or die(mysql_error());
      //if($db)
	   //echo "<script>alert('databse selected formed')</script>";

   if(isset($_POST['code_btn']))
   {
	 header('location:see1.php');
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
<style>
body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:100%;
	
}
</style>
</html>  