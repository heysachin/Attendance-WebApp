<?php

	if(!isset($_POST["password"] ) && !isset($_POST["email"]))
	{
		header("location:../admin.php");
	}


	require("connect.php");


	$user=$_POST["email"];
	$pass=$_POST["password"];
	$sql="SELECT * FROM student WHERE StudId='$user' AND Password='$pass'";
	$res=mysqli_query($conn,$sql);

	if(mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc( $res );
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['name']=$row['Fname'].' '.$row['Lname'];
		$_SESSION['id']=$row['StudId'];
		$_SESSION['role']="student";

		header('Location:../display.php');



	}
	else
	{
		header('Location:../PasswordIncorrect.php');

	}



	?>
