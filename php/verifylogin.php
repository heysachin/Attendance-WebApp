<?php

	if(!isset($_POST["password"] ) && !isset($_POST["email"]))
	{
		header("location:../verify.php");
	}

	require("connect.php");


	$user=$_POST["email"];
	$pass=$_POST["password"];
	$sql="SELECT username,password FROM verify WHERE username='$user' AND password='$pass'";
	$res=mysqli_query($db,$sql);

	if(mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc( $res );
		session_start();
		$_SESSION['user']=$user;
		//$_SESSION['name']=$row['name'];
		//$_SESSION['id']=$row['rollno'];
		$_SESSION['role']="employee";

		header('Location:../verifybill.php');



	}
	else
	{
		echo "Username and Password does not match";
	}



	?>
