<?php
//require 'dbconfig/congif.php';
$con=mysql_connect("localhost","root","") or die(mysql_error());
    if(!$con)
		echo "<script>alert('connection not established')</script>";
	$db=mysql_select_db('attendance_tbl',$con) or die(mysql_error());
     	if(!$db)
			echo "<script>alert('database not selected')</script>";
		 
			$y=count($_POST['T_class']);
			echo "$y";

			$t = "insert into attend_info(T_class,A_class,month,sub_id,stud_id) VALUES";
	
    for ($i=1; $i<=$y; $i++) 
   {
	   $tc=$_POST['T_class'][$i-1];
	   $ac=$_POST['A_class'][$i-1];
   if($tc=='' OR $ac=='')
   {
	    echo "<script>alert('Field Empty')</script>";
   }   
	   //$mt=$_POST['month']
	   else
	   
    $t .= "('$tc','$ac','".$_POST['month']."','".$_POST['sub_id']."','".$_POST['stud_id'][$i-1]."'),";
    //if ($i<count($_POST['T_class']) - 1) {
      // $sql .= ',';
        
    	//$p=$_POST['sub_id'];
	 //  $p1=$_POST['stud_id'][$i-1];
	  
	  //$query = mysql_query("SELECT T_class,A_class FROM report_info where stud_id='$p1'");
	 //$query2= mysql_query("SELECT A_class FROM report_info where stud_id='$p1'");
	 //$dk=mysql_query($query);
	  //$sub=array();
	// while($rows=mysql_fetch_array($dk))
	  //{
      // $t=$rows['T_class'];
//$a=$rows['A_class'];
	//  }
	
    //msql_close($con);
	//$row=mysql_fetch_row($query);
	//$query=$row[0];
	//$query1 = mysql_query("SELECT A_class FROM report_info where stud_id='$p1'");
	//$row=mysql_fetch_row($query1);
	//$query1=$row[0];
	
	//$sub=array();
	//echo "$t";
	//echo "$a";
	 
	//echo "$tc1";
	//echo "$ac1";
	 // $u=mysql_query("update report_info set T_class='$tc',A_class='$ac' where stud_id='$p1' and sub_id='$p'");
	
	   }
	  $t=rtrim($t,",");
	  
	if(!mysql_query($t))
    {
	//echo mysql_error();
	echo "$t";
	echo "<script>alert('Attendance not registered')</script>";
	echo"<script>window.open('homepage.php','_self')</script>";
    }
    else
    {
		echo "<script>alert('Attendance successfully registered')</script>";
	echo"<script>window.open('homepage1.php','_self')</script>";
	//echo "<script>alert('Attendance successfully registered')</script>";
    }
	   
    ?>