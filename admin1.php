<?php
session_start();
//require 'dbconfig/congif.php';

function g_data()
{
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());

 $query = "SELECT T_id,fname,lname,subject,username,contactNum,gender FROM teacher_info";
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
$table_str='<center><table id="sub_table"><caption style="font-size:160%"><font color="white"><b>TEACHER DETAILED INFORMATION</b></font></caption>';
	$sub=g_data();
	$i=1;
	$table_str.='<tr class="head_table">';
	$table_str.='<th>S.No.</th><th>Teacher ID</th><th>First Name</th><th>Last Name</th><th>Subject</th><th>Username</th><th>Contact No.</th><th>Gender</th>';
	$table_str.='</tr>';

	foreach($sub as $subs)
	{
		$table_str.='<tr>';
		$table_str.='<td>'.($i++).'</td><td>'.$subs->T_id.'</td><td>'.$subs->fname.'</td>
		<td>'.$subs->lname.'</td>
		<td>'.$subs->subject.'</td>
		<td>'.$subs->username.'</td>
		<td>'.$subs->contactNum.'</td>
		<td>'.$subs->gender.'</td>';
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
     <title>Teacher Record</title>
     <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
	 
    <div class="header2">
	<!--<div id="searcharea" class="header1"><input placeholder="Search here.." type="text" id="searchbox"/></div>-->
  <h3 style="color:black"><b>Welcome 
    <?php echo $_SESSION['name']?>  
   </h3>
   <center><h2 style="font-size:60px"><font color="black"> Records of Teacher</font></h2></center>
   </div>
    <!--<center><img src="img/users.png" class="im1"/></center>-->
   <form class="myform" action="admin.php" method="post">  
   <p class="Go">
    <input name="Back" type="submit" id="logout_btn" value="Home">
   </p>
   </form>
  
 <center><div class="notIE">
<span class="fancyArrow"></span>
<form  name="f" method="post" action="admin1.php">

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
    <!--background-image:url("img/bg13.jpg");-->
	background-color:black;
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

<?php
if(isset($_POST['Back']))
   {
   header('location:admin.php');
   }

   ?>
 
<?php echo g_table(); ?>
  
<p class="Go">
   <input name="do" type="submit" id="code_btn" value="ADD"/>
  <input name="view1" type="submit" id="code_btn" value="DELETE"/>
   <input name="do1" type="submit" id="code_btn" value="UPDATE"/><br>
   </p>
   </form>
<?php
if(isset($_POST['do']))
{
	header('location:r.php');
}
if(isset($_POST['view1']))
{
	header('location:del1.php');
}
if(isset($_POST['do1']))
{
	header('location:ut1.php');
}
?>
</html>