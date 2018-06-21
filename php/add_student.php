<?php
	require("connect.php");
	session_start();
	$Fname=$_POST['Fname'];
	$Lname=$_POST['Lname'];
	$StudId=$_POST['StudId'];
	$Sem=$_POST['Sem'];
	$Dept=$_POST['Dept'];
	$Address=$_POST['Address'];
	$Email=$_POST['Email'];
	$Phone=$_POST['Phone'];
	$Password=$_POST['Password'];
	$sql="INSERT into student values('$Fname', '$Lname', '$StudId', $Sem, $Dept, '$Address', '$Email', '$Phone', '$Password')";
      $conn->query($sql);
      echo mysqli_error($conn);
	header("location:../studentsList.php");
?>