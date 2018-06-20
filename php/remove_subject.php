<?php
	
	require("connect.php");
	session_start();
	$Tid=$_SESSION['id'];
	$Sid = $_GET['sub_id'];
	$Dept = $_GET['dept'];
	$sql="DELETE from subjects where `Sid`='$Sid' AND `Tid`='$Tid' AND `Dept`=$Dept";
      $conn->query($sql);
      echo mysqli_error($conn);
header("location:../edit_subjects.php");
?>