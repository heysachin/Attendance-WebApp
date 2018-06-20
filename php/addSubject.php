<?php
	
	require("connect.php");
	session_start();
	$Tid=$_SESSION['id'];
	$Sid = $_POST['Sid'];
	$Sname = $_POST['Sname'];
	$Credit = $_POST['Credit'];
	$Sem = $_POST['Sem'];
	$Dept = $_POST['Dept'];
	$sql="INSERT into subjects values('$Sid','$Sname',$Credit,'$Tid',$Sem,$Dept)";
      $conn->query($sql);
      echo mysqli_error($conn);
header("location:../edit_subjects.php");
?>