<?php
session_start();
$sid=$_SESSION['sub_id'];
function g_data()
{
	$sid=$_SESSION['sub_id'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT * FROM student_info where semester='$sid'";
	$dk=mysql_query($query);
	$sub=array();
	while($object=mysql_fetch_object($dk))
	{
       $sub[]=$object;
	}
	
//msql_close($con);
return $sub;
}
function g_table()
{
	
$table_str='<center><table id="sub_table"><caption style="font-size:160%"><font color="white"><b>STUDENT DETAILED INFORMATION</b></font></caption>';
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>examrollno</th><th>First Name</th><th>Last Name</th><th>Honours</th><th>Username</th><th>Contact No.</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->examrollno.'</td><td>'.$subs->fname.'</td>
		<td>'.$subs->lname.'</td>
		<td>'.$subs->hons.'</td>
		<td>'.$subs->username.'</td>
		<td>'.$subs->contactno.'</td>';
		//<td><form class="form"><input type="number" name="T_class[]" id="T_class"></td>
		//<td><input type="number" name="A_class[]" id="A_class">
        //</form></td>';
		$table_str.='</tr>';
	}
	//$y=2*($i-1);
	//echo "$y";
	return $table_str;
	?>
	</table></center>
<?php
}
?>
<!DOCTYPE html>
<html>
     <head>
     <title>Student Record</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
	 
    <div class="header2">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
  <h3 style="color:black"><b>Welcome 
    <?php echo $_SESSION['name']?>  
   </h3>
 
    <center><h2 style="font-size:65px"><font color="black"> Records of Student</font></h2></center>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="sem2.php" method="post">
   <!--<button type="button"><a href="r.php"><b>Profile</b></a></button>
   <input name="profile" type="submit" id="profile_btn" value="My Profile">-->
   <p class="Go">
   <input name="Back" type="submit" id="logout_btn" value="Back"><br>
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="post.php">

   <style>
   body
{
	background-color:teal;
	background-repeat:no-repeat;
	background-size:197%;
}
.header2
{
background-color:white;
	height:200px;
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
#sub_table
{
	border:2px solid black;
	border-collapse:collapse;
	align:center;
    background-color:white;
	width:1100px;
}
#sub_table td,th
{
	border:1px solid black;
	color:red;
}
.head_table
{
	background-color:black;
	color:black;
}
.sub input{
	color:purple;
}
.sub input:hover{
	background-color:navy;
	color:orange;
}
</style>

<?php  echo g_table(); ?>
<p class="Go">
  <a href="r1.php"><input name="add" type="submit" id="code_btn" value="ADD"/></a>
  <input name="view2" type="submit" id="code_btn" value="DELETE"/>
   <input name="do3" type="submit" id="code_btn" value="UPDATE"/><br>
   </p>
   </form>
<?php
if(isset($_POST['add']))
{
	header('location:r1.php');
}
if(isset($_POST['do3']))
{
	header('location:us3.php');
}
if(isset($_POST['Back']))
   {
	   session_destroy();
	   echo"<script>window.open('sem2.php','_self')</script>";
  // header('location:sem2.php');
   }
   
   ?>
</body>
</html>